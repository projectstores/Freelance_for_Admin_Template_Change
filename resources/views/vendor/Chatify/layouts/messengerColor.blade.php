<style>
    :root {
        --messengerColor: {{ $messengerColor }},
    }
/* NProgress background */
#nprogress .bar{
	background: {{ $messengerColor }} !important;
}
#nprogress .peg {
    box-shadow: 0 0 10px {{ $messengerColor }}, 0 0 5px {{ $messengerColor }} !important;
}
#nprogress .spinner-icon {
  border-top-color: {{ $messengerColor }} !important;
  border-left-color: {{ $messengerColor }} !important;
}

.m-header svg{
    color: {{ $messengerColor }};
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
	background: {{ $messengerColor }} !important;
}

.messenger-list-item td .new-messages-counter {
    background: {{ $messengerColor }};
}

.messenger-infoView nav a{
    color: {{ $messengerColor }};
}

.messenger-infoView-btns a.default{
	color: {{ $messengerColor }};
}

.mc-sender .msg-card-content {
    background: {{ $messengerColor }} !important;
    border: unset;
    box-shadow: unset;
}

.messenger-sendCard button svg{
    color: {{ $messengerColor }};
}

.messenger-listView-tabs a,
.messenger-listView-tabs a:hover,
.messenger-listView-tabs a:focus{
    color: {{ $messengerColor }};
}

.active-tab{
	border-bottom: 2px solid {{ $messengerColor }};
}

.lastMessageIndicator{
    color: {{ $messengerColor }} !important;
}

.messenger-favorites div.avatar{
    box-shadow: 0px 0px 0px 2px {{ $messengerColor }};
}

.dark-mode-switch{
    color: {{ $messengerColor }};
}
.m-list-active .activeStatus{
    border-color: #e9eef5 !important;
}
.dark .m-list-active .activeStatus{
    border-color: #373737 !important;
}
</style>
