<?php
namespace App\Http\Controllers\Callback;

use App\Models\Gig;
use App\Models\User;
use App\Models\Order;
use Razorpay\Api\Api;
use App\Models\OrderItem;
use App\Models\GigUpgrade;
use Illuminate\Support\Str;
use App\Models\OrderInvoice;
use Illuminate\Http\Request;
use App\Models\DepositWebhook;
use App\Models\CheckoutWebhook;
use App\Models\OrderItemUpgrade;
use App\Models\DepositTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\AutomaticPaymentGateway;
use App\Notifications\User\Buyer\OrderPlaced;
use App\Notifications\User\Seller\PendingOrder;
use App\Models\Page;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;
use App\Http\Validators\Main\Auth\LoginValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Validators\Main\Auth\ResetPasswordValidator;
use App\Notifications\User\Everyone\PasswordReset as PasswordResetNotification;
use App\Models\PasswordReset;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Hash;
use App\Notifications\Admin\PendingUser;
use App\Notifications\User\Everyone\Welcome;
use App\Notifications\User\Everyone\VerifyEmail;
use App\Http\Validators\Main\Auth\RegisterValidator;
use App\Models\Category;
use App\Models\FileManager;
use App\Models\Project;
use App\Utils\Uploader\ImageUploader;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Config;
use App\Models\Notification;

class ApiController extends Controller
{

    /**
     * Fetch pages
     *
     * @param Request $request
     * @return mixed
     */
    public function pages(Request $request)
    {
        $slug = $request->input('slug');    
        $page = Page::where('slug', $slug)->firstOrFail();
        return response()->json([
                "message" => $page], 200);

    }
    
    /**
     * Home
     *
     * @return void
     */
    public function home(Request $request)
    {
        
        $categories = Category::with(['subcategories' => function($query) {
            return $query->orderBy('id', 'desc');
        }])->get();
        
        $gigs = Gig::active()->inRandomOrder()->with('imageMedium')->with('user')->take(4)->get();
        $projects = Project::whereIn('status', ['completed', 'active'])
                    ->with('category')
                    ->with('project_skills')
                    ->orderBy('id', 'desc')
                    ->take(4)->get();
        
        $users = User::where('account_type', 'seller')
                //->whereHas('sales')
                ->whereIn('status', ['active', 'verified'])
                //->withCount('sales')
                //->orderBy('sales_count', 'desc')
                ->limit(20) // Get the first 20 results
                ->inRandomOrder() // Shuffle the 20 results
                ->with("avatar")
                ->take(4)
                ->get();
        
        return response()->json([
                    "categories" => json_encode($categories),
                    "gigs" => json_encode($gigs),
                    "top_freelancers" => json_encode($users),
                    "projects" => json_encode($projects)], 200);
       
    }
    
    /**
     * Latest Jobs
     *
     * @return void
     */
    public function fetchGigs(Request $request)
    {
        $count = $request->input('count'); 
        $page = $request->input('page'); 
        $searchTerm = $request->input('search'); 
        $sortBy = $request->input('sort_by');
        $category_id = $request->input('category_id'); 
        $subcategory_id = $request->input('subcategory_id'); 
        
        $min_price = $request->input('min_price'); 
        $max_price = $request->input('max_price'); 
        $rating = $request->input('rating'); 
        
        $gigs = Gig::active();
        
        $filterArray = [];
    
        if ($category_id !== null) {
            $filterArray['category_id'] = $category_id;
        }
        
        if ($subcategory_id !== null) {
            $filterArray['subcategory_id'] = $subcategory_id;
        }
        
        if ($category_id !== null && $subcategory_id !== null) {
            $gigs->where($filterArray);
        }
        
        if ($min_price !== null) {
            if (is_float($min_price))
                $gigs->where('price', '>=', floatval($min_price));
            else
                $gigs->where('price', '>=', intval($min_price));
        }
    
        if ($max_price !== null) {
            if (is_float($max_price))
                $gigs->where('price', '<=', floatval($max_price));
            else
                $gigs->where('price', '<=', intval($max_price));
        }
        
        if ($rating !== null) {
            $gigs->where('rating', '=', intval($rating));
        }
        
        $sortCol = 'id';
        $sortDir = 'desc';
        
        if ($sortBy == "Oldest") {
            $sortCol = 'id';
            $sortDir = 'asc';
        } else if ($sortBy == "Highest Price") {
            $sortCol = 'price';
            $sortDir = 'desc';
        } else if ($sortBy == "Lowest Price") {
            $sortCol = 'price';
            $sortDir = 'asc';
        } else if ($sortBy == "Most Popular") {
            $sortCol = 'counter_visits';
            $sortDir = 'desc';
        }
        
        $offset = $count *  $page;
        
        $result = $gigs->when($searchTerm, function ($query) use ($searchTerm) {
                    return $query->where('title', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orderBy($sortCol, $sortDir)
                ->limit($count)
                ->offset($offset)
                ->with('imageMedium')
                ->with('user')
                ->get();
        
       return response()->json([
                    "message" => "Success",
                    "status" => "success",
                    "data" => json_encode($result)], 200);
    }
    
    /**
     * Latest Jobs
     *
     * @return void
     */
    public function latestProjects(Request $request)
    {
        $count = $request->input('count'); 
        $page = $request->input('page'); 
        $searchTerm = $request->input('search'); 
        
        $offset = $count *  $page;
        
        $projects = Project::whereIn('status', ['completed', 'active'])
                ->when($searchTerm, function ($query) use ($searchTerm) {
                    return $query->where('title', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orderBy('id', 'desc')
                ->limit($count)
                ->offset($offset)
                ->with('category')
                ->with('project_skills')
                ->get();

       return response()->json([
                    "message" => "Success",
                    "status" => "success",
                    "data" => json_encode($projects)], 200);
    }
    
     /**
     * All Freelancers
     *
     * @return void
     */
    public function allFreelancers(Request $request)
    {
        $count = $request->input('count'); 
        $page = $request->input('page'); 
        $searchTerm = $request->input('search');
        
        $offset = $count *  $page;
                
        $users = User::where('account_type', 'seller')
                ->when($searchTerm, function ($query) use ($searchTerm) {
                    return $query->where('fullname', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orderBy('id', 'desc')
                ->whereIn('status', ['active', 'verified'])
                ->limit($count)
                ->offset($offset)
                ->with("avatar")
                ->get();
        
       return response()->json([
                    "message" => "Success",
                    "status" => "success",
                    "data" => json_encode($users)], 200);
    }
    
    /**
     * Get Category
     *
     * @return void
     */
    public function category(Request $request)
    {
        $category_id = $request->input('category_id'); 
        $count = $request->input('count'); 
        $page = $request->input('page'); 
        $searchTerm = $request->input('search');
        
        $offset = $count *  $page;
        
        $gigs = Gig::active()
                ->where('category_id', $category_id)
                ->when($searchTerm, function ($query) use ($searchTerm) {
                    return $query->where('title', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orderBy('created_at', 'desc')
                ->limit($count)
                ->offset($offset)
                ->with('imageMedium')
                ->with('user')
                ->get();
        
        return response()->json([
                    "message" => "Success",
                    "status" => "success",
                    "data" => json_encode($gigs)], 200);
       
    }
    
     /**
     * Get SubCategory
     *
     * @return void
     */
    public function subcategory(Request $request)
    {
        $category_id = $request->input('category_id'); 
        $subcategory_id = $request->input('subcategory_id'); 
        $count = $request->input('count'); 
        $page = $request->input('page'); 
        $searchTerm = $request->input('search');
        
        $offset = $count *  $page;
        
        $gigs = Gig::active()
                ->where(['category_id' => $category_id, 'subcategory_id' => $subcategory_id])
                ->when($searchTerm, function ($query) use ($searchTerm) {
                    return $query->where('title', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orderBy('created_at', 'desc')
                ->limit($count)
                ->offset($offset)
                ->with('imageMedium')
                ->with('user')
                ->get();
        
        return response()->json([
                    "message" => "Success",
                    "status" => "success",
                    "data" => json_encode($gigs)], 200);
       
    }
    
    /**
     * Login Check
     *
     * @return void
     */
    public function loginCheck(Request $request)
    {
        try {

            // Set data
            $email           = $request->input('email');    
            $password        = $request->input('password');  
            
            
            // Validate
            $data = [
                'email' => $email,
                'password' => $password
            ];
            
            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                $errors = $validator->errors();
                
                $err = "";
                
                foreach ($errors->all() as $message) {
                    $err .= $message . '\n';
                }
                
                return response()->json([
                    "message" => $err,
                     "status" => "fail"], 200);
                    
            }
        
            // Set login credentials
            $credentials = ['email' => $email, 'password' => $password];

            // Attempt login
            if (Auth::attempt($credentials, true)) {

                // Check if user active
                if (in_array(auth()->user()->status, ['active', 'verified'])) {
                    
                    $user = User::where('email', $email)
                        ->whereIn('status', ['active', 'verified'])
                        ->with("avatar")
                        ->first();
                    
                    if ($user) {
                        $hasUnseenNotifications = Notification::where('user_id', $user->id)
                            ->where('is_seen', false)
                            ->exists();
                    
                        // Add the "notifications" field to the user object
                        $user->has_notification = $hasUnseenNotifications;
                    
                        return response()->json([
                            "message" => "Login success",
                            "status" => "success",
                            "data" => json_encode($user),
                        ], 200);
                    }

                } else {
                   return response()->json([
                    "message" =>"Inactive User",
                     "status" => "fail"], 200);
                }

            }
       
           return response()->json([
                    "message" =>"Invalid login credentials",
                    "status" => "fail"],
                    200);
                    
        } catch (\Throwable $th) {
            
            return response()->json([
                    "message" =>"Something went wrong",
                    "status" => "fail"],
                    200);
        }
    }
    
    /**
     * Login
     *
     * @return void
     */
    public function login(Request $request)
    {
        try {

            // Set data
            $email           = $request->input('email');    
            $password        = $request->input('password');  
            
            
            // Validate
            $data = [
                'email' => $email,
                'password' => $password
            ];
            
            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                return;
            }
        
            // Set login credentials
            $credentials = ['email' => $email, 'password' => $password];

            // Attempt login
            if (Auth::attempt($credentials, true)) {

                // Check if user active
                if (in_array(auth()->user()->status, ['active', 'verified'])) {
                    
                    session(['hide_header_footer' => 'true']);
                    
                   // Go to home
                    return redirect()->intended('/');
                    

                } else {
                   return;
                }

            }
       
           return;
                    
        } catch (\Throwable $th) {
           return;
        }
    }
    
    
    /**
     * Send password reset to user
     *
     * @return void
     */
    public function resetPassword(Request $request)
    {
        try {
            
             // Set data
            $email           = $request->input('email');
            
            // Validate
            $data = [
                'email' => $email,
            ];
            
            $rules = [
                'email' => 'required|email',
            ];
            

            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                
                $err = "";
                
                foreach ($errors->all() as $message) {
                    $err .= $message . '\n';
                }
                
                return response()->json([
                    "message" => $err,
                     "status" => "fail"], 200);
                
                return;
            }
            
            // Get email address
            $email                 = clean($email );

            // Get user with same email address
            $user                  = User::where('email', $email)
                                            ->whereIn('status', ['active', 'verified', 'pending'])
                                            ->whereNotNull('password')
                                            ->first();

            // Check if there is a user with that email address
            if ($user) {

                // Delete old tokens
                PasswordReset::where('email', $user->email)->delete();

                // Generate a token
                $token             = uid(64);

                // Save token
                $reset             = new PasswordReset();
                $reset->token      = $token;
                $reset->email      = $email;
                $reset->expires_at = now()->addMinutes( settings('auth')->password_reset_expiry_period );
                $reset->save();

                // Send notification to user
                $user->notify( (new PasswordResetNotification($reset))->locale(config('app.locale')) );

            }

            return response()->json([
                    "message" =>"success",
                    "status" => "success"],
                    200);

        } catch (\Throwable $th) {

            return response()->json([
                    "message" =>"Something went wrong",
                    "status" => "fail"],
                    200);

        }
    }

    /**
     * Create new account
     *
     * @param array $form
     * @return mixed
     */
    public function register(Request $request)
    {
        try {

            // Set data
            $email           = $request->input('email');    
            $password        = $request->input('password'); 
            $fullname        = $request->input('fullname'); 
            $username        = $request->input('username'); 
            
            // Validate
            $data = [
                'email' => $email,
                'password' => $password,
                'fullname' => $fullname,
                'username' => $username
            ];
            
            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:6',
                'fullname' => 'required',
                'username' => 'required|min:6',
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                $errors = $validator->errors();
                
                $err = "";
                
                foreach ($errors->all() as $message) {
                    $err .= $message . '\n';
                }
                
                return response()->json([
                    "message" => $err,
                     "status" => "fail"], 200);
                    
            }
            
            
            // Get auth settings
            $settings       = settings('auth');

            // Create new user
            $user           = new User();
            $user->uid      = uid();
            $user->fullname = clean($fullname);
            $user->email    = clean($email);
            $user->username = clean($username);
            $user->password = Hash::make($password);
            $user->status   = $settings->verification_required ? 'pending' : 'active';
            $user->level_id = 1;
            $user->save();

            // Check if user requires verification
            if ($settings->verification_required) {
                
                // Check if verification using email
                if ($settings->verification_type === 'email') {
                    
                    // Generate token
                    $token                    = uid(64);

                    // Generate verification
                    $verification             = new EmailVerification();
                    $verification->token      = $token;
                    $verification->email      = $email;
                    $verification->expires_at = now()->addMinutes( $settings->verification_expiry_period );
                    $verification->save();

                    // Send notification to user
                    $user->notify( (new VerifyEmail($verification))->locale(config('app.locale')) );

                    // Redirect to same page with success message
                    //return redirect('auth/register')->with('success', __('messages.t_register_verification_email_sent', ['email' => $email, 'minutes' => $settings->verification_expiry_period]));
                    
                    $dataArray = [
                        "email" => $email,
                        "minutes" => $settings->verification_expiry_period
                    ]; 
                    
                    return response()->json([
                        "message" =>"success",
                        "status" => "success",
                        "data" => json_encode($dataArray)],
                        200);

                }
            }

            return response()->json([
                    "message" => "success",
                    "status" => "success",
                    "data"  => null],
                    200);

        } catch (\Throwable $th) {
            
            return response()->json([
                    "message" =>"Something went wrong",
                    "status" => "fail",
                    "data"  => null],
                    200);
        }
    }
    
    /**
     * Login/Register - Google
     *
     * @param array $form
     * @return mixed
     */
    public function authGoogle(Request $request)
    {
        $accessToken = $request->input('access_token');
        $user = Socialite::driver('google')->userFromToken($accessToken);

        // Generate username
        $nickname        = $this->username($user->getEmail());

        // Get email address
        $email           = $user->getEmail();

        // Get name
        $name            = $user->getName();

        // Get avatar
        $avatar          = $user->getAvatar();

        // Get user from database where this google email is same
        $is_email_exists = User::withTrashed()->where('email', $email)->first();

        // Check if this email address, already exists
        if ($is_email_exists) {
            if ($is_email_exists->provider_id == $user->getId()) {
                $user = User::where('email', $email)
                        ->whereIn('status', ['active', 'verified'])
                        ->with("avatar")
                        ->first();
                    
                    if ($user) {
                        $hasUnseenNotifications = Notification::where('user_id', $user->id)
                            ->where('is_seen', false)
                            ->exists();
                    
                        // Add the "notifications" field to the user object
                        $user->has_notification = $hasUnseenNotifications;
                    
                        return response()->json([
                            "message" => "Login success",
                            "status" => "success",
                            "data" => json_encode($user),
                        ], 200);
                    }
            }
        }

        // Get user with same username
        $is_username_exists = User::withTrashed()->where('username', $nickname)
                                    ->whereNull('provider_name')
                                    ->whereNull('provider_id')
                                    ->first();

        // Check if username exists
        if ($is_username_exists) {
            $username = $nickname . "_" . substr(md5(microtime()),rand(0,26),4);
        } else {
            $username = $nickname;
        }

        // Check if user has avatar
        if ($avatar) {
            
            // Save user avatar
            $avatar_id = ImageUploader::fromUrl($avatar, 'avatars');

        } else {
            $avatar_id = null;
        }

        // Now we can create this user
        $save = User::firstOrCreate(
            [
                'email'         => $email,
                'provider_id'   => $user->getId(),
                'provider_name' => "google"
            ],
            [
                'avatar_id'         => $avatar_id,
                'email_verified_at' => now(),
                'status'            => 'active',
                'level_id'          => 1,
                'uid'               => uid(),
                'username'          => $username,
                'fullname'          => $name ? $name : null
            ]
        );
        
        $user = User::where('email', $email)
                        ->whereIn('status', ['active', 'verified'])
                        ->with("avatar")
                        ->first();
                    
                    if ($user) {
                        $hasUnseenNotifications = Notification::where('user_id', $user->id)
                            ->where('is_seen', false)
                            ->exists();
                    
                        // Add the "notifications" field to the user object
                        $user->has_notification = $hasUnseenNotifications;
                    
                        return response()->json([
                            "message" => "Login success",
                            "status" => "success",
                            "data" => json_encode($user),
                        ], 200);
                    }
    }
    
    /**
     * Google Login
     *
     * @return void
     */
    public function googleLogin(Request $request)
    {
        $accessToken = $request->input('access_token');
        $user = Socialite::driver('google')->userFromToken($accessToken);

        // Generate username
        $nickname        = $this->username($user->getEmail());

        // Get email address
        $email           = $user->getEmail();

        // Get name
        $name            = $user->getName();

        // Get avatar
        $avatar          = $user->getAvatar();

        // Get user from database where this google email is same
        $is_email_exists = User::withTrashed()->where('email', $email)->first();

        // Check if this email address, already exists
        if ($is_email_exists) {
            if ($is_email_exists->provider_id == $user->getId()) {
                
                $user = User::where('email', $email)
                            ->whereIn('status', ['active', 'verified'])
                            ->with("avatar")
                            ->first() ;
                
                Auth::login($user, true);
                
                session(['hide_header_footer' => 'true']);
                
                 return redirect()->intended('/');
            }
        }
    }
    
    /**
     * Login/Register - GitHub
     *
     * @param array $form
     * @return mixed
     */
    public function authGitHub(Request $request)
    {
        $accessToken = $request->input('access_token');
        $user = Socialite::driver('github')->userFromToken($accessToken);

        // Generate username
        $nickname        = $this->username($user->getEmail());

        // Get email address
        $email           = $user->getEmail();

        // Get name
        $name            = $user->getName();

        // Get avatar
        $avatar          = $user->getAvatar();

        // Get user from database where this google email is same
        $is_email_exists = User::withTrashed()->where('email', $email)->first();

        // Check if this email address, already exists
        if ($is_email_exists) {
            if ($is_email_exists->provider_id == $user->getId()) {
                $user = User::where('email', $email)
                        ->whereIn('status', ['active', 'verified'])
                        ->with("avatar")
                        ->first();
                    
                    if ($user) {
                        $hasUnseenNotifications = Notification::where('user_id', $user->id)
                            ->where('is_seen', false)
                            ->exists();
                    
                        // Add the "notifications" field to the user object
                        $user->has_notification = $hasUnseenNotifications;
                    
                        return response()->json([
                            "message" => "Login success",
                            "status" => "success",
                            "data" => json_encode($user),
                        ], 200);
                    }
            }
        }

        // Get user with same username
        $is_username_exists = User::withTrashed()->where('username', $nickname)
                                    ->whereNull('provider_name')
                                    ->whereNull('provider_id')
                                    ->first();

        // Check if username exists
        if ($is_username_exists) {
            $username = $nickname . "_" . substr(md5(microtime()),rand(0,26),4);
        } else {
            $username = $nickname;
        }

        // Check if user has avatar
        if ($avatar) {
            
            // Save user avatar
            $avatar_id = ImageUploader::fromUrl($avatar, 'avatars');

        } else {
            $avatar_id = null;
        }

        // Now we can create this user
        $save = User::firstOrCreate(
            [
                'email'         => $email,
                'provider_id'   => $user->getId(),
                'provider_name' => "github"
            ],
            [
                'avatar_id'         => $avatar_id,
                'email_verified_at' => now(),
                'status'            => 'active',
                'level_id'          => 1,
                'uid'               => uid(),
                'username'          => $username,
                'fullname'          => $name ? $name : null
            ]
        );
        
        $user = User::where('email', $email)
                        ->whereIn('status', ['active', 'verified'])
                        ->with("avatar")
                        ->first();
                    
                    if ($user) {
                        $hasUnseenNotifications = Notification::where('user_id', $user->id)
                            ->where('is_seen', false)
                            ->exists();
                    
                        // Add the "notifications" field to the user object
                        $user->has_notification = $hasUnseenNotifications;
                    
                        return response()->json([
                            "message" => "Login success",
                            "status" => "success",
                            "data" => json_encode($user),
                        ], 200);
                    }
    }
    
    /**
     * GitHub Login
     *
     * @return void
     */
    public function gitHubLogin(Request $request)
    {
        $accessToken = $request->input('access_token');
        $user = Socialite::driver('github')->userFromToken($accessToken);

        // Generate username
        $nickname        = $this->username($user->getEmail());

        // Get email address
        $email           = $user->getEmail();

        // Get name
        $name            = $user->getName();

        // Get avatar
        $avatar          = $user->getAvatar();

        // Get user from database where this google email is same
        $is_email_exists = User::withTrashed()->where('email', $email)->first();

        // Check if this email address, already exists
        if ($is_email_exists) {
            if ($is_email_exists->provider_id == $user->getId()) {
                
                $user = User::where('email', $email)
                            ->whereIn('status', ['active', 'verified'])
                            ->with("avatar")
                            ->first() ;
                
                Auth::login($user, true);
                
                session(['hide_header_footer' => 'true']);
                
                return redirect()->intended('/');
            }
        }
    }
    
    /**
     * Login/Register - Facebook
     *
     * @param array $form
     * @return mixed
     */
    public function authFacebook(Request $request)
    {
        $accessToken = $request->input('access_token');
        $user = Socialite::driver('facebook')->userFromToken($accessToken);

        // Generate username
        $nickname        = $this->username($user->getEmail());

        // Get email address
        $email           = $user->getEmail();

        // Get name
        $name            = $user->getName();

        // Get avatar
        $avatar          = $user->getAvatar();

        // Get user from database where this google email is same
        $is_email_exists = User::withTrashed()->where('email', $email)->first();

        // Check if this email address, already exists
        if ($is_email_exists) {
            if ($is_email_exists->provider_id == $user->getId()) {
                $user = User::where('email', $email)
                        ->whereIn('status', ['active', 'verified'])
                        ->with("avatar")
                        ->first();
                    
                    if ($user) {
                        $hasUnseenNotifications = Notification::where('user_id', $user->id)
                            ->where('is_seen', false)
                            ->exists();
                    
                        // Add the "notifications" field to the user object
                        $user->has_notification = $hasUnseenNotifications;
                    
                        return response()->json([
                            "message" => "Login success",
                            "status" => "success",
                            "data" => json_encode($user),
                        ], 200);
                    }
            }
        }

        // Get user with same username
        $is_username_exists = User::withTrashed()->where('username', $nickname)
                                    ->whereNull('provider_name')
                                    ->whereNull('provider_id')
                                    ->first();

        // Check if username exists
        if ($is_username_exists) {
            $username = $nickname . "_" . substr(md5(microtime()),rand(0,26),4);
        } else {
            $username = $nickname;
        }

        // Check if user has avatar
        if ($avatar) {
            
            // Save user avatar
            $avatar_id = ImageUploader::fromUrl($avatar, 'avatars');

        } else {
            $avatar_id = null;
        }

        // Now we can create this user
        $save = User::firstOrCreate(
            [
                'email'         => $email,
                'provider_id'   => $user->getId(),
                'provider_name' => "facebook"
            ],
            [
                'avatar_id'         => $avatar_id,
                'email_verified_at' => now(),
                'status'            => 'active',
                'level_id'          => 1,
                'uid'               => uid(),
                'username'          => $username,
                'fullname'          => $name ? $name : null
            ]
        );
        
        $user = User::where('email', $email)
                        ->whereIn('status', ['active', 'verified'])
                        ->with("avatar")
                        ->first();
                    
                    if ($user) {
                        $hasUnseenNotifications = Notification::where('user_id', $user->id)
                            ->where('is_seen', false)
                            ->exists();
                    
                        // Add the "notifications" field to the user object
                        $user->has_notification = $hasUnseenNotifications;
                    
                        return response()->json([
                            "message" => "Login success",
                            "status" => "success",
                            "data" => json_encode($user),
                        ], 200);
                    }
    }
    
     /**
     * Generate username
     *
     * @param string $nickname
     * @param string $name
     * @return string
     */
    private function username($email)
    {
        $parts = explode("@", $email);
        
        if (count($parts) === 2) {
            return $parts[0];
        } else {
            return $email;
        }
    }
    
    /**
     * Update Account Type
     *
     * @param array $form
     * @return mixed
     */
    public function updateAccountType(Request $request)
    {
        $user_id = $request->input('user_id');    
        $account_type = $request->input('account_type');    
        
        User::where('id', $user_id)->update(array('account_type'=>$account_type));
        
        return response()->json([
                    "message" =>"Success",
                    "status" => "success",
                    "data"  => null],
                    200);
    }
    
    public function loginSettings(Request $request)
    {
        $settings = settings('auth');
        
        $configData = [
            'facebook_client_id' => config('services.facebook.client_id'),
            'facebook_client_secret' => config('services.facebook.client_secret'),
            'twitter_client_id' => config('services.twitter.client_id'),
            'twitter_client_secret' => config('services.twitter.client_secret'),
            'google_client_id' => config('services.google.client_id'),
            'google_client_secret' => config('services.google.client_secret'),
            'github_client_id' => config('services.github.client_id'),
            'github_client_secret' => config('services.github.client_secret'),
            'linkedin_client_id' => config('services.linkedin.client_id'),
            'linkedin_client_secret' => config('services.linkedin.client_secret'),
            'is_facebook_login' => $settings->is_facebook_login ? 1 : 0,
            'is_google_login' => $settings->is_google_login ? 1 : 0,
            'is_twitter_login' => $settings->is_twitter_login ? 1 : 0,
            'is_github_login' => $settings->is_github_login ? 1 : 0,
            'is_linkedin_login' => $settings->is_linkedin_login ? 1 : 0,
        ];

        $jsonString = json_encode($configData);
        $json = json_decode($jsonString);

        return response()->json([
                    "message" =>"Success",
                    "status" => "success",
                    "data"  => json_encode($json)],
                    200);
    }
    
    /**
     * Logout
     *
     */
    public function appLogout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return response()->json([
                    "message" =>"Success",
                    "status" => "success",
                    "data"  => null],
                    200);
    }
    
    /**
     * Notification
     *
     */
    public function notifications(Request $request)
    {
        $user_id = $request->input('user_id');

        $notif = Notification::where('user_id', $user_id)
            ->where('is_seen', false)
            ->latest()
            ->get();
        
        foreach ($notif as $notification) {
            $translatedText = "";
            $translatedText = __('messages.' . $notification->text);
            $notification->fill(['text' => $translatedText]);
        }
        
        return response()->json([
            "message" => "Success",
            "status" => "success",
            "data" => json_encode($notif),
        ], 200);
    }
    
    /**
     * Seen Notification
     *
     */
    public function seenNotification(Request $request)
    {
        $notif_id = $request->input('notif_id');    
        
        Notification::where('id', $notif_id)->update(array('is_seen'=>1));
        
        return response()->json([
            "message" => "Success",
            "status" => "success",
            "data" => null,
        ], 200);
    }
    
    /**
     * Mark All Notifications
     *
     */
    public function markAllNotifications(Request $request)
    {
        $user_id = $request->input('user_id');
        
        Notification::where('user_id', $user_id)->update(array('is_seen'=>1));
        
        return response()->json([
            "message" => "Success",
            "status" => "success",
            "data" => null,
        ], 200);
    }
}
