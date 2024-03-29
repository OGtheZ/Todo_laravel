@extends('layout')
@section('content')
<form action="/register" method="post">

    @csrf

    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
    @error('name')
    <p style="color: red" style="font-size: x-small">{{ $message }}</p>
    @enderror
    <br>
    <label for="email">E-mail</label>
    <input type="text" id="email" name="email" value="{{ old('email') }}"><br>
    @error('email')
    <p style="color: red" style="font-size: x-small">{{ $message }}</p>
    @enderror
    <br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br>
    @error('password')
    <p style="color: red" style="font-size: x-small">{{ $message }}</p>
    @enderror
    <br>
    <input type="submit" value="Register">

</form>

<a href="/">Back</a>
@endsection
