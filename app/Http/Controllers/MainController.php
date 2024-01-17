<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;

use App\Models\User;

use App\Models\Order;

use App\Models\OrderItem;

use App\Models\Product;

use App\Models\Cart;

use App\Mail\Testing;

use Laravel\Socialite\Facades\Socialite;

use Termwind\Components\Raw;


class MainController extends Controller
{

     public function googleLogin()
     {
        return Socialite::driver('google')->redirect();

     }
     public function googleHandle()
     {
        try{
            $user=Socialite::driver('google')->user();
            $findUser=User::where('email',$user->email)->first();
            if(!$findUser)
            {
                $findUser=new User();
                $findUser->fullname=$user->name;
                $findUser->email=$user->email;
                $findUser->picture=$user->avatar;
                $findUser->password="12345Dummy";
                $findUser->type="Customer";
                $findUser->status="Active";
                $findUser->save();
               
              
            }
            session()->put('id',$findUser->id);
            session()->put('type',$findUser->type);
            return redirect('/');
    

        }catch(Exception $e)
        {
            dd($e->getMessage());
        }

     }
    public function index()
    {
        $allProducts=Product::all();
        $newArrival=Product::where('type','new-arrivals')->get();
        $Hotsales=Product::where('type','sale')->get();
        
        
        return view('index',compact('allProducts','Hotsales','newArrival'));
    }

    public function cart()
    {
        $cartItems=DB::table('products')
        ->join('carts','carts.productId','products.id')
        ->select('products.title', 'products.quantity as pQuantity', 'products.price' ,'products.picture','carts.*')
        ->where('carts.customerId',session()->get('id'))
        ->get();

        return view('cart',compact('cartItems'));
    }

   

    public function shop()
    {
        return view('shop');
    }

    public function profile()
    {
        if(session()->has('id'))
       {
        $user=User::find(session()->get('id'));

        return view('profile',compact('user'));
       }
       return redirect('login');
    }

    public function myOrders()
    {
        if(session()->has('id'))
       {
        $orders=Order::where('customerId',session()->get('id'))->get();
        $items=DB::table('products')
        ->join('order_items','order_items.productId','products.id')
        ->select('products.title','products.picture','order_items.*')
        ->get();
        return view('orders',compact('orders','items'));
       }
       return redirect('login');
    }

    public function testMail()
    {
        $details=[
            'title'=>"this is a testing mail",
            "message"=>"hello this a message",
        ];
        Mail::to("viratjais1088@gmail.com")->send(new Testing($details));
        return redirect('/');
    }

    public function singleProduct($id)
    {
       $product=product::find($id);
        return view('singleProduct',compact('product'));
    }

    public function deleteCartItem($id)
    {
       $item=Cart::find($id);
       $item->delete();
        return redirect()->back()->with('success','1 item has been deleted from Cart.');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        session()->forget('id');
        session()->forget('type');
        return redirect('/login');
    }

    public function loginUser(Request $data)
    {
        $user=User::where('email',$data->input('email'))->where('password',$data->input('password'))->first();
        if($user)
        {
            if(strtolower($user->status)=="blocked")
            {
                return redirect('login')->with('error','your status is blocked.');
            }
            session()->put('id',$user->id);
            session()->put('type',$user->type);
            if($user->type=='customer')
            {
                return redirect('/');
            }
          else if($user->type=='Admin')
            {
                return redirect('/admin');
            }
            else{
                return redirect()->route('/');
            }

          }else
            {
                return redirect('login')->with('error','Email/password is incorrect.');

            }
        
    }

    public function registerUser(Request $data)
    {
        $newUser=new User();
        $newUser->fullname=$data->input('fullname');
        $newUser->email=$data->input('email');
        $newUser->password=$data->input('password');
        $newUser->picture=$data->file('file')->getClientOriginalName();
        $data->file('file')->move('uploads/profiles/',$newUser->picture);
        $newUser->type="Customer";
        if($newUser->save())
        {
            return redirect('login')->with('success','congratulations your account is ready.');
        }
        
    }

    public function updateUser(Request $data)
    {
        $user=User::find(session()->get('id'));
        $user->fullname= $data->input('fullname');
        $user->password= $data->input('password');
        if($data->file('file')!=null)
        {
            $user->picture=$data->file('file')->getClientOriginalName();
            $data->file('file')->move('uploads/profiles/',$user->picture);
        }
        if($user->save())
        {
            return redirect()->back()->with('success','congrotulation your account is updated.');
        }
        
    }


    public function addToCart(Request $data)
    {
      if(session()->has('id'))
      {
        $item=new cart();
        $item->quantity=$data->input('quantity');
        $item->productId=$data->input('id');
        $item->customerId=session()->get('id');
        $item->save();
        return redirect()->back()->with('success','congratulations item added to cart.');
      }
      else{
        return redirect('login')->with('error','infon please login to system.');
      }
        
    }


    public function updateCart(Request $data)
    {
      if(session()->has('id'))
      {
        $item=Cart::find($data->input('id'));
        $item->quantity=$data->input('quantity');
        $item->save();
        return redirect()->back()->with('success','success items quantity update.');
      }
      else{
        return redirect('login')->with('error','infon please login to system.');
      }
        
    }

    public function checkout(Request $data)
    {
       if(session()->has('id'))
       {
        $order=new Order();
        $order->status="pending";
        $order->customerId=session()->get('id');
        $order->bill=$data->input('bill');
        $order->address=$data->input('address');
        $order->fullname=$data->input('fullname');
        $order->phone=$data->input('phone');
        if($order->save())
        {
            $carts=Cart::where('customerId',session()->get('id'))->get();
            foreach($carts as $item)
            {
                $product=Product::find($item->productId);
                $orderItem=new OrderItem();
                $orderItem->productId=$item->productId;
                $orderItem->quantity=$item->quantity;
                $orderItem->price=$product->price;
                $orderItem->orderId=$order->id;
                $orderItem->save();
                $item->delete();
            }
        }
        return redirect()->back()->with('success','success your order has been placed successfully');
       }
    else
    {
        return redirect('login')->with('error','info please login to sustem');   
    }

}

}
