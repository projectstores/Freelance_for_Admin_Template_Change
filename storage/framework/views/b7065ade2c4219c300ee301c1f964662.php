<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale(), false); ?>" dir="<?php echo e(config()->get('direction'), false); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['dark' => current_theme() === 'dark']); ?>">
<head>

	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="id" content="<?php echo e($id, false); ?>">
	<meta name="uid" content="<?php echo e($uid, false); ?>">
	<meta name="type" content="<?php echo e($type, false); ?>">
	<meta name="messenger-color" content="<?php echo e($messengerColor, false); ?>">
	<meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
	<meta name="authenticated-user" data-user-uid="<?php echo e(auth()->user()->uid, false); ?>" />
	<meta name="url" content="<?php echo e(url('').'/'.config('chatify.routes.prefix'), false); ?>" data-user="<?php echo e(auth()->id(), false); ?>">
	<meta name="time-locale" content="<?php echo e(config()->get('frontend_timing_locale'), false); ?>" />
	<meta name="time-timezone" content="<?php echo e(config('app.timezone'), false); ?>" />

	
	<?php echo SEO::generate(); ?>


	
	<?php echo settings('appearance')->font_link; ?>


	
	<link rel="icon" type="image/png" href="<?php echo e(src( settings('general')->favicon ), false); ?>"/>

	
	<link rel="stylesheet" href="<?php echo e(mix('css/app.css'), false); ?>" />
	<link rel="stylesheet" href="<?php echo e(url('public/js/plugins/emojipanel/dist/emojipanel.css'), false); ?>" />
	<link rel="stylesheet" href="<?php echo e(url('public/js/plugins/file-icon-vectors/file-icon-vectors.min.css'), false); ?>" />
	<link rel='stylesheet' href="<?php echo e(url('public/js/plugins/nprogress/nprogress.css'), false); ?>" />
	<link rel="stylesheet" href="<?php echo e(url('public/css/chatify/style.css'), false); ?>" />
	<link rel="stylesheet" href="<?php echo e(url('public/css/chatify/'.$dark_mode.'.mode.css'), false); ?>" />

	
	<?php echo $__env->make('Chatify::layouts.messengerColor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	
	<style>
		:root {
			--color-primary-h: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[0], false); ?>;
			--color-primary-s: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[1], false); ?>%;
			--color-primary-l: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[2], false); ?>%;
		}
		html {
			font-family: <?php echo settings('appearance')->font_family ?>, sans-serif !important;
		}
		img.twemoji, img.emoji {
			height: 1.5em;
			width: 1.5em;
			margin: 5px;
			display: inline-block;
		}
		.messenger-messagingView {
			height: 100% !important;
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

	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="<?php echo e(url('public/js/chatify/autosize.js'), false); ?>"></script>
	<script defer src="<?php echo e(url('public/js/app.js'), false); ?>"></script>
	<script src="<?php echo e(url('node_modules/@webcomponents/webcomponentsjs/webcomponents-bundle.js'), false); ?>"></script>
	<script src="<?php echo e(url('public/js/plugins/twemoji/twemoji.min.js'), false); ?>"></script>
	<script src="<?php echo e(url('public/js/plugins/nprogress/nprogress.js'), false); ?>"></script>
	<script src="<?php echo e(url('public/js/plugins/emoji-mart/dist/browser.js'), false); ?>"></script>
	<script src="<?php echo e(url('public/js/plugins/momentjs/moment-with-locales.js'), false); ?>"></script>
	<script src="<?php echo e(url('public/js/plugins/momentjs/moment-timezone.min.js'), false); ?>"></script>
	<script src="<?php echo e(url('public/js/plugins/momentjs/moment-timezone-with-data-1970-2030.min.js'), false); ?>"></script>

</head><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/vendor/Chatify/layouts/headLinks.blade.php ENDPATH**/ ?>