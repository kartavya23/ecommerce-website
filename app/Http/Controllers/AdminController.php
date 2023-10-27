<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\product;

use App\Models\User;

use App\Models\Order;

use App\Models\OrderItem;


class AdminController extends Controller
{
    public function index()
    {
        if(session()->get('type')=='Admin')
        {
            return view('Dashboard.index');
        }
        return redirect()->back();
    }
    
    public function profile()
    {
        if(session()->get('type')=='Admin')
        {
            $user=User::find(session()->get('id'));

            return view('Dashboard.profile',compact('user'));
        }
        return redirect()->back();
    }

    public function products()
    {
        if(session()->get('type')=='Admin')
        {
        $products=Product::all();
        return view('Dashboard.products',compact('products'));
        }
        return redirect()->back();
    }

    public function customers()
    {
        
        if(session()->get('type')=='Admin')
        {
        $customers=User::where('type','Customer')->get();
        return view('Dashboard.customers',compact('customers'));
        }
        return redirect()->back();
    }
    public function orders()
    {
        
        if(session()->get('type')=='Admin')
        {
            $orderItems=DB::table('order_items')
            ->join('products','order_items.productId','products.id')
            ->select('products.title','products.picture','order_items.*')
            ->get(); 
        $orders=DB::table('users')
       ->join('orders','orders.customerId','users.id')
       ->select('orders.*','users.fullname','users.email','users.status as userStatus')
       ->get();
       
        return view('Dashboard.orders',compact('orders','orderItems'));
        }
        return redirect()->back();
    }


    public function AddNewProduct(Request $data)
    {
        if(session()->get('type')=='Admin')
        {
        $product=new Product();
        $product->title=$data->input('title');
        $product->price=$data->input('price');
        $product->type=$data->input('type');
        $product->quantity=$data->input('quantity');
        $product->category=$data->input('category');
        $product->description=$data->input('description');
        $product->keywords=$data->input('keywords');
        $product->picture=$data->file('file')->getClientOriginalName();
        $data->file('file')->move('uploads/products/', $product->picture);
        $product->save();
        return redirect()->back()->with('success','Congrotulation new product listed successfully');
        }
        return redirect()->back();

    }

    public function UpdateProduct(Request $data)
    {
        if(session()->get('type')=='Admin')
        {
        $product=Product::find($data->input('id'));
        $product->title=$data->input('title');
        $product->price=$data->input('price');
        $product->type=$data->input('type');
        $product->quantity=$data->input('quantity');
        $product->category=$data->input('category');
        $product->keywords=$data->input('keywords');
        $product->description=$data->input('description');
       if($data->file('file')!=null)
       {
        $product->picture=$data->file('file')->getClientOriginalName();
        $data->file('file')->move('uploads/products/', $product->picture);
       }
        $product->save();
        return redirect()->back()->with('success','Congrotulation product listed  update successfully');
    }
    return redirect()->back();

    }

    public function deleteProduct($id)
    {
        if(session()->get('type')=='Admin')
        {
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('success','Congrotulation product listed  deleted successfully');
    }
    return redirect()-back();
        
    }

    public function changeUserStatus($status,$id)
    {
        if(session()->get('type')=='Admin')
        {
        $user=User::find($id);
        $user->status=$status;
        $user->save();
        return redirect()->back()->with('success','Congrotulation user status updated successfully');
    }
    return redirect()-back();
        
    }

    public function changeOrderStatus($status,$id)
    {
        if(session()->get('type')=='Admin')
        {
        $order=Order::find($id);
        $order->status=$status;
        $order->save();
        return redirect()->back()->with('success','Congrotulation order status updated successfully');
    }
    return redirect()-back();
        
    }
}

