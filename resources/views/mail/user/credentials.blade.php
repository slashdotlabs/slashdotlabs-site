@component('mail::message')
# Hello {{ $user-> first_name }} {{ $user-> last_name }} !

Welcome to  {{ config('app.name') }}. <br>

Before accessing the system, you will need to set your password. <br>

Follow this link to set your password: <a href="http://localhost:8000/password/reset"> Reset Password </a> <br>

Enter <strong> {{ $user-> email }} </strong> as your email address.<br>

<div style="margin-top: 1rem; margin-bottom: 1rem;">
    Thanks,<br>
    {{ config('app.name') }}
</div>

<small>If you have any questions, feel free you can contact Slash Dot Labs Ltd. on 01905 745339 or via email: info@slashdotlabs.com.</small>
@endcomponent
