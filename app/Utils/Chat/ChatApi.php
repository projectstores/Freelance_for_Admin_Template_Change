<?php

namespace App\Utils\Chat;

use Exception;
use Pusher\Pusher;
use Astrotomic\Twemoji\Twemoji;
use App\Models\ChMessage as Message;
use App\Models\ChFavorite as Favorite;
use Illuminate\Support\Facades\Storage;

class ChatApi
{
    public $pusher;


    /**
     * Set pusher settings
     */
    public function __construct()
    {
        $this->pusher = new Pusher(
            config('chatify.pusher.key'),
            config('chatify.pusher.secret'),
            config('chatify.pusher.app_id'),
            config('chatify.pusher.options'),
        );
    }


    /**
     * Get max file's upload size in MB.
     *
     * @return int
     */
    public function getMaxUploadSize()
    {
        return settings('live_chat')->max_file_size * 1048576;
    }


    /**
     * This method returns the allowed image extensions
     * to attach with the message.
     *
     * @return array
     */
    public function getAllowedImages()
    {
        return explode(",", settings('live_chat')->allowed_images);
    }


    /**
     * This method returns the allowed file extensions
     * to attach with the message.
     *
     * @return array
     */
    public function getAllowedFiles()
    {
        return explode(",", settings('live_chat')->allowed_files);
    }


    /**
     * Returns an array contains messenger's colors
     *
     * @return array
     */
    public function getMessengerColors()
    {
        return config('chatify.colors');
    }
    

    /**
     * Trigger an event using Pusher
     *
     * @param string $channel
     * @param string $event
     * @param array $data
     * @return void
     */
    public function push($channel, $event, $data)
    {
        return $this->pusher->trigger($channel, $event, $data);
    }


    /**
     * Authentication for pusher
     *
     * @param User $requestUser
     * @param User $authUser
     * @param string $channelName
     * @param string $socket_id
     * @param array $data
     * @return void
     */
    public function pusherAuth($requestUser, $authUser, $channelName, $socket_id)
    {
        // Authenticated user data
        $auth_data = json_encode([
            'user_id'   => $authUser->id,
            'user_info' => [
                'uid'      => strtolower($authUser->uid),
                'username' => $authUser->username
            ]
        ]);

        // check if user authenticated
        if (auth()->check()) {

            // Check if authorized
            if($requestUser->id == $authUser->id){
                return $this->pusher->authorizeChannel(
                    $channelName,
                    $socket_id,
                    $auth_data
                );
            }

            // If not authorized
            return response()->json(['message'=>'Unauthorized'], 401);

        }

        // If not authenticated
        return response()->json(['message'=>'Not authenticated'], 403);
    }


    /**
     * Fetch message by id and return the message card
     * view as a response.
     *
     * @param int $id
     * @return array
     */
    public function fetchMessage($id, $index = null)
    {
        // Set empty variables
        $attachment           = null;
        $attachment_type      = null;
        $attachment_title     = null;
        $attachment_extension = null;
        $attachment_size      = null;

        // Fetch message
        $msg = Message::where('id', $id)->first();

        // Check if message does not exists
        if(!$msg){
            return [];
        }

        // Check if message is an attachment
        if (isset($msg->attachment)) {

            // Decode attachment
            $attachment_results   = json_decode($msg->attachment);
            $attachment           = $attachment_results->new_name;
            $attachment_title     = htmlentities(trim($attachment_results->old_name), ENT_QUOTES, 'UTF-8');

            // Get file extension
            $attachment_extension = $attachment_results->extension;

            // Get file type
            if (in_array($attachment_extension, $this->getAllowedImages())) {
                
                // Image
                $attachment_type = 'image';

            } else {

                // File
                $attachment_type = 'file';

            }

            // Set image size
            $attachment_size      = $attachment_results->size;

        }

        // Set message
        if ($msg->body) {
            
            // Check if emojis enabled
            if (settings('live_chat')->enable_emojis) {
                
                // Enable emojis
                $message = Twemoji::text($msg->body)->toHtml();

            } else {

                // Not enabled
                $message = clean($msg->body);

            }

        } else {

            // No message
            $message = null;

        }

        // Return message
        return [
            'index'           => $index,
            'id'              => $msg->id,
            'from_id'         => $msg->from_id,
            'to_id'           => $msg->to_id,
            'message'         => $message,
            'attachment'      => [$attachment, $attachment_title, $attachment_type, $attachment_extension, $attachment_size],
            'time'            => format_date($msg->created_at),
            'fullTime'        => $msg->created_at,
            'viewType'        => ($msg->from_id == auth()->id()) ? 'sender' : 'default',
            'seen'            => $msg->seen,
        ];
    }


    /**
     * Return a message card with the given data.
     *
     * @param array $data
     * @param string $viewType
     * @return string
     */
    public function messageCard($data, $viewType = null)
    {
        if (!$data) {
            return '';
        }
        $data['viewType'] = ($viewType) ? $viewType : $data['viewType'];
        return view('Chatify::layouts.messageCard', $data)->render();
    }


    /**
     * Default fetch messages query between a Sender and Receiver.
     *
     * @param int $user_id
     * @return Message|\Illuminate\Database\Eloquent\Builder
     */
    public function fetchMessagesQuery($user_id)
    {
        return Message::where('from_id', auth()->id())
                        ->where('to_id', $user_id)
                        ->orWhere('from_id', $user_id)
                        ->where('to_id', auth()->id());
    }


    /**
     * create a new message to database
     *
     * @param array $data
     * @return void
     */
    public function newMessage($data)
    {
        $message             = new Message();
        $message->id         = $data['id'];
        $message->type       = $data['type'];
        $message->from_id    = $data['from_id'];
        $message->to_id      = $data['to_id'];
        $message->body       = clean(strip_tags($data['body']));
        $message->attachment = $data['attachment'];
        $message->save();
    }


    /**
     * Make messages between the sender [Auth user] and
     * the receiver [User id] as seen.
     *
     * @param int $user_id
     * @return bool
     */
    public function makeSeen($user_id)
    {
        // Update messages
        Message::Where('from_id', $user_id)
                ->where('to_id', auth()->id())
                ->where('seen', false)
                ->update([ 'seen' => true ]);

        // Success
        return true;
    }


    /**
     * Get last message for a specific user
     *
     * @param int $user_id
     * @return Message|Collection|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getLastMessageQuery($user_id)
    {
        return $this->fetchMessagesQuery($user_id)->latest()->first();
    }


    /**
     * Count Unseen messages
     *
     * @param int $user_id
     * @return Collection
     */
    public function countUnseenMessages($user_id)
    {
        return Message::where('from_id', $user_id)->where('to_id', auth()->id())->where('seen', 0)->count();
    }


    /**
     * Get user list's item data [Contact Itme]
     * (e.g. User data, Last message, Unseen Counter...)
     *
     * @param int $messenger_id
     * @param Collection $user
     * @return string
     */
    public function getContactItem($user)
    {
        // get last message
        $lastMessage   = $this->getLastMessageQuery($user->id);

        // Get Unseen messages counter
        $unseenCounter = $this->countUnseenMessages($user->id);

        return view('Chatify::layouts.listItem', [
            'get'           => 'users',
            'user'          => $user,
            'lastMessage'   => $lastMessage,
            'unseenCounter' => $unseenCounter,
        ])->render();
    }


    /**
     * Get user with avatar (formatted).
     *
     * @param Collection $user
     * @return Collection
     */
    public function getUserWithAvatar($user)
    {
        $user->avatar_src = src($user->avatar);
        return $user;
    }


    /**
     * Check if a user in the favorite list
     *
     * @param int $user_id
     * @return boolean
     */
    public function inFavorite($user_id)
    {
        return Favorite::where('user_id', auth()->id())
                        ->where('favorite_id', $user_id)->count() > 0 ? true : false;
    }


    /**
     * Make user in favorite list
     *
     * @param int $user_id
     * @param int $star
     * @return boolean
     */
    public function makeInFavorite($user_id, $action)
    {
        if ($action > 0) {
            // Star
            $star              = new Favorite();
            $star->id          = rand(9, 99999999);
            $star->user_id     = auth()->id();
            $star->favorite_id = $user_id;
            $star->save();
            return $star ? true : false;
        } else {
            // UnStar
            $star = Favorite::where('user_id', auth()->id())->where('favorite_id', $user_id)->delete();
            return $star ? true : false;
        }
    }


    /**
     * Get shared photos of the conversation
     *
     * @param int $user_id
     * @return array
     */
    public function getSharedPhotos($user_id)
    {
        $images = array(); // Default
        // Get messages
        $msgs = $this->fetchMessagesQuery($user_id)->orderBy('created_at', 'DESC');
        if ($msgs->count() > 0) {
            foreach ($msgs->get() as $msg) {
                // If message has attachment
                if ($msg->attachment) {
                    $attachment = json_decode($msg->attachment);
                    // determine the type of the attachment
                    in_array(pathinfo($attachment->new_name, PATHINFO_EXTENSION), $this->getAllowedImages())
                    ? array_push($images, $attachment->new_name) : '';
                }
            }
        }
        return $images;
    }


    /**
     * Delete Conversation
     *
     * @param int $user_id
     * @return boolean
     */
    public function deleteConversation($user_id)
    {
        try {

            // Loop through all messages
            foreach ($this->fetchMessagesQuery($user_id)->get() as $msg) {

                // Delete file attached if exist
                if (isset($msg->attachment)) {

                    // Get file path
                    $path = config('chatify.attachments.folder').'/'.json_decode($msg->attachment)->new_name;

                    // Delete it
                    if (self::storage()->exists($path)) {
                        self::storage()->delete($path);
                    }

                }

                // Delete from database
                $msg->delete();

            }

            // Success
            return true;

        } catch (Exception $e) {

            // Error
            return false;

        }
    }


    /**
     * Delete message by ID
     *
     * @param int $id
     * @return boolean
     */
    public function deleteMessage($id)
    {
        try {

            // Get message
            $message = Message::where('from_id', auth()->id())->where('id', $id)->firstOrFail();

            // Check if message has attachment
            if (isset($message->attachment)) {

                // Get file path
                $path = config('chatify.attachments.folder') . '/' . json_decode($message->attachment)->new_name;

                // Delete file attached if exist
                if (self::storage()->exists($path)) {
                    self::storage()->delete($path);
                }

            }

            // delete from database
            $message->delete();

            // Success
            return true;

        } catch (Exception $e) {

            // Not found
            return false;

        }
    }


    /**
     * Return a storage instance with disk name specified in the config.
     *
     */
    public function storage()
    {
        return Storage::disk(config('chatify.storage_disk_name'));
    }


    /**
     * Get user avatar url.
     *
     * @param string $user_avatar_name
     * @return string
     */
    public function getUserAvatarUrl($user_avatar_name)
    {
        return self::storage()->url(config('chatify.user_avatar.folder') . '/' . $user_avatar_name);
    }
    

    /**
     * Get attachment's url.
     *
     * @param string $attachment_name
     * @return string
     */
    public function getAttachmentUrl($attachment_name)
    {
        return self::storage()->url(config('chatify.attachments.folder') . '/' . $attachment_name);
    }
}
