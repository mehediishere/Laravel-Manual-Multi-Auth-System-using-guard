<h1 style="color: cadetblue;">Admin Login Form</h1>

<form action="{{ route('admin.handleLogin') }}" method="POST">
    @csrf
    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" aria-label="Email">
    <input type="password" name="password" placeholder="Password" aria-label="Password">
    <input type="submit" name="submit">
</form>

@error('email') <h3 style="color: #ff5151;">{{ $message }}</h3> @enderror
@error('password') <h3 style="color: #ff5151;">{{ $message }}</h3> @enderror
@error('error_message') <h3 style="color: #ff5151;">{{ $message }}</h3> @enderror
