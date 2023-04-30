<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;


class HomeController extends Controller
{
    public function home(Request $request){
        if(Auth::user()->role == 2){
            $username = 'Admin';
        }else{
            $username = 'Manager';
        }

        return view('private', ['nameuser' =>  $username]);
    }
    
    public function users(Request $request){
        return view('users', ['data' =>  User::all()]); 
    }

    public function createuser(Request $request){
        if(Auth::user()->role == 2){
            echo 'assa';
            $validateFields = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role' => 'required'
            ]);
            if(User::where('email', $validateFields['email'])->exists()){
                return redirect(route('user.createuser'))->withErrors([
                    'email'=> 'Такой пользователь уже зарегестрирован'
                ]);
            }
    
            $user = User::create($validateFields);
            
            return redirect('/private/users');
        }
        return redirect(route('user.createuser'))->withErrors([
            'email' => 'Не достаточно прав'
        ]);
    }

    public function edituser(Request $request, $id){
        $user = new User;
    return view('edituser', ['data' =>  $user->find($id)]);
        
    }

    public function editthisuser(Request $request, $id){
        if(Auth::user()->role == 2){
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email= $request->input('email');
            $user->password= $request->input('password');
            $user->role = $request->input('role');

            $user->save();
            return redirect('/private/users');  
        }
        return redirect(route('user.edituser', $id))->withErrors([
            'email' => 'Не достаточно прав'
        ]);
              
    }

    public function deleteuser(Request $request, $id){
        if(Auth::user()->role == 2){
            $user = User::find($id);
            $user->delete();
            return redirect('/private/users');  
        }
        return redirect('/private/users')->withErrors([
            'all' => 'Не достаточно прав'
        ]);
    }

    public function categories(Request $request){
        return view('categories', ['data' =>  Category::all()]); 
    }

    public function createcategory(Request $request){
        if(Auth::user()->role == 2){
            $cat= new Category;
            $cat->name = $request->input('name');

            if(Category::where('name', $cat->name)->exists()){
                return redirect(route('user.createcategory'))->withErrors([
                    'email'=> 'Такая категория уже существует!'
                ]);
            }
            $cat->save();
            return redirect('/private/categories');
        }
        return redirect(route('user.createcategory'))->withErrors([
            'name' => 'Не достаточно прав'
        ]);
    }

    public function editcategory(Request $request, $id){
        $category = new Category;
        return view('editcategory', ['data' =>  $category->find($id)]);
        
    }

    public function editthiscategory(Request $request, $id){
        if(Auth::user()->role == 2){
            $user = Category::find($id);
            $user->name = $request->input('name');

            $user->save();
            return redirect('/private/categories');  
        }
        return redirect(route('user.editcategory', $id))->withErrors([
            'email' => 'Не достаточно прав'
        ]);
              
    }
 
    public function deletecategory(Request $request, $id){
        if(Auth::user()->role == 2){
            $user = Category::find($id);
            $user->delete();
            return redirect('/private/categories');  
        }
        return redirect('/private/categories')->withErrors([
            'all' => 'Не достаточно прав'
        ]);
    }
    public function products(Request $request){
        return view('products', ['data' =>  Product::all()]); 
    }

    public function createproduct(Request $request){
        if(Auth::user()->role == 2){

        $post= new Product;
        $post->title = $request->input('title');
        $post->price= $request->input('price');
        $post->category_id= $request->input('category_id');

          
        if($request->hasFile('image')){
            $post->image = $request->file('image')->store('', 'public');
        }
        $post->save();
        return redirect('/private/products');
        }
        return redirect(route('user.createproduct', $id))->withErrors([
            'email' => 'Не достаточно прав'
        ]);
    }

    public function editproduct(Request $request, $id){
        $product = new Product;
    return view('editproduct', ['data' =>  $product->find($id), 'categ' => Category::all()]);
        
    }

    public function editthisproduct(Request $request, $id){
        if(Auth::user()->role == 2){
            $product = Product::find($id);
            $product->title = $request->input('title');
            $product->price= $request->input('price');
            $product->category_id= $request->input('category_id');

                
            if($request->hasFile('image')){
                $product->image = $request->file('image')->store('', 'public');
            }
            $product->save();
            return redirect('/private/products');
            }
            return redirect(route('user.editproduct', $id))->withErrors([
                'email' => 'Не достаточно прав'
            ]);
              
    }

    public function deleteproduct(Request $request, $id){
        if(Auth::user()->role == 2){
            $user = Product::find($id);
            $user->delete();
            return redirect('/private/products');  
        }
        return redirect('/private/products')->withErrors([
            'all' => 'Не достаточно прав'
        ]);
    }

    public function orders(Request $request){
        return view('orders', ['data' =>  Order::all(), 'cust' => User::all(), 'prod' => Product::all()]); 
    }

    public function orderconfirm(Request $request, $id){
        $order = Order::find($id); 
        $order->status = 'confirmed';
        $order->update();
        return redirect('/private/orders');
    }

    public function orderdeny(Request $request, $id){
        $order = Order::find($id); 
        $order->status = 'denied';
        $order->update();
        return redirect('/private/orders');
    }
}
