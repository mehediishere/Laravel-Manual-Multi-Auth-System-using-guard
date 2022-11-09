<h1 style="color: cadetblue;">User Registration Form</h1>

<form action="{{ route('user.handleRegistration') }}" method="POST">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" aria-label="Name">
    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" aria-label="Email">
    <input type="password" name="password" placeholder="Password" aria-label="Password">
    <input type="password" name="password_confirmation" placeholder="Re-Type Password" aria-label="Password confirmation">
    <input type="submit" name="submit">
</form>

@error('name') <h3 style="color: #ff5151;">{{ $message }}</h3> @enderror
@error('email') <h3 style="color: #ff5151;">{{ $message }}</h3> @enderror
@error('password') <h3 style="color: #ff5151;">{{ $message }}</h3> @enderror

@if(session()->has('success')) <h3 style="color: limegreen;">{{ session('success') }}</h3> @endif

