<script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>


<?php if(auth()->guard('admin')->check()): ?>
	<script>
		var pusher_key = "<?php echo e(config('chatify.pusher.key'), false); ?>";

		// Check if key is exists
		if (!pusher_key) {
			alert('You need to add Pusher keys first. Go to dashboard => settings => live chat');
		}
	</script>
<?php endif; ?>

<script>

	// Gloabl Chatify variables from PHP to JS
	window.chatify = {
		enable_attachments       : Boolean(<?php echo e(settings('live_chat')->enable_attachments, false); ?>),
		enable_emojis            : Boolean(<?php echo e(settings('live_chat')->enable_emojis, false); ?>),
		enable_notification_sound: Boolean(<?php echo e(settings('live_chat')->play_notification_sound, false); ?>),
		notification_sound       : "<?php echo e(url('public/js/chatify/sounds/new-message-sound.mp3'), false); ?>"
	};

	// Disable pusher logging
	Pusher.logToConsole = false;

	var pusher = new Pusher("<?php echo e(config('chatify.pusher.key'), false); ?>", {
		encrypted   : Boolean(<?php echo e(config('chatify.pusher.options.encrypted') ? 1 : 0, false); ?>),
		cluster     : "<?php echo e(config('chatify.pusher.options.cluster'), false); ?>",
		authEndpoint: '<?php echo e(route("pusher.auth"), false); ?>',
		auth        : {
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		}
	});

	// Bellow are all the methods/variables that using php to assign globally.
	const allowedImages        = <?php echo json_encode( explode(',', settings('live_chat')->allowed_images) ); ?> || [];
	const allowedFiles         = <?php echo json_encode( explode(',', settings('live_chat')->allowed_files) ); ?> || [];
	const getAllowedExtensions = [...allowedImages, ...allowedFiles];
	const getMaxUploadSize     = <?php echo e(settings('live_chat')->max_file_size * 1048576, false); ?>;

</script>

<script src="<?php echo e(url('public/js/chatify/utils.js'), false); ?>"></script>
<script src="<?php echo e(url('public/js/chatify/code.js'), false); ?>"></script>
<?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/vendor/Chatify/layouts/footerLinks.blade.php ENDPATH**/ ?>