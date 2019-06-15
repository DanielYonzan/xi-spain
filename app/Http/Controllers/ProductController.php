<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $imagename = $this->upload_file($request->file('file'),'/img/product');

        $status = DB::transaction(function () use ($request,$imagename) {
            $product = Product::create([
                'name_en'=>$request->input('name_en'),
                'name_sp'=>$request->input('name_sp'),
                'size'=>$request->input('size'),
                'unit'=>$request->input('unit'),
                'price'=>$request->input('price'),
                'units_per_case'=>$request->input('units_per_case'),
                'cases_per_palet'=>$request->input('cases_per_palet'),
                'cases_per_palet_layer'=>$request->input('cases_per_palet_layer'),
                'palets_per_20_container'=>$request->input('palets_per_20_container'),
                'self_life'=>$request->input('self_life'),
                'origin'=>$request->input('origin'),
                'min_order'=>$request->input('min_order'),
                'image'=>$imagename,
                'short_description_en'=>$request->input('short_description_en'),
                'short_description_sp'=>$request->input('short_description_sp'),
                'admin_id'=>Auth::id(),
                'status'=>$request->input('status')
            ]);

            foreach ($request->input('category') as $category){
                ProductCategory::create([
                    'category'=>$category,
                    'product'=>$product->id,
                ]);
            }
            return true;
        }, 5);

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
        $productCategorys = ProductCategory::where('product',$id)->pluck('category')->toArray();
        $data=Product::find($id);
        return view('product.edit',compact('categorys','productCategorys','data'));
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

        $productCategorys = ProductCategory::where('product',$id);
        DB::transaction(function () use ($productCategorys, $product, $request) {
            $productCategorys->delete();
            foreach ($request->input('category') as $category){
                ProductCategory::create([
                    'category'=>$category,
                    'product'=>$product->id,
                ]);
            }
            return true;
        }, 5);

        $product->name_en=$request->input('name_en');
        $product->name_sp=$request->input('name_sp');
        $product->image=$imagename;
        $product->size=$request->input('size');
        $product->unit=$request->input('unit');
        $product->price=$request->input('price');
        $product->units_per_case=$request->input('units_per_case');
        $product->cases_per_palet=$request->input('cases_per_palet');
        $product->cases_per_palet_layer=$request->input('cases_per_palet_layer');
        $product->palets_per_20_container=$request->input('palets_per_20_container');
        $product->self_life=$request->input('self_life');
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

        $productCategorys = ProductCategory::where('product',$id);
        $status = DB::transaction(function () use ($productCategorys, $product) {
            $productCategorys->delete();
            $product->delete();

            return true;
        }, 5);

        if ($status){
            $this->delete_file('/img/product',$product->image);
            Session::flash('message','Product deleted successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to delete Product!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('product.index');
    }

    function filterProducts()
    {
        $status = $_POST['status'];
        if($status==''){
            $products = Product::all();
        }else{
            $products = Product::where('status', $status)->get();
        }
        $i = 1;
        $html = '';
        $images = [];
        foreach ($products as $product) {
            $html .= '<tr>';
            $html .= '<td>' . $i++ . '</td>';
            $html .= '<td>' . $product->name_en . '</td>';
            $imagepath = asset('img/product/' . $product->image);
            array_push($images,$imagepath);
            $html .= '<td><img class="img-fluid" src="' . $imagepath . '" width="100"></td>';
            $html .= '<td>' . $product->size . ' ' . $product->unit . '</td>';
            $html .= '<td>' . $product->price . '</td>';
            $html .= '<td>' . $product->units_per_case . '</td>';
            $html .= '<td>' . $product->cases_per_palet . '</td>';
            $html .= '<td>' . $product->cases_per_palet_layer . '</td>';
            $html .= '<td>' . $product->palets_per_20_container . '</td>';
            $html .= '<td>' . $product->self_life . '</td>';
            $html .= '<td>' . $product->origin . '</td>';
            $html .= '<td>' . $product->min_order . '</td>';
            $html .= '<td>' . $product->short_description_en . '</td>';
            $st = $product->status ? '<div class="badge badge-success badge-pill" > Active</div >' : '<div class="badge badge-light badge-pill">In Active</div>';
            $html .= '<td>' . $st . '</td>';
            $html .= '<td>'.
                    '<a href="'.route('product.edit',$product->id).'" class="btn btn-sm btn-success">Edit</a>'.
                    '<form class="d-inline-block" action="'.route('product.destroy',$product->id).'" method="post">'.
                    csrf_field().
                    method_field('delete').
                    '<button type="submit" class="btn btn-sm btn-link text-danger" onclick="return  confirm(\'Are you sure want to delete?\')"><u>Delete</u></button>'.
                    '</form>'.
                    '</td>';
            $html .= '</tr>';
        }
        return response()->json(['html'=>$html,'images'=>$images], 200);
    }
}
