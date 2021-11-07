<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        div {
            position: fixed;
            top: 20%;
            left: 50%;
            margin-top: -100px;
            margin-left: -200px;
        }
        table, td, td {
            margin-left: 5px;
        }
        th {
            border: 1px solid black;
        }
        .title {
            border: 1px solid gray;
        }
        .desc {
            border: 1px solid gray;
            width: 500px;
        }
        button {
            border-radius: 8px;
        }
    </style>
</head>
<body>
@auth()
    <h3 style="margin-left: 5px; display: inline-block">Welcome <strong>{{ auth()->user()->name }}</strong> !</h3>
    <form style="margin-right: 5px;margin-top: 5px ; display: inline-block; float: right " action="/logout" method="post">
        @csrf
        <button style="background-color: firebrick; color: black " type="submit" onclick="confirm('Logout?')">Logout</button>
    </form>
@endauth
<br>
@yield('content')

</body>
</html>
