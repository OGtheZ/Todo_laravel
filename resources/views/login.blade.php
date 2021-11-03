@extends('layout')
@section('content')
    <div class="w3-container">
<form style="margin-left: 5px; display: inline-block" action="/" method="post">

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
    <input style="margin-top: 5px" type="text" id="email" name="email">
    <br>
    <label for="password">Password</label>
    <input style="margin-top: 5px" type="password" id="password" name="password">
    <br><br>
    <input type="submit" value="Login">

</form>
        </div>
<br>
<a style="margin-left: 5px" href="/register">Register account</a>
@endsection
