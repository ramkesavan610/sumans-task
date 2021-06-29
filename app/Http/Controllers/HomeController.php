<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Order;
use Auth;
use Stripe;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data=Product::get();
        return view('home',compact('data'));
    }

    public function showProduct($id)
    {
        
        $data=Product::where('id',$id)->first();
        return view('showProduct',compact('data'));
    }

    public function myOrders()
    {
        $data=Order::where('user_id',Auth::user()->id)->get();
        return view('myOrders',compact('data'));
    }


    public function purchase(Request $request,$id)
    {

        $data=Product::where('id',$id)->first();
        $amount=$data->amount;
        try {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
         $api_response= Stripe\Charge::create ([
                "amount" => ($amount * 100),
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Test payment" 
        ]);
        Order::create([
            'user_id'=>Auth::user()->id,
            'product_id'=>$id,
            'stripe_transaction_id'=>$request->stripeToken
        ]);
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
            return back()->with('message', 'Product purchased successfully!');

    }

}
