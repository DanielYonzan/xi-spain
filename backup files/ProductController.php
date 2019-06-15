<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
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
        if(Auth::user()->role=='admin'){
            $data=Product::orderBy('updated_at','desc')->get();
        }else{
            $data=Product::where('admin_id',Auth::id())->orderBy('updated_at','desc')->get();
        }
        return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::where('status',1)->get();
        return view('product.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagename = $this->upload_file($request->file('image'),'/img/product');

        $status=Product::create([
            'category'=>$request->input('category'),
            'name_en'=>$request->input('name_en'),
            'name_sp'=>$request->input('name_sp'),
            'size'=>$request->input('size'),
            'price'=>$request->input('price'),
            'origin'=>$request->input('origin'),
            'min_order'=>$request->input('min_order'),
            'image'=>$imagename,
            'short_description_en'=>$request->input('short_description_en'),
            'short_description_sp'=>$request->input('short_description_sp'),
            'admin_id'=>Auth::id(),
            'status'=>$request->input('status')
        ]);
        if ($status){
            Session::flash('message','Product created successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to create Product!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('product.index');
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
        $categorys = Category::where('status',1)->get();
        $data=Product::find($id);
        return view('product.edit',compact('categorys','data'));
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
        $product=Product::find($id);
        $imagename = $this->update_file($request->file('image'),'/img/product',$request->input('imageToDelete'),$product->image);

        $product->category=$request->input('category');
        $product->name_en=$request->input('name_en');
        $product->name_sp=$request->input('name_sp');
        $product->image=$imagename;
        $product->size=$request->input('size');
        $product->price=$request->input('price');
        $product->origin=$request->input('origin');
        $product->min_order=$request->input('min_order');
        $product->short_description_en=$request->input('short_description_en');
        $product->short_description_sp=$request->input('short_description_sp');
        $product->status=$request->input('status');
        $status=$product->update();
        if ($status){
            Session::flash('message','Product updated successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to updated Product!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $this->delete_file('/img/product',$product->image);

        $status=$product->delete();
        if ($status){
            Session::flash('message','Product deleted successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to delete Product!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('product.index');
    }
}
