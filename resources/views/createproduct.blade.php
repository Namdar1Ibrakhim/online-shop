@extends('block')

@section('content')
    <h1>Create Product</h1>

    <form class = "col-3 offset-4 border rounded" method = "POST" action ="/private/createproduct" enctype="multipart/form-data">
        @csrf

        <div class = "form-group">
            <label for="title">Title</label>
            <input type = "text" name = "title" placeholder="Введите название поста" id="title" class="form-control">
        </div>
        <div class = "form-group">
            <label for="body">Price</label>
            <input type = "text" name = "price" placeholder="Введите текс поста" id="price" class="form-control">
        </div>
        <div class = "form-group">
             <label for="category_id">Choose a role:</label>
                <select id="category_id" name="category_id">
                    @foreach($data as $el)
                    <option value="{{$el->id}}">{{$el->name}}</option>
                    @endforeach
                </select>  
        </div>
        <div class = "form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
