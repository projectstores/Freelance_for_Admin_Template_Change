<style>
    :root {
        --messengerColor: <?php echo e($messengerColor, false); ?>,
    }
/* NProgress background */
#nprogress .bar{
	background: <?php echo e($messengerColor, false); ?> !important;
}
#nprogress .peg {
    box-shadow: 0 0 10px <?php echo e($messengerColor, false); ?>, 0 0 5px <?php echo e($messengerColor, false); ?> !important;
}
#nprogress .spinner-icon {
  border-top-color: <?php echo e($messengerColor, false); ?> !important;
  border-left-color: <?php echo e($messengerColor, false); ?> !important;
}

.m-header svg{
    color: <?php echo e($messengerColor, false); ?>;
}

.m-list-active,
.m-list-active:hover,
.m-list-active:focus{
    background-color: #e9eef5;
}

.dark .m-list-active,
.dark .m-list-active:hover,
.dark .m-list-active:focus{
    background-color: #373737;
}

.m-list-active b{
	color: #fff !important;
	background: <?php echo e($messengerColor, false); ?> !important;
}

.messenger-list-item td .new-messages-counter {
    background: <?php echo e($messengerColor, false); ?>;
}

.messenger-infoView nav a{
    color: <?php echo e($messengerColor, false); ?>;
}

.messenger-infoView-btns a.default{
	color: <?php echo e($messengerColor, false); ?>;
}

.mc-sender .msg-card-content {
    background: <?php echo e($messengerColor, false); ?> !important;
    border: unset;
    box-shadow: unset;
}

.messenger-sendCard button svg{
    color: <?php echo e($messengerColor, false); ?>;
}

.messenger-listView-tabs a,
.messenger-listView-tabs a:hover,
.messenger-listView-tabs a:focus{
    color: <?php echo e($messengerColor, false); ?>;
}

.active-tab{
	border-bottom: 2px solid <?php echo e($messengerColor, false); ?>;
}

.lastMessageIndicator{
    color: <?php echo e($messengerColor, false); ?> !important;
}

.messenger-favorites div.avatar{
    box-shadow: 0px 0px 0px 2px <?php echo e($messengerColor, false); ?>;
}

.dark-mode-switch{
    color: <?php echo e($messengerColor, false); ?>;
}
.m-list-active .activeStatus{
    border-color: #e9eef5 !important;
}
.dark .m-list-active .activeStatus{
    border-color: #373737 !important;
}
</style>
<?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/vendor/Chatify/layouts/messengerColor.blade.php ENDPATH**/ ?>