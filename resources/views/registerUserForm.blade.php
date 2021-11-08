@extends('layout')
@section('content')
<form action="/register" method="post">

    @csrf

    <label style="margin-right: 30px" for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
    @error('name')
    <p style="color: red" style="font-size: x-small">{{ $message }}</p>
    @enderror
    <br>
    <label style="margin-right: 28px" for="email">E-mail</label>
    <input type="text" id="email" name="email" value="{{ old('email') }}"><br>
    @error('email')
    <p style="color: red" style="font-size: x-small">{{ $message }}</p>
    @enderror
    <br>
    <label style="margin-right: 3px" for="password">Password</label>
    <input type="password" id="password" name="password"><br>
    @error('password')
    <p style="color: red" style="font-size: x-small">{{ $message }}</p>
    @enderror
    <br>
    <button type="submit">Register</button>

</form>
<br>
<form action="/" method="get">
    @csrf
    <button type="submit">Back</button>
</form>
@endsection
