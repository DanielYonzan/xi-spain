<?php

namespace App\Http\Controllers;

use App\Brochure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrochureController extends Controller
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
        $data=Brochure::orderBy('title','desc')->get();
        return view('brochure.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brochure.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagename = $this->upload_file($request->file('file'),'/img/brochure');

        $status=Brochure::create([
            'title'=>$request->input('title'),
            'file'=>$imagename,
            'status'=>$request->input('status')
        ]);
        if ($status){
            Session::flash('message','Brochure uploaded successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to upload Brochure!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('brochure.index');
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
        $data=Brochure::find($id);
        return view('brochure.edit',compact('data'));
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
        $brochure=Brochure::find($id);
        $imagename = $this->update_file($request->file('file'),'/img/brochure',$request->input('imageToDelete'),$brochure->file);

        $brochure->title=$request->input('title');
        $brochure->file=$imagename;
        $brochure->status=$request->input('status');
        $status=$brochure->update();
        if ($status){
            Session::flash('message','Brochure updated successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to updated Brochure!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('brochure.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brochure=Brochure::find($id);
        $this->delete_file('/img/brochure',$brochure->file);


        $status=$brochure->delete();
        if ($status){
            Session::flash('message','Brochure deleted successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to delete brochure!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('brochure.index');

    }
}
