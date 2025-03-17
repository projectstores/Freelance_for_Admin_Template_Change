@component('mail::message')

<p>{!! $msg !!}</p>
 
@lang('messages.t_regards'),<br>
{{ config('app.name') }}<br>
@endcomponent