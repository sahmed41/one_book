<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">

    {{-- <style id="web-highlights-global-styles">
        body.web-highlights-open {

            background-color: red;
        }
    </style> --}}
    <title>One Book</title>
</head>
<body>
    <header>
        <h1><a href="{{route('book.index')}}">One Books</a></h1>
    </header>
    <main class="non-flex">
        <h2 class="page_heading">Login</h2>
        <form method="post" action="{{route('authenticate.login')}}" id="login_form">
            @csrf
            @method('post')
            {{-- Handling Errors --}}
            @if ($errors->any())
            <ul id="errors">
                @foreach ($errors->all() as $error )
                <li id="error">{{$error}}</li>
                @endforeach
            </ul>
            @endif
            {{-- -------------- --}}
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email here">
            </div>
            <div>
                <label for="password">Pasword</label>
                <input type="password" id="password" name="password" placeholder="Enter pasword here">
            </div>

            <div>
                <input type="submit" value="Login">
            </div>
        </form>
    </main>
</body>
</html>
