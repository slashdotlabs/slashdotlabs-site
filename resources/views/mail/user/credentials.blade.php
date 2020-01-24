@component('mail::message')
Hello!

An account has been created on  {{ config('app.name') }} using this email.<br>

Before accessing the system, you will need to set your password. <br>

@component('mail::button', ['url' => $url, 'color' => 'blue'])
Set Password
@endcomponent

The password set link will expire in {{$count}} minutes. <br>

If this email was not meant for you, just ignore it.

<div style="margin-top: 1rem; margin-bottom: 1rem;">
    Thanks,<br>
    {{ config('app.name') }}
</div>

<small>If you have any questions, feel free you can contact Slash Dot Labs Ltd. on 01905 745339 or via email: info@slashdotlabs.com.</small>
@endcomponent
