@extends('block')

@section('content')
<form class = "col-3 offset-4 border rounded" method = "POST" action="{{route('user.editthiscategory', $data->id)}}">
        @csrf
        <div class ="form-group">
            <label for = "name" class = "col-form-label-lg">Имя</label>
            <input class = "form-control" id="name" name="name" type = "text" value = "{{$data->name}}" placeholder = "Имя">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
        </div>
        
        <div class="form-group">
            <button class="btn btn-lg btn-primary" type="submit" name="sendMe" value="1">Submit</button>
        </div>
@endsection