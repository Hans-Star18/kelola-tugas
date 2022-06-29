<h5>Click this link to reset your password :</h5>
<a href="{{ $url }}/user/reset?email={{ request('email') }}&token={{ urlencode(request('token')) }}">
    Reset Password
</a>
