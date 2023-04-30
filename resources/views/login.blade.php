<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name = "csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h1>Вход</h1>
    <form class = "col-3 offset-4 border rounded" method = "POST" action ="{{ route('user.login') }}">
        @csrf
        <div class ="form-group">
            <label for = "email" class = "col-form-label-lg">Ваш email</label>
            <input class = "form-control" id="email" name="email" type = "text" value = "" placeholder = "Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
        </div>
        <div class ="form-group">
            <label for = "password" class = "col-form-label-lg">Пароль</label>
            <input class = "form-control" id="password" name="password" type = "password" value = "" placeholder = "Пароль">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary" type="submit" name="sendMe" value="1">Войти</button>
        </div>
</body>
</html>