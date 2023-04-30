@extends('block')

@section('content')
<div style = "width:100%; height:100; display:flex;justify-content:center; flex-direction: column; text-align:center; padding-top:30px;">
        
        

        <div style = "margin:auto;  display:flex;justify-content:center; flex-direction: column;" >

        <div style = "padding:10px"><a href = "/private/createcategory" method = "get" type="submit" class="btn btn-success" style = "color:white;padding:10px">Создать категорию</a></div>

        @if(count($data)==0)
            <h3>Нет категорий</h3> 
        @else
            <h3>Все категории</h3>  
        @endif

            @foreach($data as $el)
                <div class = "alert alert-info" style="width:800px">

                    <h5>Name: {{ $el->name}}</h5>
                    
                    <a href = "/private/editcategory/{{$el->id}}" method = "post" type="submit" class="btn btn-warning" style = "color:white">Редактировать</a>
                    <a href = "/private/deletecategory/{{$el->id}}" methond = "post" type="submit" class="btn btn-danger" style = "color:white">Удалить</a>
                </div>
                @error('all')
                    <div class="alert alert-danger">{{ $message }}</div> 
                @enderror
            @endforeach

            
        </div>

    </div>

@endsection
