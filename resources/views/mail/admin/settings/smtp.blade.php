@component('mail::message')
<h2>Hello admin,</h2>

<p>If you received this email, then SMTP is working fine on your website.</p>
 
Thanks,<br>
{{ config('app.name') }}<br>
@endcomponent