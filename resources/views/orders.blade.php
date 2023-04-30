@extends('block')

@section('content')
<div style = "width:100%; height:100; display:flex;justify-content:center; flex-direction: column; text-align:center; padding-top:30px;">
        
        

        <div style = "margin:auto;  display:flex;justify-content:center; flex-direction: column;" >

        @if(count($data)==0)
            <h3>Нет заказов</h3> 
        @else
            <h3>Все заказы</h3>  
        @endif

        @php
            use App\Models\User;
            use App\Models\Product;
            use App\Models\OrderProduct;
            use Illuminate\Support\Facades\DB;
            
        @endphp

            @foreach($data as $el)
            
            <?php 
                $i = $el->id; 
                
                $productset = DB::table('products')->whereIn('id',  function($query)use ($i){ 
                    $query->select('product_id')
                    ->from('order_product') 
                    ->where( 'order_id', $i); 
                })->get();
            ?>    

                <div class = "alert alert-info" style="width:800px">
                    <h5>ID: {{ $i}}</h5>
                    <h5>Customer: {{ User::find($cust) }}</h5>
                   

                    <h5>Products: {{$productset}}</h5>
                    <h5>Total Price: {{ $el->total_price}}</h5>
                    <h5>Status: {{ $el->status}}</h5>
                    
                    <a href = "/private/orderconfirm/{{$el->id}}" method = "post" type="submit" class="btn btn-success" style = "color:white">Подтвердить</a>
                    <a href = "/private/orderdeny/{{$el->id}}" methond = "post" type="submit" class="btn btn-danger" style = "color:white">Отклонить</a>
                    
                </div>
                @error('all')
                    <div class="alert alert-danger">{{ $message }}</div> 
                @enderror
            @endforeach

            
        </div>

    </div>

@endsection
