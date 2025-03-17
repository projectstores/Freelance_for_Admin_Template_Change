@component('mail::message')

<p class="grid-cols-1 grid-cols-2 grid-cols-3 grid-cols-4 grid-cols-5">@lang('messages.t_mail_newsletter_welcome_line')</p>

@lang('messages.t_regards'),<br>
{{ config('app.name') }}<br>

@endcomponent