@extends('block')

@section('content')
<form class = "col-3 offset-4 border rounded" method = "POST" action="{{route('user.editthisproduct', $data->id)}}">
        @csrf
        <div class ="form-group">
            <label for = "title" class = "col-form-label-lg">Title</label>
            <input class = "form-control" id="title" name="title" type = "text" value = "{{$data->title}}" placeholder = "Title">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
        </div>
        <div class ="form-group">
            <label for = "price" class = "col-form-label-lg">Price</label>
            <input class = "form-control" id="price" name="price" type = "text" value = "{{$data->price}}" placeholder = "Price">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
        </div>
        
        <div class = "form-group">
             <label for="category_id">Choose a category:</label>
                <select id="category_id" name="category_id">
                    @foreach($categ as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>  
        </div>

        <div class = "form-group">
            <label for="image">Image</label>
            <input type="file" value = "{{$data->image}}" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary" type="submit" name="sendMe" value="1">Submit</button>
        </div>
@endsection