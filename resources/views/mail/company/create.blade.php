@component('mail::message')
# Introduction

someone created a new company. click on the given link to review modifications.

@component('mail::button', ['url' => 'http://localhost:8000/home','color'=>'blue'])
Go Home
@endcomponent

@component('mail::panel')
    If it is not you Please Review your password settings.
@endcomponent
@component('mail::button', ['url' => 'http://localhost:8000/password/reset','color'=>'red'])
    Reset Password
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
