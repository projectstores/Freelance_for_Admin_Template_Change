<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale(), false); ?>" dir="<?php echo e(config()->get('direction'), false); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['dark' => current_theme() === 'dark']); ?>">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

        
        <?php echo SEO::generate(); ?>

        <?php echo JsonLd::generate(); ?>


        
		<?php echo settings('appearance')->font_link; ?>


        
        <link rel="icon" type="image/png" href="<?php echo e(src( settings('general')->favicon ), false); ?>"/>

        
		<?php if(settings('hero')->enable_bg_img): ?>

            
            <?php if(settings('hero')->background_small): ?>
                <link rel="preload prefetch" as="image" href="<?php echo e(src(settings('hero')->background_small), false); ?>" type="image/webp" />
            <?php endif; ?>

            
            <?php if(settings('hero')->background_medium): ?>
                <link rel="preload prefetch" as="image" href="<?php echo e(src(settings('hero')->background_medium), false); ?>" type="image/webp" />
            <?php endif; ?>

            
            <?php if(settings('hero')->background_large): ?>
                <link rel="preload prefetch" as="image" href="<?php echo e(src(settings('hero')->background_large), false); ?>" type="image/webp" />
            <?php endif; ?>

        <?php endif; ?>

        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        
        <?php echo \Livewire\Livewire::styles(); ?>


        
        <link rel="preload" href="<?php echo e(mix('css/app.css'), false); ?>" as="style">
        <link rel="stylesheet" href="<?php echo e(mix('css/app.css'), false); ?>">

        
        <link rel="preload" href="<?php echo e(livewire_asset_path(), false); ?>" as="script">

		
        <style>
            :root {
                --color-primary  : <?php echo e(settings('appearance')->colors['primary'], false); ?>;
                --color-primary-h: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[0], false); ?>;
                --color-primary-s: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[1], false); ?>%;
                --color-primary-l: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[2], false); ?>%;
            }
            html {
                font-family: <?php echo settings('appearance')->font_family ?>, sans-serif !important;
            }
            .fileuploader, .fileuploader-popup {
                font-family: <?php echo settings('appearance')->font_family ?>, sans-serif !important;
            }
            .home-hero-section {
                background-color: <?php echo e(settings('hero')->bg_color, false); ?>;
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
                height: <?php echo e(settings('hero')->bg_large_height, false); ?>px;
                margin-top: 30px;
            }
            
            
            <?php if(settings('hero')->enable_bg_img): ?>
                
                
                <?php if(settings('hero')->background_small): ?>
                
                    @media only screen and (max-width: 600px) {
                        .home-hero-section {
                            background-image: url('<?php echo e(src(settings('hero')->background_small), false); ?>');
                            height: <?php echo e(settings('hero')->bg_small_height, false); ?>px;
                            border-radius: 20px;
                            margin-left: 15px;
                            margin-right: 15px;
                        }
                    }

                <?php endif; ?>

                
                <?php if(settings('hero')->background_medium): ?>
                
                    @media only screen and (min-width: 600px) {
                        .home-hero-section {
                            background-image: url('<?php echo e(src(settings('hero')->background_medium), false); ?>');
                            border-radius: 20px;
                        }
                    }

                <?php endif; ?>

                
                <?php if(settings('hero')->background_large): ?>
                
                    @media only screen and (min-width: 768px) {
                        .home-hero-section {
                            background-image: url('<?php echo e(src(settings('hero')->background_large), false); ?>');
                            border-radius: 30px;
                        }
                    }

                <?php endif; ?>

                
                <?php if(settings('hero')->background_large): ?>
                
                    @media only screen and (min-width: 992px) {
                        .home-hero-section {
                            background-image: url('<?php echo e(src(settings('hero')->background_large), false); ?>');
                            border-radius: 30px;
                        }
                    }

                <?php endif; ?>

                
                <?php if(settings('hero')->background_large): ?>
                
                    @media only screen and (min-width: 1200px) {
                        .home-hero-section {
                            background-image: url('<?php echo e(src(settings('hero')->background_large), false); ?>');
                            border-radius: 30px;
                        }
                    }

                <?php endif; ?>

            <?php endif; ?>
            
            @media (max-width: 640px) {
              .custom-font-size {
                font-size: 1.5em;
                line-height: 1.1em;
              }
            }
            
            /* Tablet */
            @media (min-width: 641px) and (max-width: 1024px) {
              .custom-font-size {
                font-size: 2.5em;
                line-height: 1.1em;
              }
            }
            
            /* Desktop */
            @media (min-width: 1025px) {
              .custom-font-size {
                font-size: 3.5em;
                line-height: 1.2em;
              }
            }
            
            
            
            
            
            @media (max-width: 640px) {
              .newsletter-font-size {
                font-size: 2.6em;
                line-height: 1.1em;
              }
            }
            
            /* Tablet */
            @media (min-width: 641px) and (max-width: 1024px) {
              .newsletter-font-size {
                font-size: 2.6em;
                line-height: 1.1em;
              }
            }
            
            /* Desktop */
            @media (min-width: 1025px) {
              .newsletter-font-size {
                font-size: 2.8em;
                line-height: 1.1em;
              }
            }
            
        </style>

        
        <?php echo $__env->yieldPushContent('styles'); ?>

        
        <script>
            __var_app_url        = "<?php echo e(url('/'), false); ?>";
            __var_app_locale     = "<?php echo e(app()->getLocale(), false); ?>";
            __var_rtl            = <?php echo \Illuminate\Support\Js::from(config()->get('direction') === 'ltr' ? false : true)->toHtml() ?>;
            __var_primary_color  = "<?php echo e(settings('appearance')->colors['primary'], false); ?>";
            __var_axios_base_url = "<?php echo e(url('/'), false); ?>/";
            __var_currency_code  = "<?php echo e(settings('currency')->code, false); ?>";
        </script>

        
        <?php if(advertisements('header_code')): ?>
            <?php echo advertisements('header_code'); ?>

        <?php endif; ?>

        
        <?php if(settings('appearance')->custom_code_head_main_layout): ?>
            <?php echo settings('appearance')->custom_code_head_main_layout; ?>

        <?php endif; ?>

    </head>

    <body class="antialiased dark:bg-[#161616] text-gray-600 min-h-full flex flex-col application application-ltr overflow-x-hidden overflow-y-scroll <?php echo e(app()->getLocale() === 'ar' ? 'application-ar' : '', false); ?>" style="overflow-y: scroll">

        
        <?php if (isset($component)) { $__componentOriginal10717d162484e57a570d6d2cc4597545 = $component; } ?>
<?php $component = WireUi\View\Components\Notifications::resolve(['position' => 'top-center','zIndex' => 'z-[65]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notifications'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Notifications::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10717d162484e57a570d6d2cc4597545)): ?>
<?php $component = $__componentOriginal10717d162484e57a570d6d2cc4597545; ?>
<?php unset($__componentOriginal10717d162484e57a570d6d2cc4597545); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginal2451dfd9df7c01154a83baa9ef28b9d5 = $component; } ?>
<?php $component = WireUi\View\Components\Dialog::resolve(['zIndex' => 'z-[65]','blur' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dialog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Dialog::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2451dfd9df7c01154a83baa9ef28b9d5)): ?>
<?php $component = $__componentOriginal2451dfd9df7c01154a83baa9ef28b9d5; ?>
<?php unset($__componentOriginal2451dfd9df7c01154a83baa9ef28b9d5); ?>
<?php endif; ?>

		
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.includes.header')->html();
} elseif ($_instance->childHasBeenRendered('GDNXiyC')) {
    $componentId = $_instance->getRenderedChildComponentId('GDNXiyC');
    $componentTag = $_instance->getRenderedChildComponentTagName('GDNXiyC');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GDNXiyC');
} else {
    $response = \Livewire\Livewire::mount('main.includes.header');
    $html = $response->html();
    $_instance->logRenderedChild('GDNXiyC', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        
        <?php if(request()->is('/')): ?>

            
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="home-hero-section">
                    <div class="mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
                        <div class="w-full">
                            
                            
                            <div class="tracking-wide text-center mt-4 tracking-tight font-extrabold text-white sm:mt-5 lg:mt-6 xl:mt-7 custom-font-size">
                                <?php echo e(settings("hero")->tagline, false); ?>

                            </div>
                            <div class="mt-6 sm:mt-12 flex justify-center">
        
                                
                                <form class="flex items-center mb-4" action="<?php echo e(url('search'), false); ?>" accept="GET" style="background-color: #FFF; border-radius: 10px; padding-right: 9px; padding-top: 5px; padding-bottom: 5px; width: 800px;">   
        
                                    
                                    <div class="relative w-full">
                                        <input type="search" name="q" class="bg-white border-none text-gray-900 text-lg font-medium rounded-xl block w-full ltr:pl-5 rtl:pr-10 px-2.5 py-4 focus:outline-none focus:ring-0" placeholder="<?php echo e(__('messages.t_what_service_are_u_looking_for_today'), false); ?>" required>
                                    </div>
        
                                    
                                    <button type="submit" class="px-3 py-3 ltr:ml-2 rtl:mr-2 text-white bg-primary-600 rounded-md border-none hover:bg-primary-800 focus:ring-0 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                                    </button>
        
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        
        <?php echo $__env->make('Chatify::layouts.headLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main class="flex-grow"> 
            <div class="container space-y-8 min-h-screen">
               <div class="messenger">
                    
                    <div class="messenger-listView ltr:border-r rtl:border-l dark:border-zinc-700">
            
                        
                        <div class="m-header">
            
                            
                            <div class="mt-3 px-8">
                                <div class="relative flex space-x-3 rtl:space-x-reverse group">
                                    <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                        <div>
                                            <p class="-mt-1 text-black font-bold text-3xl dark:text-white">
                                                <?php echo app('translator')->get('messages.t_inbox'); ?>
                                            </p>
                                        </div>
                                        <div class="whitespace-nowrap text-right">
                                            <div class="listView-x">
                                                <svg class="!text-slate-500 dark:!text-slate-300 h-3.5 w-3.5 mt-0.5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            
                            <nav class="w-full mt-4">
                                <div class="w-full px-8">
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="pointer-events-none absolute inset-y-0 ltr:left-0 rtl:right-0 flex items-center ltr:pl-3 rtl:pr-3">
                                            <svg class="h-4 w-4 !text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="7" r="4"></circle><path d="M6 21v-2a4 4 0 0 1 4 -4h1"></path><circle cx="16.5" cy="17.5" r="2.5"></circle><path d="M18.5 19.5l2.5 2.5"></path></svg>
                                        </div>
                                        <input type="text" class="messenger-search block w-full rounded-full text-black border-2 border-gray-200 dark:border-zinc-700 ltr:pl-10 rtl:pr-10 focus:border-primary-600 focus:ring-primary-600 sm:text-sm" placeholder="<?php echo app('translator')->get('messages.t_search_in_ur_contacts'); ?>">
                                    </div>
                                </div>
                            </nav>
                            
                        </div>
            
                        
                        <div class="m-body contacts-container mt-5">
                           
                           
                           <div class="<?php if($type == 'user'): ?> show <?php endif; ?> messenger-tab users-tab app-scroll" data-view="users">
                
                               
                               <div class="favorites-section border-b dark:border-zinc-700">
                                <p class="messenger-title !px-5"><?php echo app('translator')->get('messages.t_favorites'); ?></p>
                                <div class="messenger-favorites app-scroll-thin !px-5"></div>
                               </div>
                
                               
                               <?php echo view('Chatify::layouts.listItem', ['get' => 'saved']); ?>

                
                               
                               <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>
                
                           </div>
                
                           
                           <div class="<?php if($type == 'group'): ?> show <?php endif; ?> messenger-tab groups-tab app-scroll mt-5" data-view="groups">
                                
                                <p style="text-align: center;color:grey;margin-top:30px">
                                    <a target="_blank" style="color:<?php echo e($messengerColor, false); ?>;" href="#">Click here</a> for more info!
                                </p>
                             </div>
                
                             
                           <div class="messenger-tab search-tab app-scroll mt-5" data-view="search">
                                <p class="messenger-title !px-5 mb-2"><?php echo app('translator')->get('messages.t_search'); ?></p>
                                <div class="search-records">
                                    <p class="message-hint mt-20"><span><?php echo app('translator')->get('messages.t_type_to_search_in_ur_contacts'); ?></span></p>
                                </div>
                             </div>
            
                        </div>
                    </div>
                
                    
                    <div class="messenger-messagingView border-r border-gray-200">
                        
                        
                        <div class="m-header m-header-messaging py-5 border-b dark:border-zinc-700 px-4" style="display: none">
                            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
            
                                
                                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                    
                                    
                                    <button type="button" class="md:hidden show-listView">
                                        <svg class="h-6 w-6 reflection" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    </button>
            
                                    
                                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                    </div>
            
                                    
                                    <span class="user-name show-infoSide cursor-pointer dark:!text-white text-black text-2xl"><?php echo e(config('app.name'), false); ?></span>
            
                                </div>
            
                                
                                <nav class="m-header-right space-x-3 rtl:space-x-reverse">
            
                                    
                                    <button class="focus:outline-none add-to-favorite">
                                        <svg class="h-6 w-6 text-slate-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    </button>
            
                                </nav>
                                
                            </nav>
                        </div>
                
                        
                        <div class="m-body messages-container app-scroll">
            
                            
                            <div class="internet-connection">
            
                                
                                <span class="ic-connected"><?php echo app('translator')->get('messages.t_chat_connected'); ?></span>
            
                                
                                <span class="ic-connecting"><?php echo app('translator')->get('messages.t_chat_connecting'); ?></span>
            
                                
                                <span class="ic-noInternet"><?php echo app('translator')->get('messages.t_chat_no_internet_access'); ?></span>
            
                            </div>
            
                            <div class="messages space-y-10">
                                <p class="message-hint center-el"><span><?php echo app('translator')->get('messages.t_no_conversation_selected_subtitle'); ?></span></p>
                            </div>
                            
                            <div class="typing-indicator">
                                <div class="message-card typing px-5 !mx-0 !mt-4">
                                    <p>
                                        <span class="typing-dots">
                                            <span class="dot dot-1"></span>
                                            <span class="dot dot-2"></span>
                                            <span class="dot dot-3"></span>
                                        </span>
                                    </p>
                                </div>
                            </div>
                
                        </div>
                        
                        <?php echo $__env->make('Chatify::layouts.sendForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    
                    <div class="messenger-infoView app-scroll" style="display: none">
                        
                        <nav class="py-4">
            
                            
                            <a class="cursor-pointer flex justify-end">
                                <svg class="h-6 w-6 text-gray-400 hover:text-gray-600" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                            
                        </nav>
                        <div class="w-full px-6 flex flex-col space-y-8">
                            <?php echo view('Chatify::layouts.info')->render(); ?>

                        </div>
                    </div>
                </div>
                <?php echo $__env->make('Chatify::layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Chatify::layouts.footerLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </main>


        
        <?php echo \Livewire\Livewire::scripts(); ?>


        
        <script >window.Wireui = {hook(hook, callback) {window.addEventListener(`wireui:${hook}`, () => callback())},dispatchHook(hook) {window.dispatchEvent(new Event(`wireui:${hook}`))}}</script>
<script src="http://localhost/Freelance_for_Admin_Template_Change/wireui/assets/scripts?id=3c15fb3b36f54e2baae1e97b6eb0015e" defer ></script>

        
        <script defer src="<?php echo e(mix('js/app.js'), false); ?>"></script>

        
        <script defer src="<?php echo e(url('public/js/utils.js?v=1.3.1'), false); ?>"></script>
        <script src="<?php echo e(url('public/js/components.js?v=1.3.1'), false); ?>"></script>

        
        <script defer>
            
            document.addEventListener("DOMContentLoaded", function(){

                jQuery.event.special.touchstart = {
                    setup: function( _, ns, handle ) {
                        this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
                    }
                };
                jQuery.event.special.touchmove = {
                    setup: function( _, ns, handle ) {
                        this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
                    }
                };
                jQuery.event.special.wheel = {
                    setup: function( _, ns, handle ){
                        this.addEventListener("wheel", handle, { passive: true });
                    }
                };
                jQuery.event.special.mousewheel = {
                    setup: function( _, ns, handle ){
                        this.addEventListener("mousewheel", handle, { passive: true });
                    }
                };

                // Refresh
                window.addEventListener('refresh',() => {
                    location.reload();
                });

                // Scroll to specific div
                window.addEventListener('scrollTo', (event) => {

                    // Get id to scroll
                    const id = event.detail;

                    // Scroll
                    $('html, body').animate({
                        scrollTop: $("#" + id).offset().top
                    }, 500);ho

                });

                // Scroll to up page
                window.addEventListener('scrollUp', () => {

                    // Scroll
                    $('html, body').animate({
                        scrollTop: $("body").offset().top
                    }, 500);

                });

            });

            function jwUBiFxmwbrUwww() {
                return {

                    scroll: false,

                    init() {
                        var _this = this;
                        $(document).scroll(function () {
                            $(this).scrollTop() > 70 ? _this.scroll = true : _this.scroll = false;
                        });

                    }

                }
            }
            window.jwUBiFxmwbrUwww = jwUBiFxmwbrUwww();

            document.ontouchmove = function(event){
                event.preventDefault();
            }
            
        </script>

        
        <?php echo $__env->yieldPushContent('scripts'); ?>

        
        <?php if(settings('appearance')->custom_code_footer_main_layout): ?>
            <?php echo settings('appearance')->custom_code_footer_main_layout; ?>

        <?php endif; ?>

    </body>

</html>

<?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/vendor/Chatify/pages/app.blade.php ENDPATH**/ ?>