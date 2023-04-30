<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\CartProduct;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;



class RestController extends Controller
{   
    /**
     * @param Request $request
     * @return User
     */
    public function products(){
        return response()->json(Product::get(), 200);
    }
    
    public function categories(){
        return response()->json(Category::get(), 200);
    }

    public function orders(){
        $order = new Order;
        $id = Auth::user()->id;
        return response()->json($order->find($id), 200);
    }

    public function addtocart(Request $request){
        $cartid = Cart::select()->where('user_id',Auth::user()->id)->first();
        $set = Product::select()->where('id', $request->product_id)->get();
        $newprice = $cartid -> totalprice;
        foreach ($set as $tar) {

            $newprice += (($tar -> price) * ($request->quantity));
        }
        DB::update('update carts set totalprice = ? where id = ?',[$newprice, $cartid->id]);

        $cartProduct = CartProduct::create([
            'product_id' => $request->product_id,
            'quantity'=> $request->quantity,
            'cart_id' => $cartid->id
        ]);
        return response('Успешно добавлено', 200);

    }


    public function cart(){
        $cart = Cart::select()->where('user_id',Auth::user()->id)->get();
        return response( $cart, 200);
    }


    public function mycart(){
        $cart = Cart::select('id')->where('user_id',Auth::user()->id)->first() -> id;
        $cartProduct = CartProduct::where('cart_id', $cart)->get();
        return response( $cartProduct, 200);
    }

    public function deletecart(){
        $cart = Cart::select('id')->where('user_id',Auth::user()->id)->first() -> id;
        DB::update('update carts set totalprice = 0 where id = ?',[$cart]);

        $cartProduct = CartProduct::select('id')->where('cart_id', $cart)->get();
        
        foreach ($cartProduct as $target_result) {
            DB::delete('delete from cart_products where id = ?',[$target_result->id]);            
        }
        return response('Success', 200);

    }
    public function makeOrder(){
        $cart = Cart::select()->where('user_id',Auth::user()->id)->first();
        $cartProduct = CartProduct::select()->where('cart_id', $cart->id)->get();

        //Order for my cart
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->total_price = $cart -> totalprice;
        $order->status = 'waiting';
        $order -> save();

        foreach ($cartProduct as $target_result) {
            $orderproduct = new OrderProduct;
            $orderproduct->order_id = $order->id;
            $orderproduct->product_id = $target_result->product_id;
            $orderproduct->quantity = $target_result->quantity;
            $orderproduct -> save();

        }
        DB::update('update carts set totalprice = 0 where id = ?',[$cart->id]);
        $cartProduct = CartProduct::select('id')->where('cart_id', $cart->id)->get();
        
        foreach ($cartProduct as $target_result) {
            DB::delete('delete from cart_products where id = ?',[$target_result->id]);            
        }

        return response('Успешно сделан заказ', 200);

    }
}