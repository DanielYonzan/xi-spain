<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
        $data=Category::orderBy('updated_at','desc')->get();
        return view('category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagename = $this->upload_file($request->file('image'),'/img/category');

        $status=Category::create([
            'name_en'=>$request->input('name_en'),
            'name_sp'=>$request->input('name_sp'),
            'image'=>$imagename,
            'rank'=>$request->input('rank'),
            'status'=>$request->input('status')
        ]);
        if ($status){
            Session::flash('message','Category created successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to create Category!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('category.index');
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
        $data=Category::find($id);
        return view('category.edit',compact('data'));
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
        $category=Category::find($id);
        $imagename = $this->update_file($request->file('image'),'/img/category',$request->input('imageToDelete'),$category->image);

        $category->name_en=$request->input('name_en');
        $category->name_sp=$request->input('name_sp');
        $category->image=$imagename;
        $category->rank=$request->input('rank');
        $category->status=$request->input('status');
        $status=$category->update();
        if ($status){
            Session::flash('message','Category updated successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to updated Category!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $this->delete_file('/img/category',$category->image);

        $products = Product::where('category',$id);
        foreach ($products as $p){
            $this->delete_file('/img/product',$p->image);
        }

        $status=$category->delete();
        if ($status){
            Session::flash('message','Category deleted successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to delete Category!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('category.index');
    }
}
