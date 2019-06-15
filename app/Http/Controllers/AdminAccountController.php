<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAccountController extends Controller
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
        if(Auth::user()->role!='admin'){
            return redirect()->route('admin.dashboard');
        }
        $data = Admin::where('role','partner')->orderBy('created_at','desc')->get();
        return view('adminAccount.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminAccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        $status = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($status){
            Session::flash('message','AdminAccount created successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to create AdminAccount!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('adminAccount.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Admin::find($id);
        return view('adminAccount.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'required|string|min:6',
        ]);

        $admin=Admin::find($id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $status = $admin->update();
        if ($status){
            Session::flash('message','AdminAccount updated successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to update AdminAccount!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('adminAccount.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $products = Product::where('admin_id',$id)->get();
        foreach ($products as $product){
            $this->delete_file('/img/product',$product->image);
        }
        $status = $admin->delete();
        if ($status){
            Session::flash('message','AdminAccount deleted successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to delete AdminAccount!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('adminAccount.index');
    }

}
