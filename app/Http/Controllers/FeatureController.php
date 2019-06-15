<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeatureController extends Controller
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
        $data=Feature::orderBy('updated_at','desc')->get();
        return view('feature.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagename = $this->upload_file($request->file('image'),'/img/feature');

        $status=Feature::create([
            'name_en'=>$request->input('name_en'),
            'name_sp'=>$request->input('name_sp'),
            'image'=>$imagename,
            'short_description_en'=>$request->input('short_description_en'),
            'short_description_sp'=>$request->input('short_description_sp'),
            'rank'=>$request->input('rank'),
            'status'=>$request->input('status')
        ]);
        if ($status){
            Session::flash('message','Feature created successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to create Feature!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('feature.index');
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
        $data=Feature::find($id);
        return view('feature.edit',compact('data'));
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
        $feature=Feature::find($id);
        $imagename = $this->update_file($request->file('image'),'/img/feature',$request->input('imageToDelete'),$feature->image);

        $feature->name_en=$request->input('name_en');
        $feature->name_sp=$request->input('name_sp');
        $feature->image=$imagename;
        $feature->short_description_en=$request->input('short_description_en');
        $feature->short_description_sp=$request->input('short_description_sp');
        $feature->rank=$request->input('rank');
        $feature->status=$request->input('status');
        $status=$feature->update();
        if ($status){
            Session::flash('message','Feature updated successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to updated Feature!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('feature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature=Feature::find($id);
        $this->delete_file('/img/feature',$feature->image);

        $status=$feature->delete();
        if ($status){
            Session::flash('message','Feature deleted successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to delete Feature!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('feature.index');
    }
}
