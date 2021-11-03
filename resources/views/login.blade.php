@extends('layout')
@section('content')

<form action="/" method="post">

    @csrf

    @if (session()->has('success'))
        <p>
            {{ session('success') }}
        </p>
    @endif
    @error('password')
    <p style="color: red" style="font-size: x-small">{{ $message }}</p>
    @enderror
    @error('email')
    <p style="color: red" style="font-size: x-small">{{ $message }}</p>
    @enderror

    <label for="email">E-mail</label>
    <input type="text" id="email" name="email">
    <br><br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <br><br>
    <input type="submit" value="Login">

</form>
<br>
<a href="/register">Register account</a>
@endsection
