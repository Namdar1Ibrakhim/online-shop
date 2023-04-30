@extends('block')

@section('content')
<div style = "width:100%; height:100; display:flex;justify-content:center; flex-direction: column; text-align:center; padding-top:30px;">
        
        

        <div style = "margin:auto;  display:flex;justify-content:center; flex-direction: column;" >

        <div style = "padding:10px"><a href = "/private/createproduct" method = "get" type="submit" class="btn btn-success" style = "color:white;padding:10px">Создать продукт</a></div>

        @if(count($data)==0)
            <h3>Нет продуктов</h3> 
        @else
            <h3>Все продукты</h3>  
        @endif

            @foreach($data as $el)
                <div class = "alert alert-info" style="width:800px">

                    <img style = "width:200px" src = "{{asset('/storage/' . $el->image) }}" alt = "">
                    <h5>Name: {{ $el->title}}</h5>
                    <h5>Category: {{ $el->category_id}}</h5>
                    <h5>Price: {{ $el->price}}</h5>
                    
                    <a href = "/private/editproduct/{{$el->id}}" method = "post" type="submit" class="btn btn-warning" style = "color:white">Редактировать</a>
                    <a href = "/private/deleteproduct/{{$el->id}}" methond = "post" type="submit" class="btn btn-danger" style = "color:white">Удалить</a>
                </div>
                @error('all')
                    <div class="alert alert-danger">{{ $message }}</div> 
                @enderror
            @endforeach


            
        </div>

    </div>

@endsection
