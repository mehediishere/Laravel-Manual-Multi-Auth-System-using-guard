<ul style="text-align: center; list-style: none;">
    <li><h1 style="color: cadetblue;">Hey Admin</h1></li>
    <li><a href="{{ route('admin.login') }}">Login</a></li>
    <li><a href="{{ route('admin.registration') }}">Registration</a></li>
    <li><a href="{{ route('admin.profile') }}">Profile</a></li>
</ul>

{{--<hr>--}}

{{--@if (Auth::guard('webadmin')->check())--}}
{{--    ok--}}
{{--@else--}}
{{--    not ok--}}
{{--@endif--}}
