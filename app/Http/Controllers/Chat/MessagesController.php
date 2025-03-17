<?php

namespace App\Http\Controllers\Chat;

use App\Models\User;
use App\Utils\Chat\ChatApi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\ChMessage as Message;
use Illuminate\Support\Facades\Cache;
use App\Models\ChFavorite as Favorite;
use Illuminate\Support\Facades\Response;
use App\Notifications\User\Everyone\NewMessage;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class MessagesController extends Controller
{
    use SEOToolsTrait;

    protected $chat;
    protected $perPage = 30;


    /**
     * Set chat api
     */
    public function __construct() {
        $this->chat = new ChatApi();
    }


    /**
     * Authenticate the connection for pusher
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function pusherAuth(Request $request)
    {
        return $this->chat->pusherAuth(
            $request->user(),
            auth()->user(),
            $request->get('channel_name'),
            $request->get('socket_id')
        );
    }

    
    /**
     * eturning the view of the app with the required data
     *
     * @param string $id
     * @return \Illuminate\Contracts\View\View
     */
    public function index( $id = null)
    {
        // Get user
        $user        = User::where('id', '!=', auth()->id())
                            ->where('uid', $id)
                            ->whereIn('status', ['active', 'verified'])
                            ->first();

        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_messages') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        // Return view
        return view('Chatify::pages.app', [
            'id'             => $user ? $user->id : 0,
            'uid'            => $user ? strtolower($user->uid) : 0,
            'type'           => 'user',
            'messengerColor' => settings('appearance')->colors['primary'],
            'dark_mode'      => current_theme(),
        ]);
    }


    /**
     * Fetch user by id
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function idFetchData(Request $request)
    {
        // Check if user in favorite list
        $favorite = $this->chat->inFavorite($request->get('id'));

        // User data
        if ($request->get('type') == 'user') {

            // Get user
            $fetch = User::where('id', $request->get('id'))
                            ->select('id', 'uid', 'username', 'fullname', 'avatar_id', 'active_status')
                            ->with('avatar', function($query) {
                                return $query->select('id', 'file_extension', 'file_folder', 'uid');
                            })
                            ->first();

            // Check if user exists
            if($fetch){

                // Set avatar
                $userAvatar = $this->chat->getUserWithAvatar($fetch)->avatar;

            }

        }

        // send the response
        return Response::json([
            'favorite'    => $favorite,
            'fetch'       => $fetch ?? [],
            'user_avatar' => src($userAvatar),
        ]);
    }


    /**
     * This method to make a links for the attachments
     * to be downloadable.
     *
     * @param string $fileName
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|void
     */
    public function download($fileName)
    {
        // Get file path
        $path = config('chatify.attachments.folder') . '/' . $fileName;

        // Check if file exists
        if ($this->chat->storage()->exists($path)) {
            return $this->chat->storage()->download($path);
        }

        // File not found
        return abort(404, __('messages.t_sorry_file_chat_does_not_exist'));
    }


    /**
     * Send a message to database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function send(Request $request)
    {
        // default variables
        $error = (object)[
            'status'  => 0,
            'message' => null
        ];

        // Set default attachement values
        $attachment       = null;
        $attachment_title = null;

        // if there is attachment [file]
        if ($request->hasFile('file') && settings('live_chat')->enable_attachments) {

            // allowed extensions
            $allowed_images = $this->chat->getAllowedImages();
            $allowed_files  = $this->chat->getAllowedFiles();
            $allowed        = array_merge($allowed_images, $allowed_files);

            // Get file
            $file           = $request->file('file');
            
            // Check file size
            if ($file->getSize() < $this->chat->getMaxUploadSize()) {

                // Check  extension
                if (in_array(strtolower($file->extension()), $allowed)) {

                    // Get attachment name
                    $attachment_title = $file->getClientOriginalName();

                    // Set new name for this attachment
                    $attachment       = Str::uuid() . "." . $file->extension();

                    // Upload attachment and store the new name
                    $file->storeAs(config('chatify.attachments.folder'), $attachment, config('chatify.storage_disk_name'));

                } else {

                    // Error
                    $error->status  = 1;
                    $error->message = __('messages.t_selected_file_extension_is_not_allowed');

                }

            } else {

                // Error
                $error->status  = 1;
                $error->message = __('messages.t_selected_file_size_big');

            }

        } else {

            // Get message
            $get_message = clean($request->get('message'));

            // Check if message is empty or not set
            if (!$get_message) {

                // Error
                $error->status  = true;
                $error->message = __('messages.t_enter_your_message');

            }

        }

        // Check if there is no error
        if (!$error->status) {
            
            // Generate message id
            $message_id = mt_rand(9, 999999999) + time();

            // Save message
            $this->chat->newMessage([
                'id'         => $message_id,
                'type'       => 'user',
                'from_id'    => auth()->id(),
                'to_id'      => $request->get('id'),
                'body'       => $request->get('message') ? clean($request->get('message')) : null,
                'attachment' => ($attachment) ? json_encode((object)[
                    'new_name'  => $attachment,
                    'old_name'  => htmlentities(trim(clean($attachment_title)), ENT_QUOTES, 'UTF-8'),
                    'size'      => $file->getSize(),
                    'extension' => $file->extension()
                ]) : null,
            ]);

            // fetch message to send it with the response
            $messageData = $this->chat->fetchMessage($message_id);

            // send to user using pusher
            $this->chat->push("private-chat.".$request->get('id'), 'messaging', [
                'from_id' => auth()->id(),
                'to_id'   => $request->get('id'),
                'message' => $this->chat->messageCard($messageData, 'default')
            ]);

            // Set a cache value
            $notification_cache_value = 'live_chat_user_from_' . auth()->id() . '_' . $request->get('id');

            // If user if offline send him a message via email
            // We have to send a notification every 10 minutes
            // To prevent sending a notification on every message
            Cache::get($notification_cache_value, function () use ($request, $notification_cache_value) {
                
                // Get user data
                $user = User::where('id', $request->get('id'))->first();
                
                // Check if user offline
                if ($user->active_status !== 1) {
                    
                    $user->notify(new NewMessage( $user->uid ));

                }

                // Save cache value
                return Cache::put($notification_cache_value, 'sent', 600);

            });

        }

        // Send the response
        return Response::json([
            'status'  => '200',
            'error'   => $error,
            'message' => $this->chat->messageCard(@$messageData),
            'tempID'  => $request->get('temporaryMsgId'),
        ]);
    }

    /**
     * fetch [user/group] messages from database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request)
    {
        $query         = $this->chat->fetchMessagesQuery($request->get('id'))->latest();
        $messages      = $query->paginate($request->per_page ?? $this->perPage);
        $totalMessages = $messages->total();
        $lastPage      = $messages->lastPage();
        $response      = [
            'total'           => $totalMessages,
            'last_page'       => $lastPage,
            'last_message_id' => collect($messages->items())->last()->id ?? null,
            'messages'        => '',
        ];

        // If there is no messages yet
        if ($totalMessages < 1) {
            $response['messages'] ='<p class="message-hint center-el"><span>' . __('messages.t_type_something_to_start_messaging') . '</span></p>';
            return Response::json($response);
        }

        // Check if not messages
        if (count($messages->items()) < 1) {
            $response['messages'] = '';
            return Response::json($response);
        }

        // Set empty messages variable
        $allMessages = null;

        // Loop through messages
        foreach ($messages->reverse() as $index => $message) {
            $allMessages .= $this->chat->messageCard(
                $this->chat->fetchMessage($message->id, $index)
            );
        }

        // Update messages
        $response['messages'] = $allMessages;

        // Return response
        return Response::json($response);
    }


    /**
     * Mark messages as seen
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    public function seen(Request $request)
    {
        // Make message as seen
        $seen = $this->chat->makeSeen($request->get('id'));

        // Send the response
        return response()->json([
            'status' => $seen
        ], 200);
    }

    /**
     * Get contacts list
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getContacts(Request $request)
    {
        // Get users
        $users = Message::join('users',  function ($join) {
                            $join->on('ch_messages.from_id', '=', 'users.id')
                                ->orOn('ch_messages.to_id', '=', 'users.id');
                        })
                        ->where(function ($q) {
                            $q->where('ch_messages.from_id', auth()->id())
                            ->orWhere('ch_messages.to_id', auth()->id());
                        })
                        ->with('avatar')
                        ->where('users.id','!=',auth()->id())
                        ->select('users.*',DB::raw('MAX(ch_messages.created_at) max_created_at'))
                        ->orderBy('max_created_at', 'desc')
                        ->groupBy('users.id')
                        ->paginate($request->per_page ?? $this->perPage);

        // Get all users
        $usersList = $users->items();
        
        // Check if list not empty
        if (count($usersList) > 0) {

            $contacts = '';

            // Loop through contacts
            foreach ($usersList as $user) {
                
                $contacts .= $this->chat->getContactItem($user);
            }

        } else {

            // Contacts list empty
            $contacts = '<p class="message-hint center-el w-full"><span>' . __('messages.t_ur_contact_list_is_empty') . '</span></p>';

        }

        // Send response
        return Response::json([
            'contacts'  => mb_convert_encoding($contacts, 'UTF-8', 'UTF-8'),
            'total'     => $users->total() ?? 0,
            'last_page' => $users->lastPage() ?? 1,
        ], 200);
    }


    /**
     * Update user's list item data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateContactItem(Request $request)
    {
        // Get user data
        $user = User::where('id', $request->get('user_id'))->first();

        // Check if user does not exist
        if(!$user){

            // Send response
            return Response::json([
                'message' => __('messages.t_user_not_found'),
            ], 401);

        }

        // Set contact
        $contactItem = $this->chat->getContactItem($user);

        // send the response
        return Response::json([
            'contactItem' => $contactItem,
        ], 200);
    }


    /**
     * Put a user in the favorites list
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    public function favorite(Request $request)
    {
        // Get user id
        $userId         = $request->get('user_id');

        // Check favorite status
        $favoriteStatus = $this->chat->inFavorite($userId) ? 0 : 1;

        // Mark this chat as in favorite
        $this->chat->makeInFavorite($userId, $favoriteStatus);

        // send the response
        return Response::json([
            'status' => @$favoriteStatus,
        ], 200);
    }


    /**
     * Get favorites list
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    public function getFavorites(Request $request)
    {
        // Set favorite list variable
        $favoritesList = null;

        // Get chats in favorite
        $favorites     = Favorite::where('user_id', auth()->id());

        // Loop through favorites
        foreach ($favorites->get() as $favorite) {

            // Get user data
            $user           = User::where('id', $favorite->favorite_id)->first();

            // Set view
            if ($user) {
                $favoritesList .= view('Chatify::layouts.favorite', [
                    'user' => $user,
                ]);
            }

        }

        // Send the response
        return Response::json([
            'count'     => $favorites->count(),
            'favorites' => $favorites->count() > 0 ? $favoritesList : 0
        ], 200);
    }


    /**
     * Search in contacts
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    public function search(Request $request)
    {
        // Set empty records variable
        $getRecords = null;

        // Get input value
        $input      = trim(filter_var($request->get('input')));

        // Search contacts
        $records    = Message::join('users',  function ($join) {
                                $join->on('ch_messages.from_id', '=', 'users.id')
                                    ->orOn('ch_messages.to_id', '=', 'users.id');
                            })
                            ->where(function ($q) {
                                $q->where('ch_messages.from_id', auth()->id())
                                ->orWhere('ch_messages.to_id', auth()->id());
                            })
                            ->where(function($query) use($input) {
                                $query->where('username', 'LIKE', "%{$input}%")
                                        ->orWhere('fullname', 'LIKE', "%{$input}%");
                            })
                            ->with('avatar')
                            ->where('users.id','!=',auth()->id())
                            ->groupBy('users.id')
                            ->paginate($request->per_page ?? $this->perPage);
        
        // Loop through records
        foreach ($records->items() as $record) {

            // Set view
            $getRecords .= view('Chatify::layouts.listItem', [
                'get' => 'search_item',
                'type' => 'user',
                'user' => $record,
            ])->render();
        }

        // Check if no results found
        if($records->total() < 1){
            $getRecords = '<p class="message-hint center-el"><span>' . __('messages.t_no_results_found') . '</span></p>';
        }

        // Send the response
        return response()->json([
            'records'   => $getRecords,
            'total'     => $records->total(),
            'last_page' => $records->lastPage()
        ], 200);
        
    }


    /**
     * Get shared photos
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    public function sharedPhotos(Request $request)
    {
        // Get shared photos
        $shared       = $this->chat->getSharedPhotos($request->get('user_id'));

        // Set empty variable
        $sharedPhotos = null;

        // Shared with its template
        for ($i = 0; $i < count($shared); $i++) {

            // Set view
            $sharedPhotos .= view('Chatify::layouts.listItem', [
                'get'   => 'sharedPhoto',
                'image' => $this->chat->getAttachmentUrl($shared[$i]),
            ])->render();

        }

        // Send the response
        return Response::json([
            'shared' => count($shared) > 0 ? $sharedPhotos : '<p class="message-hint"><span>' . __('messages.t_nothing_shared_yet') . '</span></p>',
            'empty'  => count($shared)
        ], 200);
    }


    /**
     * Delete conversation
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteConversation(Request $request)
    {
        // Delete conversation
        // $delete = $this->chat->deleteConversation($request->get('id'));

        // send the response
        return Response::json([
            'deleted' => 1,
        ], 200);
    }


    /**
     * Delete message
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteMessage(Request $request)
    {
        // Delete message
        $delete = $this->chat->deleteMessage($request->get('id'));

        // send the response
        return Response::json([
            'deleted' => $delete ? 1 : 0,
        ], 200);
    }


    /**
     * Set user's active status
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function setActiveStatus(Request $request)
    {
        // Get user id
        $userId       = $request->get('user_id');

        // Get status
        $activeStatus = $request->get('status') > 0 ? 1 : 0;

        // Set status
        $status       = User::where('id', $userId)->update(['active_status' => $activeStatus]);

        // Send response
        return Response::json([
            'status' => $status,
        ], 200);
    }
}
