@extends('block')

@section('content')
<h1>Регистрация</h1>
    <form class = "col-3 offset-4 border rounded" method = "POST" action ="/private/createuser">
        @csrf
        <div class ="form-group">
            <label for = "name" class = "col-form-label-lg">Имя</label>
            <input class = "form-control" id="name" name="name" type = "text" value = "" placeholder = "Имя">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
        </div>
        <div class ="form-group">
            <label for = "email" class = "col-form-label-lg">Email</label>
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
        <div class ="form-group">
            <label for="role">Choose a role:</label>
                <select id="role" name="role" >
                    <option value="0">Customer</option>
                    <option value="1">Manager</option>
                    <option value="2">Admin</option>
                </select>
                <!-- <input class = "form-control" id="role" name="role" type = "text" value = "" placeholder = "Пароль"> -->
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary" type="submit" name="sendMe" value="1">Submit</button>
        </div>

@endsection
