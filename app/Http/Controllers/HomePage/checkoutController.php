<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;
use App\Models\order;
use App\Models\orderItem;
use App\Models\Product;

class checkoutController extends Controller
{
    public function index(){

       // $subtotal=$tot;

        $cartItem = Cart::where('cus_id',Auth::id())->get();

        return view('elegent/checkout',compact('cartItem'));
    }

    public function placeorder(Request $request){
        
        $order = new order();
        
        $order->uid = Auth::id();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->town = $request->input('city');
        $order->district = $request->input('district');
        $order->zipcode = $request->input('zipcode');
        $order->tracking_no = 'elegant'.rand(1111,9999);
        $order->totPrice = $request->input('totalPrice');
        
        $order->save();
        
        $cartItem = Cart::where('cus_id',Auth::id())->get();
        foreach($cartItem as $item)
        {
           // dd($item-> size);
            orderItem::create([
                'order_id'=> $order->id,
                'pro_id'=> $item->pro_id,
                'cat_id'=> $item->catid,
                'subcat_id'=> $item->subcatid,
                'size' => $item-> size,
                'qty' => $item-> qty,
                'price' => $item->products->price,
            ]); 

            $prod = Product::where('id',$item->pro_id)->first();
            $prod->totProQty = $prod->totProQty - $item->qty;
            $prod->update();

            switch($item->size){
                case "s":
                    $prod->size_S = $prod->size_S - $item->qty;
                    $prod->update();
                    break;
                case "m":
                    $prod->size_M = $prod->size_M - $item->qty;
                    $prod->update();
                    break;
                case "l":
                    $prod->size_L = $prod->size_L - $item->qty;
                    $prod->update();
                    break;
                case "xl":
                    $prod->size_XL = $prod->size_XL - $item->qty;
                    $prod->update();
                    break;
                case "28":
                    $prod->size_28 = $prod->size_28 - $item->qty;
                    $prod->update();
                    break;
                case "30":
                    $prod->size_30 = $prod->size_30 - $item->qty;
                    $prod->update();
                    break;
                case "32":
                    $prod->size_32 = $prod->size_32 - $item->qty;
                    $prod->update();
                    break;  
                case "34":
                    $prod->size_34 = $prod->size_34 - $item->qty;
                    $prod->update();
                    break;
                case "36":
                    $prod->size_34 = $prod->size_34 - $item->qty;
                    $prod->update();
                    break;  
            }

        }

        if(Auth::user()->address1 == NULL)
        {
            $user=User::where('id', Auth::id())->first();

            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->district = $request->input('district'); 
            $user->zipCode = $request->input('zipcode'); 

            $user->update();
        }

        $cartItem = Cart::where('cus_id',Auth::id())->get();
        Cart::destroy($cartItem); 

        return redirect('/')->with('status', 'Profile updated!');  
    }

    public function loadChechout()
    {
        $cartItem = Cart::where('cus_id',Auth::id())->get();
    
        return view('elegent/checkout',compact('cartItem'));
    }

}
