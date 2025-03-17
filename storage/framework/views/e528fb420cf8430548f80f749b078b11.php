<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale(), false); ?>" dir="<?php echo e(config()->get('direction'), false); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['dark' => current_theme() === 'dark', 'h-full']); ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

        
        <?php echo SEO::generate(); ?>


        
        <?php echo settings('appearance')->font_link; ?>


        
        <link rel="icon" type="image/png" href="<?php echo e(src( settings('general')->favicon ), false); ?>"/>

        
        <?php echo \Livewire\Livewire::styles(); ?>


        
        <link rel="preload" href="<?php echo e(mix('css/app.css'), false); ?>" as="style" />
        <link rel="stylesheet" href="<?php echo e(mix('css/app.css'), false); ?>" />

        
        <link rel="preload" href="<?php echo e(livewire_asset_path(), false); ?>" as="script">

        
        <style>
            :root {
                --color-primary-h: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[0], false); ?>;
                --color-primary-s: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[1], false); ?>%;
                --color-primary-l: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[2], false); ?>%;
            }
            html {
                font-family: <?php echo settings('appearance')->font_family ?>, sans-serif !important;
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

        
        <?php if(settings('appearance')->custom_code_head_freelancer_layout): ?>
            <?php echo settings('appearance')->custom_code_head_freelancer_layout; ?>

        <?php endif; ?>

    </head>
    <body class="h-full bg-[#000] dark:bg-zinc-700 application scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-900 dark:scrollbar-track-zinc-600">

        
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

        
        <div x-data="{ open: false, notifications_menu: false }" @keydown.window.escape="open = false">
            
            
            <div x-show="open" class="fixed inset-0 flex z-40 md:hidden" x-ref="dialog" aria-modal="true" style="display: none">
                
                
                <div 
                    x-show="open" 
                    x-transition:enter="transition-opacity ease-linear duration-300" 
                    x-transition:enter-start="opacity-0" 
                    x-transition:enter-end="opacity-100" 
                    x-transition:leave="transition-opacity ease-linear duration-300" 
                    x-transition:leave-start="opacity-100" 
                    x-transition:leave-end="opacity-0" 
                    class="fixed inset-0 bg-gray-600 bg-opacity-75" 
                    @click="open = false" 
                    aria-hidden="true"></div>
                
                
                <div 
                x-show="open" 
                x-transition:enter="transition ease-in-out duration-300 transform" 
                x-transition:enter-start="ltr:-translate-x-full rtl:translate-x-full" 
                x-transition:enter-end="ltr:translate-x-0 rtl:-translate-x-0" 
                x-transition:leave="transition ease-in-out duration-300 transform" 
                x-transition:leave-start="ltr:translate-x-0 rtl:-translate-x-0" 
                x-transition:leave-end="ltr:-translate-x-full rtl:translate-x-full" 
                class="relative flex-1 flex flex-col max-w-xs w-full bg-white pt-5 pb-4 dark:bg-zinc-800">
                    
                    
                    <div 
                        x-show="open" 
                        x-transition:enter="ease-in-out duration-300" 
                        x-transition:enter-start="opacity-0" 
                        x-transition:enter-end="opacity-100" 
                        x-transition:leave="ease-in-out duration-300" 
                        x-transition:leave-start="opacity-100" 
                        x-transition:leave-end="opacity-0" 
                        class="absolute top-0 ltr:right-0 rtl:left-0 ltr:-mr-12 rtl:-ml-12 pt-2">
                            <button type="button" class="ltr:ml-1 rtl:mr-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="open = false">
                                <span class="sr-only">Close sidebar</span>
                                <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                    </div>
                    
                    
                     
                     <?php if(current_theme() === 'dark' && settings('general')->logo_dark): ?>
                         <a href="<?php echo e(url('/'), false); ?>" class="flex items-center justify-center flex-shrink-0 px-5">
                             <img width="150" height="<?php echo e(settings('appearance')->sizes['header_desktop_logo_height'], false); ?>" src="<?php echo e(src(settings('general')->logo_dark), false); ?>" alt="<?php echo e(settings('general')->title, false); ?>" style="height: <?php echo e(settings('appearance')->sizes['header_desktop_logo_height'], false); ?>px;width:auto">
                         </a>
                     <?php else: ?>
                         <a href="<?php echo e(url('/'), false); ?>" class="flex items-center justify-center flex-shrink-0 px-5">
                             <img width="150" height="<?php echo e(settings('appearance')->sizes['header_desktop_logo_height'], false); ?>" src="<?php echo e(src(settings('general')->logo), false); ?>" alt="<?php echo e(settings('general')->title, false); ?>" style="height: <?php echo e(settings('appearance')->sizes['header_desktop_logo_height'], false); ?>px;width:auto">
                         </a>
                     <?php endif; ?>

                    
                    <div class="border-b border-gray-300 mt-7"></div>

                    
                    <div class="mt-8 flex-grow flex flex-col">
                        <nav class="flex-1 px-5 pb-4 space-y-1.5">
                        
                            
                            <a href="<?php echo e(url('seller/home'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/home') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">
                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
                                <span class="font-semibold tracking-tight"><?php echo app('translator')->get('messages.t_home'); ?></span>
                            </a>

                            
                            <a href="<?php echo e(url('seller/orders'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/orders') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">
                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="M240-80q-33 0-56.5-23.5T160-160v-480q0-33 23.5-56.5T240-720h80q0-66 47-113t113-47q66 0 113 47t47 113h80q33 0 56.5 23.5T800-640v480q0 33-23.5 56.5T720-80H240Zm0-80h480v-480h-80v80q0 17-11.5 28.5T600-520q-17 0-28.5-11.5T560-560v-80H400v80q0 17-11.5 28.5T360-520q-17 0-28.5-11.5T320-560v-80h-80v480Zm160-560h160q0-33-23.5-56.5T480-800q-33 0-56.5 23.5T400-720ZM240-160v-480 480Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_orders'); ?></span>
                            </a>

                            
                            <a href="<?php echo e(url('seller/gigs'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/gigs') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">
                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M480-400ZM80-160v-400q0-33 23.5-56.5T160-640h120v-80q0-33 23.5-56.5T360-800h240q33 0 56.5 23.5T680-720v80h120q33 0 56.5 23.5T880-560v400H80Zm240-200v40h-80v-40h-80v120h640v-120h-80v40h-80v-40H320ZM160-560v120h80v-40h80v40h320v-40h80v40h80v-120H160Zm200-80h240v-80H360v80Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_gigs'); ?></span>
                            </a>

                            
                            <?php if(settings('projects')->is_enabled): ?>
                                <a href="<?php echo e(url('seller/projects'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/projects') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                    <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M160-120q-33 0-56.5-23.5T80-200v-440q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v440q0 33-23.5 56.5T800-120H160Zm240-600h160v-80H400v80Zm400 360H600v80H360v-80H160v160h640v-160Zm-360 0h80v-80h-80v80Zm-280-80h200v-80h240v80h200v-200H160v200Zm320 40Z"/></svg>
                                    <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_projects'); ?></span>
                                </a>
                            <?php endif; ?>

                            
                            <?php if(settings('publish')->enable_custom_offers): ?>
                                <a href="<?php echo e(url('seller/offers'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/offers') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                    <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M475-160q4 0 8-2t6-4l328-328q12-12 17.5-27t5.5-30q0-16-5.5-30.5T817-607L647-777q-11-12-25.5-17.5T591-800q-15 0-30 5.5T534-777l-11 11 74 75q15 14 22 32t7 38q0 42-28.5 70.5T527-522q-20 0-38.5-7T456-550l-75-74-175 175q-3 3-4.5 6.5T200-435q0 8 6 14.5t14 6.5q4 0 8-2t6-4l136-136 56 56-135 136q-3 3-4.5 6.5T285-350q0 8 6 14t14 6q4 0 8-2t6-4l136-135 56 56-135 136q-3 2-4.5 6t-1.5 8q0 8 6 14t14 6q4 0 7.5-1.5t6.5-4.5l136-135 56 56-136 136q-3 3-4.5 6.5T454-180q0 8 6.5 14t14.5 6Zm-1 80q-37 0-65.5-24.5T375-166q-34-5-57-28t-28-57q-34-5-56.5-28.5T206-336q-38-5-62-33t-24-66q0-20 7.5-38.5T149-506l232-231 131 131q2 3 6 4.5t8 1.5q9 0 15-5.5t6-14.5q0-4-1.5-8t-4.5-6L398-777q-11-12-25.5-17.5T342-800q-15 0-30 5.5T285-777L144-635q-9 9-15 21t-8 24q-2 12 0 24.5t8 23.5l-58 58q-17-23-25-50.5T40-590q2-28 14-54.5T87-692l141-141q24-23 53.5-35t60.5-12q31 0 60.5 12t52.5 35l11 11 11-11q24-23 53.5-35t60.5-12q31 0 60.5 12t52.5 35l169 169q23 23 35 53t12 61q0 31-12 60.5T873-437L545-110q-14 14-32.5 22T474-80Zm-99-560Z"/></svg>
                                    <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_offers'); ?></span>
                                </a>
                            <?php endif; ?>

                            
                            <a href="<?php echo e(url('seller/reviews'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/reviews') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                <svg class="flex-shrink-0 h-5 w-4 ltr:mr-2 rtl:ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="m363-390 117-71 117 71-31-133 104-90-137-11-53-126-53 126-137 11 104 90-31 133ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_reviews'); ?></span>
                            </a>

                            
                            <a href="<?php echo e(url('seller/refunds'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/refunds') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[1px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M480-400q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0 280q-139 0-241-91.5T122-440h82q14 104 92.5 172T480-200q117 0 198.5-81.5T760-480q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120v-240h80v94q51-64 124.5-99T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_refunds'); ?></span>
                            </a>

                            
                            <a href="<?php echo e(url('seller/portfolio'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/portfolio') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[1px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M160-80q-33 0-56.5-23.5T80-160v-440q0-33 23.5-56.5T160-680h200v-120q0-33 23.5-56.5T440-880h80q33 0 56.5 23.5T600-800v120h200q33 0 56.5 23.5T880-600v440q0 33-23.5 56.5T800-80H160Zm0-80h640v-440H600q0 33-23.5 56.5T520-520h-80q-33 0-56.5-23.5T360-600H160v440Zm80-80h240v-18q0-17-9.5-31.5T444-312q-20-9-40.5-13.5T360-330q-23 0-43.5 4.5T276-312q-17 8-26.5 22.5T240-258v18Zm320-60h160v-60H560v60Zm-200-60q25 0 42.5-17.5T420-420q0-25-17.5-42.5T360-480q-25 0-42.5 17.5T300-420q0 25 17.5 42.5T360-360Zm200-60h160v-60H560v60ZM440-600h80v-200h-80v200Zm40 220Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_portfolio'); ?></span>
                            </a>

                            
                            <a href="<?php echo e(url('seller/withdrawals'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/withdrawals') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[1px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M560-440q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM280-320q-33 0-56.5-23.5T200-400v-320q0-33 23.5-56.5T280-800h560q33 0 56.5 23.5T920-720v320q0 33-23.5 56.5T840-320H280Zm80-80h400q0-33 23.5-56.5T840-480v-160q-33 0-56.5-23.5T760-720H360q0 33-23.5 56.5T280-640v160q33 0 56.5 23.5T360-400Zm440 240H120q-33 0-56.5-23.5T40-240v-440h80v440h680v80ZM280-400v-320 320Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_payouts'); ?></span>
                            </a>
                        
                        </nav>
                    </div>

                </div>
                
                
                <div class="flex-shrink-0 w-14" aria-hidden="true"></div>

            </div>

            
            <div class="flex flex-col flex-1">

                
                <div class="flex-shrink-0 flex bg-white dark:bg-zinc-800 border-b border-[#e9eef5] dark:border-zinc-600">
                
                    
                    <button type="button" class="px-4 ltr:border-r rtl:border-l border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-600 md:hidden dark:border-zinc-700/40 dark:text-zinc-200" @click="open = true">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6 reflection" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                    </button>
                    
                    
                     <nav class="relative container mx-auto px-4 justify-between items-center h-20 flex">
                         
                         
                         <div class="inline-flex items-center min-w-fit">
             
                             
                             <?php if(current_theme() === 'dark' && settings('general')->logo_dark): ?>
                                 <a href="<?php echo e(url('/'), false); ?>" class="block ltr:sm:mr-6 rtl:sm:ml-6">
                                     <img width="150" height="<?php echo e(settings('appearance')->sizes['header_desktop_logo_height'], false); ?>" src="<?php echo e(src(settings('general')->logo_dark), false); ?>" alt="<?php echo e(settings('general')->title, false); ?>" style="height: <?php echo e(settings('appearance')->sizes['header_desktop_logo_height'], false); ?>px;width:auto">
                                 </a>
                             <?php else: ?>
                                 <a href="<?php echo e(url('/'), false); ?>" class="block ltr:sm:mr-6 rtl:sm:ml-6">
                                     <img width="150" height="<?php echo e(settings('appearance')->sizes['header_desktop_logo_height'], false); ?>" src="<?php echo e(src(settings('general')->logo), false); ?>" alt="<?php echo e(settings('general')->title, false); ?>" style="height: <?php echo e(settings('appearance')->sizes['header_desktop_logo_height'], false); ?>px;width:auto">
                                 </a>
                             <?php endif; ?>
             
                         </div>
             
                         
                         <div class="min-w-fit ltr:sm:ml-10 rtl:sm:mr-10 flex items-center font-medium text-sm transition-all duration-200">
                            
                            
                            
                            <?php
                                $notifications = \App\Models\Notification::where('user_id', auth()->id())->where('is_seen', false)->latest()->get();
                            ?>
                            <button x-on:click="notifications_menu = true" type="button" class="text-gray-500 hover:text-primary-600 transition-colors duration-300 py-2 relative mx-4 dark:text-gray-100 dark:hover:text-white">
                                <svg class="text-gray-400 hover:text-gray-700 h-6 w-6 dark:text-gray-100 dark:hover:text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path></svg>
                                <?php if($notifications && count($notifications)): ?>
                                    <span class="flex absolute h-2 w-2 top-0 ltr:right-0 rtl:left-0 mt-0 ltr:-mr-1 rtl:-ml-1">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                                    </span>
                                <?php endif; ?>
                            </button>

                            
                            <?php
                                $new_messages = \App\Models\ChMessage::where('to_id', auth()->id())->where('seen', false)->count();
                            ?>
                            <a href="<?php echo e(url('inbox'), false); ?>" class="text-gray-500 hover:text-primary-600 transition-colors duration-300 py-2 relative mx-4 dark:text-gray-100 dark:hover:text-white">
                                <svg class="text-gray-400 hover:text-gray-700 h-6 w-6 dark:text-gray-100 dark:hover:text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                                <?php if($new_messages): ?>
                                    <span class="flex absolute h-2 w-2 top-0 ltr:right-0 rtl:left-0 mt-0 ltr:-mr-1 rtl:-ml-1">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                                    </span>
                                <?php endif; ?>
                            </a>
            
                            
                            <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative ltr:ml-3 rtl:mr-3">

                                
                                <div>
                                    <button 
                                        type="button" x-ref="button" 
                                        class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-0 lg:rounded-md lg:p-2 lg:hover:bg-gray-50 dark:bg-zinc-700/40 lg:dark:hover:bg-zinc-700" 
                                        id="freelancer-dashboard-user-menu-button"
                                        x-bind:aria-expanded="open.toString()"
                                        @click="onButtonClick()" 
                                        @keyup.space.prevent="onButtonEnter()" 
                                        @keydown.enter.prevent="onButtonEnter()" 
                                        @keydown.arrow-up.prevent="onArrowUp()" 
                                        @keydown.arrow-down.prevent="onArrowDown()"
                                        aria-expanded="false" aria-haspopup="true">

                                        
                                        <img class="h-8 w-8 rounded-full object-cover object-center" src="<?php echo e(src(auth()->user()->avatar), false); ?>" alt="<?php echo e(auth()->user()->username, false); ?>">

                                        
                                        <div class="ltr:ml-3 rtl:mr-3 hidden text-sm font-medium text-gray-700 dark:text-zinc-100 lg:block truncate max-w-[100px]">
                                            <?php echo e(auth()->user()->username, false); ?>

                                        </div>

                                        
                                        <svg class="ltr:ml-1 rtl:mr-1 hidden h-5 w-5 flex-shrink-0 text-gray-400 lg:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path> </svg>

                                    </button>
                                </div>
                                
                                
                                <div 
                                    x-show="open" 
                                    x-transition:enter="transition ease-out duration-100" 
                                    x-transition:enter-start="transform opacity-0 scale-95" 
                                    x-transition:enter-end="transform opacity-100 scale-100" 
                                    x-transition:leave="transition ease-in duration-75" 
                                    x-transition:leave-start="transform opacity-100 scale-100" 
                                    x-transition:leave-end="transform opacity-0 scale-95" 
                                    class="ltr:origin-top-right rtl:origin-top-left py-1 focus:outline-none absolute top-full ltr:right-0 rtl:left-0 w-60 mt-3 bg-white dark:bg-zinc-800 rounded-lg shadow-md ring-1 ring-gray-900 ring-opacity-5 font-normal text-sm text-gray-900 divide-y divide-gray-200 dark:divide-zinc-700 z-40" 
                                    x-ref="menu-items" 
                                    x-bind:aria-activedescendant="activeDescendant" 
                                    role="menu" 
                                    aria-orientation="vertical" 
                                    aria-labelledby="freelancer-dashboard-user-menu-button" 
                                    tabindex="-1" 
                                    @keydown.arrow-up.prevent="onArrowUp()" 
                                    @keydown.arrow-down.prevent="onArrowDown()" 
                                    @keydown.tab="open = false" 
                                    @keydown.enter.prevent="open = false; focusButton()" 
                                    @keyup.space.prevent="open = false; focusButton()" 
                                    style="display: none;">

                                    <p class="py-3 px-3.5 truncate">
                                        <span
                                            class="block mb-0.5 text-sm text-gray-600 dark:text-gray-300"><?php echo e(__('messages.t_logged_in_as_username', ['username' => auth()->user()->username]), false); ?></span>
                                        <span class="font-semibold text-xl dark:text-white"><?php echo money(auth()->user()->balance_available, settings('currency')->code, true); ?></span>
                                    </p>

                                    
                                    <div class="py-1.5 px-3.5">

                                        
                                        <a href="<?php echo e(url('profile', auth()->user()->username), false); ?>"
                                            class="group flex items-center py-1.5 group-hover:text-primary-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="flex-none ltr:mr-3 rtl:ml-3 text-primary-700 group-hover:text-primary-600 h-5 w-5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span
                                                class="font-semibold text-sm text-black dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-500"><?php echo e(__('messages.t_view_profile'), false); ?></span>
                                        </a>

                                        
                                        <a href="<?php echo e(url('account/profile'), false); ?>"
                                            class="group flex items-center py-1.5 group-hover:text-primary-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="flex-none ltr:mr-3 rtl:ml-3 text-primary-700 group-hover:text-primary-600 h-5 w-5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span
                                                class="font-semibold text-sm text-black dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-500"><?php echo e(__('messages.t_edit_profile'), false); ?></span>
                                        </a>

                                        
                                        <a href="<?php echo e(url('account/settings'), false); ?>"
                                            class="group flex items-center py-1.5 group-hover:text-primary-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="flex-none ltr:mr-3 rtl:ml-3 text-primary-700 group-hover:text-primary-600 h-5 w-5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span
                                                class="font-semibold text-sm text-black dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-500"><?php echo e(__('messages.t_account_settings'), false); ?></span>
                                        </a>

                                        
                                        <a href="<?php echo e(url('account/password'), false); ?>"
                                            class="group flex items-center py-1.5 group-hover:text-primary-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-none ltr:mr-3 rtl:ml-3 text-primary-700 group-hover:text-primary-600 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                            <span class="font-semibold text-sm text-black dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-500"><?php echo e(__('messages.t_update_password'), false); ?></span>
                                        </a>

                                    </div>

                                    
                                    <div class="py-1.5 px-3.5">

                                        
                                        <a href="<?php echo e(url('account/deposit'), false); ?>" class="group flex items-center py-1.5 group-hover:text-primary-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-none ltr:mr-3 rtl:ml-3 text-primary-700 group-hover:text-primary-600 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                            <span class="font-semibold text-sm text-black dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-500"><?php echo e(__('messages.t_deposit'), false); ?></span>
                                        </a>

                                        
                                        <a href="<?php echo e(url('inbox'), false); ?>"
                                            class="group flex items-center py-1.5 group-hover:text-primary-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="flex-none ltr:mr-3 rtl:ml-3 text-primary-700 group-hover:text-primary-600 h-5 w-5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <span
                                                class="font-semibold text-sm text-black dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-500"><?php echo e(__('messages.t_messages'), false); ?></span>
                                        </a>

                                    </div>

                                    
                                    <div class="py-1.5 px-3.5">

                                        
                                        <?php if(auth()->user()->status !== 'verified'): ?>
                                            <a href="<?php echo e(url('account/verification'), false); ?>"
                                                class="group flex items-center py-1.5 group-hover:text-primary-600">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="flex-none ltr:mr-3 rtl:ml-3 text-primary-700 group-hover:text-primary-600 h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                                <span
                                                    class="font-semibold text-sm text-black dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-500"><?php echo e(__('messages.t_verification_center'), false); ?></span>
                                            </a>
                                        <?php endif; ?>

                                        
                                        <a href="<?php echo e(url('auth/logout'), false); ?>"
                                            class="group flex items-center py-1.5 group-hover:text-primary-600">
                                            <svg aria-hidden="true" width="20" height="20" fill="none"
                                                class="flex-none ltr:mr-3 rtl:ml-3 text-primary-700 group-hover:text-primary-600 h-5 w-5">
                                                <path
                                                    d="M10.25 3.75H9A6.25 6.25 0 002.75 10v0A6.25 6.25 0 009 16.25h1.25M10.75 10h6.5M14.75 12.25l2.5-2.25-2.5-2.25"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span
                                                class="font-semibold text-sm text-black dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-500"><?php echo e(__('messages.t_logout'), false); ?></span>
                                        </a>

                                    </div>
                                
                                </div>
                                
                            </div>
                            
                         </div>


                </div>
                
                
                <div class="flex flex-col flex-1 hidden md:block">
                    <div class="flex flex-col flex-grow ltr:border-r rtl:border-l border-[#e9eef5] dark:border-zinc-700 bg-gray-100 dark:bg-zinc-800 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-900 dark:scrollbar-track-zinc-600">
    
                        
                        <nav class="flex justify-end items-center px-5">
                        
                            
                            <a href="<?php echo e(url('seller/home'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/home') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">
                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_home'); ?></span>
                            </a>

                            
                            <a href="<?php echo e(url('seller/orders'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/orders') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">
                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="M240-80q-33 0-56.5-23.5T160-160v-480q0-33 23.5-56.5T240-720h80q0-66 47-113t113-47q66 0 113 47t47 113h80q33 0 56.5 23.5T800-640v480q0 33-23.5 56.5T720-80H240Zm0-80h480v-480h-80v80q0 17-11.5 28.5T600-520q-17 0-28.5-11.5T560-560v-80H400v80q0 17-11.5 28.5T360-520q-17 0-28.5-11.5T320-560v-80h-80v480Zm160-560h160q0-33-23.5-56.5T480-800q-33 0-56.5 23.5T400-720ZM240-160v-480 480Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_orders'); ?></span>
                            </a>

                            
                            <a href="<?php echo e(url('seller/gigs'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/gigs') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">
                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M480-400ZM80-160v-400q0-33 23.5-56.5T160-640h120v-80q0-33 23.5-56.5T360-800h240q33 0 56.5 23.5T680-720v80h120q33 0 56.5 23.5T880-560v400H80Zm240-200v40h-80v-40h-80v120h640v-120h-80v40h-80v-40H320ZM160-560v120h80v-40h80v40h320v-40h80v40h80v-120H160Zm200-80h240v-80H360v80Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_gigs'); ?></span>
                            </a>

                            
                            <?php if(settings('projects')->is_enabled): ?>
                                <a href="<?php echo e(url('seller/projects'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/projects') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                    <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M160-120q-33 0-56.5-23.5T80-200v-440q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v440q0 33-23.5 56.5T800-120H160Zm240-600h160v-80H400v80Zm400 360H600v80H360v-80H160v160h640v-160Zm-360 0h80v-80h-80v80Zm-280-80h200v-80h240v80h200v-200H160v200Zm320 40Z"/></svg>
                                    <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_projects'); ?></span>
                                </a>
                            <?php endif; ?>

                            
                            <?php if(settings('publish')->enable_custom_offers): ?>
                                <a href="<?php echo e(url('seller/offers'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/offers') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                    <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M475-160q4 0 8-2t6-4l328-328q12-12 17.5-27t5.5-30q0-16-5.5-30.5T817-607L647-777q-11-12-25.5-17.5T591-800q-15 0-30 5.5T534-777l-11 11 74 75q15 14 22 32t7 38q0 42-28.5 70.5T527-522q-20 0-38.5-7T456-550l-75-74-175 175q-3 3-4.5 6.5T200-435q0 8 6 14.5t14 6.5q4 0 8-2t6-4l136-136 56 56-135 136q-3 3-4.5 6.5T285-350q0 8 6 14t14 6q4 0 8-2t6-4l136-135 56 56-135 136q-3 2-4.5 6t-1.5 8q0 8 6 14t14 6q4 0 7.5-1.5t6.5-4.5l136-135 56 56-136 136q-3 3-4.5 6.5T454-180q0 8 6.5 14t14.5 6Zm-1 80q-37 0-65.5-24.5T375-166q-34-5-57-28t-28-57q-34-5-56.5-28.5T206-336q-38-5-62-33t-24-66q0-20 7.5-38.5T149-506l232-231 131 131q2 3 6 4.5t8 1.5q9 0 15-5.5t6-14.5q0-4-1.5-8t-4.5-6L398-777q-11-12-25.5-17.5T342-800q-15 0-30 5.5T285-777L144-635q-9 9-15 21t-8 24q-2 12 0 24.5t8 23.5l-58 58q-17-23-25-50.5T40-590q2-28 14-54.5T87-692l141-141q24-23 53.5-35t60.5-12q31 0 60.5 12t52.5 35l11 11 11-11q24-23 53.5-35t60.5-12q31 0 60.5 12t52.5 35l169 169q23 23 35 53t12 61q0 31-12 60.5T873-437L545-110q-14 14-32.5 22T474-80Zm-99-560Z"/></svg>
                                    <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_offers'); ?></span>
                                </a>
                            <?php endif; ?>

                            
                            <a href="<?php echo e(url('seller/reviews'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/reviews') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="m363-390 117-71 117 71-31-133 104-90-137-11-53-126-53 126-137 11 104 90-31 133ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_reviews'); ?></span>
                            </a>

                            
                            <a href="<?php echo e(url('seller/refunds'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/refunds') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[1px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M480-400q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0 280q-139 0-241-91.5T122-440h82q14 104 92.5 172T480-200q117 0 198.5-81.5T760-480q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120v-240h80v94q51-64 124.5-99T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_refunds'); ?></span>
                            </a>

                            
                            <a href="<?php echo e(url('seller/portfolio'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/portfolio') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[1px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M160-80q-33 0-56.5-23.5T80-160v-440q0-33 23.5-56.5T160-680h200v-120q0-33 23.5-56.5T440-880h80q33 0 56.5 23.5T600-800v120h200q33 0 56.5 23.5T880-600v440q0 33-23.5 56.5T800-80H160Zm0-80h640v-440H600q0 33-23.5 56.5T520-520h-80q-33 0-56.5-23.5T360-600H160v440Zm80-80h240v-18q0-17-9.5-31.5T444-312q-20-9-40.5-13.5T360-330q-23 0-43.5 4.5T276-312q-17 8-26.5 22.5T240-258v18Zm320-60h160v-60H560v60Zm-200-60q25 0 42.5-17.5T420-420q0-25-17.5-42.5T360-480q-25 0-42.5 17.5T300-420q0 25 17.5 42.5T360-360Zm200-60h160v-60H560v60ZM440-600h80v-200h-80v200Zm40 220Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_portfolio'); ?></span>
                            </a>

                            
                            <a href="<?php echo e(url('seller/withdrawals'), false); ?>" class="group flex items-center px-5 py-2 text-base <?php echo e(\Illuminate\Support\Str::of(request()->path())->startsWith('seller/withdrawals') ? 'border-b-2 border-primary-700 text-primary-700' : 'border-b-2 border-gray-100 hover:border-primary-700 text-gray-700 hover:text-primary-700', false); ?>">

                                <svg class="flex-shrink-0 h-5 w-5 ltr:mr-2 rtl:ml-2 -mt-[1px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="currentColor"><path d="M560-440q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM280-320q-33 0-56.5-23.5T200-400v-320q0-33 23.5-56.5T280-800h560q33 0 56.5 23.5T920-720v320q0 33-23.5 56.5T840-320H280Zm80-80h400q0-33 23.5-56.5T840-480v-160q-33 0-56.5-23.5T760-720H360q0 33-23.5 56.5T280-640v160q33 0 56.5 23.5T360-400Zm440 240H120q-33 0-56.5-23.5T40-240v-440h80v440h680v80ZM280-400v-320 320Z"/></svg>
                                <span class="font-bold tracking-tight"><?php echo app('translator')->get('messages.t_payouts'); ?></span>
                            </a>
                        
                        </nav>

                    </div>
                </div>
        
                
                <main class="flex-1">
                    <div class="py-12">

                        
                        <?php echo $__env->yieldContent('content'); ?>

                        
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.partials.notifications')->html();
} elseif ($_instance->childHasBeenRendered('StKSKQc')) {
    $componentId = $_instance->getRenderedChildComponentId('StKSKQc');
    $componentTag = $_instance->getRenderedChildComponentTagName('StKSKQc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('StKSKQc');
} else {
    $response = \Livewire\Livewire::mount('main.partials.notifications');
    $html = $response->html();
    $_instance->logRenderedChild('StKSKQc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    </div>
                </main>

            </div>

        </div>

        
        <?php echo \Livewire\Livewire::scripts(); ?>


        
        <script >window.Wireui = {hook(hook, callback) {window.addEventListener(`wireui:${hook}`, () => callback())},dispatchHook(hook) {window.dispatchEvent(new Event(`wireui:${hook}`))}}</script>
<script src="http://localhost/Freelance_for_Admin_Template_Change/wireui/assets/scripts?id=3c15fb3b36f54e2baae1e97b6eb0015e" defer ></script>

        
        <script defer src="<?php echo e(mix('js/app.js'), false); ?>"></script>

        
        <script defer src="<?php echo e(url('public/js/utils.js'), false); ?>"></script>
        <script src="<?php echo e(url('public/js/components.js?v=1.3.2'), false); ?>"></script>

        
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
                    }, 500);

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

        
        <?php if(settings('appearance')->custom_code_footer_freelancer_layout): ?>
            <?php echo settings('appearance')->custom_code_footer_freelancer_layout; ?>

        <?php endif; ?>

    </body>
</html>
  <?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/layout/app.blade.php ENDPATH**/ ?>