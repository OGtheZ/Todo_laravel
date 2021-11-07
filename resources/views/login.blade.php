@extends('layout')
@section('content')
    <div>
        <form style="margin-left: 5px; display: inline-block" action="/" method="post">
            @csrf

            <img src="{{ asset('images/welcome.jpg') }}" alt="Loading...">
            <br>
            @if (session()->has('success'))
                <p style="margin-left: 5px">
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
