<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale(), false); ?>" dir="<?php echo e(config()->get('direction'), false); ?>">

    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

        
        <title><?php echo e(__('messages.t_login'), false); ?> | <?php echo e(__('messages.t_dashboard'), false); ?></title>

        
		<?php echo settings('appearance')->font_link; ?>


        
        <link rel="icon" type="image/png" href="<?php echo e(src( settings('general')->favicon ), false); ?>"/>

        
        <?php echo \Livewire\Livewire::styles(); ?>


        
        <link rel="preload" href="<?php echo e(mix('css/app.css'), false); ?>" as="style">
        <link rel="stylesheet" href="<?php echo e(mix('css/app.css'), false); ?>">

        
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

        
        <script>
            __var_app_url        = "<?php echo e(url('/'), false); ?>";
            __var_app_locale     = "<?php echo e(app()->getLocale(), false); ?>";
            __var_rtl            = <?php echo \Illuminate\Support\Js::from(config()->get('direction') === 'ltr' ? false : true)->toHtml() ?>;
            __var_primary_color  = "<?php echo e(settings('appearance')->colors['primary'], false); ?>";
            __var_axios_base_url = "<?php echo e(url('/'), false); ?>/";
            __var_currency_code  = "<?php echo e(settings('currency')->code, false); ?>";
        </script>

        
        <?php echo $__env->yieldPushContent('styles'); ?>

        
        <?php if(settings('appearance')->custom_code_head_admin_layout): ?>
            <?php echo settings('appearance')->custom_code_head_admin_layout; ?>

        <?php endif; ?>

    </head>

    <body class="antialiased bg-white text-gray-600 min-h-full h-full flex flex-col application application-ltr overflow-x-hidden">

        
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

        
        <main class="flex-grow">
            <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-36 pt-16 pb-24 space-y-8 min-h-screen">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>

        
        <?php echo \Livewire\Livewire::scripts(); ?>


        
        <script >window.Wireui = {hook(hook, callback) {window.addEventListener(`wireui:${hook}`, () => callback())},dispatchHook(hook) {window.dispatchEvent(new Event(`wireui:${hook}`))}}</script>
<script src="https://localhost/Freelancer_Work/Freelancer_Work_New/wireui/assets/scripts?id=3c15fb3b36f54e2baae1e97b6eb0015e" defer ></script>

        
        <script defer src="<?php echo e(mix('js/app.js'), false); ?>"></script>

        
        <?php echo $__env->yieldPushContent('scripts'); ?>

        
        <?php if(settings('appearance')->custom_code_footer_admin_layout): ?>
            <?php echo settings('appearance')->custom_code_footer_admin_layout; ?>

        <?php endif; ?>

    </body>

</html><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/admin/auth/layout.blade.php ENDPATH**/ ?>