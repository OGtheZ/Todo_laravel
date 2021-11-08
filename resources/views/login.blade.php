@extends('layout')
@section('content')
    <img src="{{ asset('images/welcome.jpg') }}" alt="Loading..." style="width: 400px">
    <div>
        <form style="margin-left: 5px; display: inline-block" action="/" method="post">
            @csrf
            <br>
            @if (session()->has('success'))
                <p style="margin-left: 5px; background-color: #0096FF; width: 200px; border-radius: 8px; text-align: center">
                    {{ session('success') }}
                </p>
            @endif
            @error('password')
            <p style="color: red" style="font-size: x-small">{{ $message }}</p>
            @enderror
            @error('email')
            <p style="color: red" style="font-size: x-small">{{ $message }}</p>
            @enderror

            <label style="margin-right: 24px" for="email">E-mail</label>
            <input style="margin-top: 5px" type="text" id="email" name="email">
            <br>
            <label for="password">Password</label>
            <input style="margin-top: 5px" type="password" id="password" name="password">
            <br><br>
            <button style="background-color: chartreuse" type="submit">Login</button>

        </form>
        <br>
        <br>
        <form style="display: inline-block" action="/register" method="get">
            @csrf
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
