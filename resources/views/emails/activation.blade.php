@component('mail::message')
# Activate your account

Click that button!

@component('mail::button', ['url' => url('activation/' . $activation_token)])
Activate my account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
