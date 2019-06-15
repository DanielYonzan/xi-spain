<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Checkout;
use App\Event;
use App\Product;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $partners = count(Admin::where('role','partner')->get());
        $categorys = count(Category::all());
        if(Auth::user()->role=='admin'){
            $products=count(Product::orderBy('updated_at','desc')->get());
        }else{
            $products=count(Product::where('admin_id',Auth::id())->orderBy('updated_at','desc')->get());
        }
        $events = count(Event::all());
        $count = ['partners'=>$partners,'categorys'=>$categorys,'products'=>$products,'events'=>$events];
        $checkouts = Checkout::orderBy('created_at','desc')->take(5)->get();
        return view('admin-dashboard',compact('count','checkouts'));
    }
}
