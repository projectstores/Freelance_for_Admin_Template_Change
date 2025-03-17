@component('mail::message')

<p>@lang('messages.t_mail_newsletter_verify_line')</p>

@component('mail::button', ['url' => url('newsletter/verify?id=' . $token)])
@lang('messages.t_verify_email')
@endcomponent

@lang('messages.t_regards'),<br>
{{ config('app.name') }}<br>

@endcomponent