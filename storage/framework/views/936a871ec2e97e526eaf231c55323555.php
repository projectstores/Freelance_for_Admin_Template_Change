<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale(), false); ?>" dir="<?php echo e(config()->get('direction'), false); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['dark' => current_theme() === 'dark']); ?>">
    
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

        
        <?php echo SEO::generate(); ?>


        
        <link rel="icon" type="image/png" href="<?php echo e(src( settings('general')->favicon ), false); ?>"/>

        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        
        <?php echo \Livewire\Livewire::styles(); ?>


        
        <link href="<?php echo e(mix('css/app.css'), false); ?>" rel="stylesheet">

        
		<?php echo settings('appearance')->font_link; ?>


		
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

        
        <?php if(settings('appearance')->custom_code_head_main_layout): ?>
            <?php echo settings('appearance')->custom_code_head_main_layout; ?>

        <?php endif; ?>

    </head>

    <body class="antialiased bg-primary-700 text-gray-600 min-h-full flex flex-col application application-ltr overflow-x-hidden overflow-y-scroll <?php echo e(app()->getLocale() === 'ar' ? 'application-ar' : '', false); ?>" style="overflow-y: scroll">

        
        <?php if (isset($component)) { $__componentOriginal10717d162484e57a570d6d2cc4597545 = $component; } ?>
<?php $component = WireUi\View\Components\Notifications::resolve(['position' => 'top-center','zIndex' => 'z-[60]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

        
        <div class="top-0 ltr:left-0 rtl:right-0 hidden px-10 lg:block lg:px-10">
            <?php if(settings('general')->logo_dark): ?>
                <a href="<?php echo e(url('/'), false); ?>" class="flex items-center">
                    <img src="<?php echo e(src(settings('general')->logo_dark), false); ?>" alt="<?php echo e(settings('general')->title, false); ?>" style="height: <?php echo e(settings('appearance')->sizes['header_desktop_logo_height'], false); ?>px;">
                </a>
            <?php else: ?>
                <a href="<?php echo e(url('/'), false); ?>" class="flex items-center">
                    <img src="<?php echo e(src(settings('general')->logo), false); ?>" alt="<?php echo e(settings('general')->title, false); ?>" style="height: <?php echo e(settings('appearance')->sizes['header_desktop_logo_height'], false); ?>px;">
                </a>
            <?php endif; ?>
        </div>

        
        <div class="w-full px-2 sm:px-12 flex flex-col items-center">
            
            <div class="grid lg:grid-cols-2">
                
                <div class="w-full bg-no-repeat bg-center bg-cover h-full rounded-tl-lg rounded-bl-lg" <?php if(settings('auth')->wallpaper): ?> style="background-image: url(<?php echo e(src(settings('auth')->wallpaper), false); ?>)" <?php endif; ?>></div>
            
                
                <div class="w-full flex flex-col items-center justify-center rounded-tr-lg rounded-br-lg bg-white">
                    
                    <main class="flex w-full items-center dark:bg-zinc-800 z-100 px-10">
                        <?php echo $__env->yieldContent('content'); ?>
                    </main>
                </div>
            </div>
        
            
            <div class="hidden p-6 lg:block lg:px-12 text-white font-normal text-[13px]">
                <?php echo settings('footer')->copyrights; ?>

            </div>
        </div>


        
        <?php echo \Livewire\Livewire::scripts(); ?>


        
        <script >window.Wireui = {hook(hook, callback) {window.addEventListener(`wireui:${hook}`, () => callback())},dispatchHook(hook) {window.dispatchEvent(new Event(`wireui:${hook}`))}}</script>
<script src="https://localhost/Freelancer_Work/Freelancer_Work_New/wireui/assets/scripts?id=3c15fb3b36f54e2baae1e97b6eb0015e" defer ></script>

        
        <script defer src="<?php echo e(mix('js/app.js'), false); ?>"></script>

        
        <script src="<?php echo e(url('public/js/utils.js'), false); ?>"></script>

        
        <?php echo $__env->yieldPushContent('scripts'); ?>

        
        <?php if(settings('appearance')->custom_code_footer_main_layout): ?>
            <?php echo settings('appearance')->custom_code_footer_main_layout; ?>

        <?php endif; ?>

    </body>

</html><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/auth/layout/auth.blade.php ENDPATH**/ ?>