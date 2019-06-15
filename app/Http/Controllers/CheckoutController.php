<?php

namespace App\Http\Controllers;

use App\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Checkout::orderBy('updated_at','desc')->get();
        return view('checkout.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status=Checkout::create([
            'event'=>$request->input('event'),
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'price'=>$request->input('price'),
            'date'=>$request->input('date'),
            'status'=>$request->input('status')
        ]);
        if ($status){
            Session::flash('message','Checkout created successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to create Checkout!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('checkout.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkout=Checkout::find($id);
        $status=$checkout->delete();
        if ($status){
            Session::flash('message','Checkout deleted successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to delete Checkout!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('checkout.index');
    }
}
