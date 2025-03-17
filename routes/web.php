<?php

use Illuminate\Support\Facades\Route;

// Updater
if (File::exists(app_path('Http/Controllers/Update/UpdateController.php'))) {

    // Upgrade
    Route::namespace('App\Http\Controllers\Update')->prefix('update')->group(function() {

        // Index
        Route::get('/', 'UpdateController@update');

    });

}


// Tasks
Route::prefix('tasks')->group(function() {

    // Queue
    Route::get('queue', function() {

        Artisan::call('queue:work', ['--stop-when-empty' => true, '--force' => true]);

    });

    // Schedule
    Route::get('schedule', function() {

        Artisan::call('schedule:run');

    });

});

// Main (Livewire)
Route::namespace('App\Http\Livewire\Main')->group(function() {

    // Home
    Route::namespace('Home')->group(function() {
    
        // Home
        Route::get('/', HomeComponent::class);
    
    });

    // Explore
    Route::namespace('Explore')->prefix('explore')->group(function() {

        // Projects
        Route::namespace('Projects')->prefix('projects')->group(function() {

            // Browse projects
            Route::get('/', ProjectsComponent::class);

            // Category
            Route::get('{category_slug}', CategoryComponent::class);

            // Skill
            Route::get('{category_slug}/{skill_slug}', SkillComponent::class);

        });

    });

    // Project
    Route::namespace('Project')->prefix('project')->group(function() {

        // Project
        Route::get('{pid}/{slug}', ProjectComponent::class);

    });

    // Blog
    Route::namespace('Blog')->prefix('blog')->group(function() {

        // Index
        Route::get('/', BlogComponent::class);

        // Article
        Route::get('{slug}', ArticleComponent::class);

    });

    // Sellers
    Route::namespace('Sellers')->prefix('sellers')->group(function() {

        // Index
        Route::get('/', SellersComponent::class);

    });

    // Redirect
    Route::namespace('Redirect')->prefix('redirect')->group(function() {

        // To
        Route::get('/', RedirectComponent::class);

    });

    // Newsletter
    Route::namespace('Newsletter')->prefix('newsletter')->group(function() {

        // Verify
        Route::get('verify', VerifyComponent::class);

    });
    
    // Authentication 
    Route::namespace('Auth')->middleware('guest')->prefix('auth')->group(function() {

        // Register
        Route::get('register', RegisterComponent::class);

        // Login
        Route::get('login', LoginComponent::class)->name('login');

        // Verify
        Route::get('verify', VerifyComponent::class);

        // Request verification
        Route::get('request', RequestComponent::class);

        // Password
        Route::namespace('Password')->prefix('password')->group(function() {

            // Reset
            Route::get('reset', ResetComponent::class);

            // Update
            Route::get('update', UpdateComponent::class);

        });

        // Social media
        Route::namespace('Social')->group(function() {

            // Github
            Route::namespace('Github')->prefix('github')->group(function() {

                // Redirect
                Route::get('/', RedirectComponent::class);

                // Callback
                Route::get('callback', CallbackComponent::class);

            });

            // Linkedin
            Route::namespace('Linkedin')->prefix('linkedin')->group(function() {

                // Redirect
                Route::get('/', RedirectComponent::class);

                // Callback
                Route::get('callback', CallbackComponent::class);

            });

            // Google
            Route::namespace('Google')->prefix('google')->group(function() {

                // Redirect
                Route::get('/', RedirectComponent::class);

                // Callback
                Route::get('callback', CallbackComponent::class);

            });

            // Facebook
            Route::namespace('Facebook')->prefix('facebook')->group(function() {

                // Redirect
                Route::get('/', RedirectComponent::class);

                // Callback
                Route::get('callback', CallbackComponent::class);

            });

            // Twitter
            Route::namespace('Twitter')->prefix('twitter')->group(function() {

                // Redirect
                Route::get('/', RedirectComponent::class);

                // Callback
                Route::get('callback', CallbackComponent::class);

            });

        });

    });

    // Logout
    Route::namespace('Auth')->middleware('auth')->prefix('auth')->group(function() {

        // Logout
        Route::get('logout', LogoutComponent::class);

    });

    // Service
    Route::namespace('Service')->prefix('service')->group(function() {

        // Slug
        Route::get('{slug}', ServiceComponent::class)->name('service');

    });

    // Cart
    Route::namespace('Cart')->prefix('cart')->group(function() {

        // cart
        Route::get('/', CartComponent::class);

    });

    // Checkout
    Route::namespace('Checkout')->prefix('checkout')->middleware('auth')->group(function() {

        // Checkout
        Route::get('/', CheckoutComponent::class);

    });

    // Account
    Route::namespace('Account')->prefix('account')->middleware('auth')->group(function() {

        // Settings
        Route::namespace('Settings')->group(function() {

            // Index
            Route::get('settings', SettingsComponent::class);

        });

        // Password
        Route::namespace('Password')->group(function() {

            // Index
            Route::get('password', PasswordComponent::class);

        });

        // Profile
        Route::namespace('Profile')->group(function() {

            // Index
            Route::get('profile', ProfileComponent::class);

        });

        // Verification center
        Route::namespace('Verification')->group(function() {

            // Index
            Route::get('verification', VerificationComponent::class);

        });

        // Orders
        Route::namespace('Orders')->prefix('orders')->group(function() {

            // All
            Route::get('/', OrdersComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Requirements
                Route::get('requirements', RequirementsComponent::class);

                // Delivered work
                Route::get('files', FilesComponent::class);

            });

        });

        // Reviews
        Route::namespace('Reviews')->prefix('reviews')->group(function() {

            // Reviews
            Route::get('/', ReviewsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Create
                Route::get('create/{itemId}', CreateComponent::class);

                // Preview
                Route::get('preview/{id}', PreviewComponent::class);

                // Edit
                Route::get('edit/{id}', EditComponent::class);

            });

        });

        // Favorite list
        Route::namespace('Favorite')->prefix('favorite')->group(function() {

            // List
            Route::get('/', FavoriteComponent::class);

        });

        // Billing
        Route::namespace('Billing')->prefix('billing')->group(function() {

            // Billing
            Route::get('/', BillingComponent::class);

        });

        // Refunds
        Route::namespace('Refunds')->prefix('refunds')->group(function() {

            // Refund
            Route::get('/', RefundsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Request
                Route::get('request/{id}', RequestComponent::class);

                // Details
                Route::get('details/{id}', DetailsComponent::class);

            });

        });

        // Deposit
        Route::namespace('Deposit')->prefix('deposit')->group(function() {

            // Deposit
            Route::get('/', DepositComponent::class);

            // History
            Route::get('history', HistoryComponent::class);

        });

        // Projects
        Route::namespace('Projects')->prefix('projects')->group(function() {

            // Projects
            Route::get('/', ProjectsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Checkout
                Route::get('checkout/{id}', CheckoutComponent::class);

                // Milestones
                Route::get('milestones/{id}', MilestonesComponent::class);
                
            });

        });

        // Sessions
        Route::namespace('Sessions')->prefix('sessions')->group(function() {

            // All
            Route::get('/', SessionsComponent::class);

        });

        // Submitted offers
        Route::namespace('Offers')->prefix('offers')->group(function() {

            // All
            Route::get('/', OffersComponent::class);

        });

    });

    // Create
    Route::namespace('Create')->middleware('auth')->group(function() {

        // Service
        Route::get('create', CreateComponent::class);

    });

    // Start selling
    Route::namespace('Become')->prefix('start_selling')->group(function() {

        // Become seller
        Route::get('/', SellerComponent::class);

    });

    // Seller dashboard
    Route::namespace('Seller')->prefix('seller')->middleware('seller')->group(function() {

        // Home
        Route::namespace('Home')->prefix('home')->group(function() {

            // Index
            Route::get('/', HomeComponent::class);

        });

        // Gigs
        Route::namespace('Gigs')->prefix('gigs')->group(function() {

            // Index
            Route::get('/', GigsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Analytics
                Route::get('analytics/{id}', AnalyticsComponent::class);

                // Edit
                Route::get('edit/{id}', EditComponent::class);

            });

        });

        // Reviews
        Route::namespace('Reviews')->prefix('reviews')->group(function() {

            // Index
            Route::get('/', ReviewsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Details
                Route::get('details/{id}', DetailsComponent::class);

            });

        });

        // Orders
        Route::namespace('Orders')->prefix('orders')->group(function() {

            // Index
            Route::get('/', OrdersComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Details
                Route::get('details/{id}', DetailsComponent::class);

                // Deliver
                Route::get('deliver/{id}', DeliverComponent::class);

                // Requirements
                Route::get('requirements/{id}', RequirementsComponent::class);

            });

        });

        // Portfolio
        Route::namespace('Portfolio')->prefix('portfolio')->group(function() {

            // Index
            Route::get('/', PortfolioComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Create
                Route::get('create', CreateComponent::class);

                // Edit
                Route::get('edit/{id}', EditComponent::class);

            });

        });

        // Earnings
        Route::namespace('Earnings')->prefix('earnings')->group(function() {

            // Index
            Route::get('/', EarningsComponent::class);

        });

        // Withdrawals
        Route::namespace('Withdrawals')->prefix('withdrawals')->group(function() {

            // Index
            Route::get('/', WithdrawalsComponent::class);

            // Settings
            Route::get('settings', SettingsComponent::class);

            // Create
            Route::get('create', CreateComponent::class);

        });

        // Refunds
        Route::namespace('Refunds')->prefix('refunds')->group(function() {

            // Index
            Route::get('/', RefundsComponent::class);

            // Options
            Route::namespace('Options')->group(function() {

                // Details
                Route::get('details/{id}', DetailsComponent::class);

            });

        });

        // Projects
        Route::namespace('Projects')->prefix('projects')->group(function() {

            // Index
            Route::get('/', ProjectsComponent::class);

            // Milestones
            Route::namespace('Milestones')->prefix('milestones')->group(function() {

                // List
                Route::get('{id}', MilestonesComponent::class);

            });

            // Bid
            Route::namespace('Bids')->prefix('bids')->group(function() {

                // List
                Route::get('/', BidsComponent::class);

                // Options
                Route::namespace('Options')->group(function() {

                    // Checkout
                    Route::get('checkout/{id}', CheckoutComponent::class);

                    // Edit
                    Route::get('edit/{id}', EditComponent::class);

                });

            });

        });

        // Offers
        Route::namespace('Offers')->prefix('offers')->group(function() {

            // All
            Route::get('/', OffersComponent::class);

        });

    });

    // Help
    Route::namespace('Help')->prefix('help')->group(function() {

        // Contact
        Route::namespace('Contact')->group(function() {

            // Index
            Route::get('contact', ContactComponent::class);

        });

    });

    // Categories
    Route::namespace('Categories')->prefix('categories')->group(function() {

        // Parent category
        Route::get('{parent}', CategoryComponent::class);

        // Subcategory
        Route::get('{parent}/{subcategory}', SubcategoryComponent::class);

    });

    // Profile
    Route::namespace('Profile')->prefix('profile')->group(function() {

        // Username
        Route::get('{username}', ProfileComponent::class);

        // Portfolio list
        Route::get('{username}/portfolio', PortfolioComponent::class);

        // Get project
        Route::get('{username}/portfolio/{slug}', ProjectComponent::class);

    });

    // Hire
    Route::namespace('Hire')->prefix('hire')->group(function() {

        // skill
        Route::get('{keyword}', HireComponent::class);

    });

    // Messages
    Route::namespace('Messages')->prefix('messages')->middleware('auth')->group(function() {

        // Index
        Route::get('/', MessagesComponent::class);

        // New
        Route::get('new/{username}', NewComponent::class);

        // Conversation
        Route::get('{conversationId}', ConversationComponent::class);

    });

    // Search
    Route::namespace('Search')->prefix('search')->group(function() {

        // Keyword
        Route::get('/', SearchComponent::class);

    });

    // Page
    Route::namespace('Page')->prefix('page')->group(function() {

        // Index
        Route::get('{slug}', PageComponent::class);

    });

    // Reviews
    Route::namespace('Reviews')->prefix('reviews')->group(function() {

        // Index
        Route::get('{id}', ReviewsComponent::class);

    });

});

// Main (Controllers)
Route::namespace('App\Http\Controllers\Main')->group(function() {

    // Posting
    Route::namespace('Post')->prefix('post')->middleware('auth')->group(function() {

        // Project
        Route::namespace('Project')->prefix('project')->group(function() {

            // Get
            Route::get('/', 'ProjectController@form');

            // Post
            Route::post('/', 'ProjectController@create');

            // Skills
            Route::post('skills', 'ProjectController@skills');

        });

    });

    // Edit project
    Route::namespace('Account\Projects')->prefix('account/projects')->group(function() {

        // Edit
        Route::get('edit/{id}', 'EditController@form');

        // Update
        Route::post('edit/{id}', 'EditController@update');

    });

});

// Uploads
Route::namespace('App\Http\Controllers\Uploads')->prefix('uploads')->group(function() {

    // Documents
    Route::namespace('Documents')->prefix('documents')->group(function() {

        // Doc
        Route::get('{uid}', 'DocumentController@download');

    });

    // Order requirements
    Route::namespace('Requirements')->prefix('requirements')->middleware('auth')->group(function() {

        // Order requirements
        Route::get('{orderId}/{itemId}/{reqId}/{fileId}', 'RequirementsController@download');

    });

    // Order delivered work
    Route::namespace('Delivered')->prefix('delivered')->middleware('auth')->group(function() {

        // Order delivered
        Route::get('{orderId}/{itemId}/{workId}/{fileId}', 'DeliveredController@download');

    });

    // Verifications
    Route::namespace('Verifications')->prefix('verifications')->group(function() {

        // File
        Route::get('{id}/{type}/{fileId}', 'VerificationsController@download');

    });

    // Offers
    Route::namespace('Offers')->prefix('offers')->middleware('auth')->group(function() {

        // File
        Route::get('{file}', 'OffersController@attachment');

        // Work
        Route::get('work/{file}', 'OffersController@work');

    });

});

// Callback routes for payment gateways
Route::namespace('App\Http\Controllers\Callback')->prefix('callback')->group(function() {

    // Asaas
    Route::post('asaas', 'AsaasController@callback');

    // Campay
    Route::get('campay/success', 'CampayController@success');
    Route::get('campay/failed', 'CampayController@failed');

    // Cashfree
    Route::get('cashfree', 'CashfreeController@callback');
    Route::post('cashfree', 'CashfreeController@webhook');

    // cPay
    Route::get('cpay/success', 'CpayController@success');
    Route::get('cpay/failed', 'CpayController@failed');

    // Duitku
    Route::get('duitku', 'DuitkuController@callback');

    // Ecpay
    Route::post('ecpay', 'EcpayController@callback');

    // Epoint.az
    Route::get('epoint/success', 'EpointController@success');
    Route::get('epoint/failed', 'EpointController@failed');

    // FastPay
    Route::get('fastpay/success', 'FastpayController@success');
    Route::get('fastpay/failed', 'FastpayController@failed');
    Route::get('fastpay/cancel', 'FastpayController@cancel');

    // Flutterwave
    Route::get('flutterwave', 'FlutterwaveController@callback');

    // Freekassa
    Route::post('freekassa', 'FreekassaController@webhook');

    // Genie business
    Route::get('genie-business', 'GenieController@callback');
    Route::post('genie-business', 'GenieController@webhook');

    // Iyzico
    Route::post('iyzico', 'IyzicoController@callback');

    // Jazzcash
    Route::post('jazzcash', 'JazzcashController@callback');

    // Mercadopago
    Route::get('mercadopago/success', 'MercadopagoController@success');
    Route::get('mercadopago/pending', 'MercadopagoController@pending');
    Route::get('mercadopago/failed', 'MercadopagoController@failed');

    // Mollie
    Route::get('mollie', 'MollieController@callback');
    Route::post('mollie', 'MollieController@webhook');

    // Nowpayments.io
    Route::post('nowpayments/ipn', 'NowpaymentsController@ipn');
    Route::get('nowpayments/success', 'NowpaymentsController@success');
    Route::get('nowpayments/cancel', 'NowpaymentsController@cancel');

    // Paymob
    Route::get('paymob', 'PaymobController@callback');

    // Paymob Pakistan
    Route::get('paymob-pk', 'PaymobPkController@callback');

    // PayPal
    Route::get('paypal', 'PaypalController@callback');

    // Paystack
    Route::get('paystack', 'PaystackController@callback');
    Route::post('paystack', 'PaystackController@webhook');

    // Paytabs
    Route::post('paytabs', 'PaytabsController@callback');

    // PayTR
    Route::get('paytr/success', 'PaytrController@success');
    Route::get('paytr/failed', 'PaytrController@failed');
    Route::post('paytr', 'PaytrController@webhook');

    // Razorpay
    Route::get('razorpay', 'RazorpayController@callback');

    // Robokassa
    Route::post('robokassa', 'RobokassaController@callback');

    // Stripe
    Route::get('stripe', 'StripeController@callback');

    // Vnpay
    Route::get('vnpay', 'VnpayController@callback');

    // Xendit
    Route::get('xendit/success', 'XenditController@success');
    Route::get('xendit/failed', 'XenditController@failed');
    Route::post('xendit', 'XenditController@webhook');

    // Youcanpay
    Route::get('youcanpay', 'YoucanpayController@callback');

    // API
    Route::get('pages', 'ApiController@pages');
    Route::get('login-check', 'ApiController@loginCheck');
    Route::get('login', 'ApiController@login');
    Route::get('reset-password', 'ApiController@resetPassword');
    Route::get('register', 'ApiController@register');
    Route::get('home', 'ApiController@home');
    Route::get('category', 'ApiController@category');
    Route::get('subcategory', 'ApiController@subcategory');
    Route::get('fetch-gigs', 'ApiController@fetchGigs');
    Route::get('all-freelancers', 'ApiController@allFreelancers');
    Route::get('latest-projects', 'ApiController@latestProjects');
    Route::get('notifications', 'ApiController@notifications');
    Route::get('seen-notification', 'ApiController@seenNotification');
    Route::get('mark-all-notifications', 'ApiController@markAllNotifications');
    Route::get('update-account-type', 'ApiController@updateAccountType');
    Route::get('auth-google', 'ApiController@authGoogle');
    Route::get('google-login', 'ApiController@googleLogin');
    Route::get('auth-github', 'ApiController@authGitHub');
    Route::get('github-login', 'ApiController@gitHubLogin');
    Route::get('auth-facebook', 'ApiController@authFacebook');
    Route::get('facebook-login', 'ApiController@facebookLogin');
    Route::get('login-settings', 'ApiController@loginSettings');
    Route::get('app-logout', 'ApiController@appLogout');
});