@extends('block')

@section('content')
<form class = "col-3 offset-4 border rounded" method = "POST" action="{{route('user.editthisuser', $data->id)}}">
        @csrf
        <div class ="form-group">
            <label for = "name" class = "col-form-label-lg">Имя</label>
            <input class = "form-control" id="name" name="name" type = "text" value = "{{$data->name}}" placeholder = "Имя">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
        </div>
        <div class ="form-group">
            <label for = "email" class = "col-form-label-lg">Email</label>
            <input class = "form-control" id="email" name="email" type = "text" value = "{{$data->email}}" placeholder = "Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
        </div>
        <div class ="form-group">
            <label for = "password" class = "col-form-label-lg">Пароль</label>
            <input class = "form-control" id="password" name="password" type = "password" value = "{{$data->password}}" placeholder = "Пароль">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
        </div>
        <div class ="form-group">
            <label for="role">Choose a role:</label>
                <select id="role" name="role" value = "{{$data->role}}">
                    <option value="0">Customer</option>
                    <option value="1">Manager</option>
                    <option value="2">Admin</option>
                </select>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary" type="submit" name="sendMe" value="1">Submit</button>
        </div>
@endsection