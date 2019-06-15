<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgentController extends Controller
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
        $countries = ['Germany','United Kingdom','Switzerland','China','Hong Kong','Japan','India','Colombia','Peru','Mexico','United States','Singapur','Korea','Panama','Nigeria','Argeria','Angola','Qatar','United Arab Emirates'];
        $data=Agent::orderBy('updated_at','desc')->get();
        return view('agent.index', compact('data','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = ['Germany','United Kingdom','Switzerland','China','Hong Kong','Japan','India','Colombia','Peru','Mexico','United States','Singapur','Korea','Panama','Nigeria','Argeria','Angola','Qatar','United Arab Emirates'];
        $categorys = Category::all();
        return view('agent.create',compact('countries','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagename = $this->upload_file($request->file('image'),'/img/agent');

        $status=Agent::create([
            'country'=>$request->input('country'),
            'city'=>$request->input('city'),
            'category'=>$request->input('category'),
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'website'=>$request->input('website'),
            'skype'=>$request->input('skype'),
            'whatsapp'=>$request->input('whatsapp'),
            'image'=>$imagename,
        ]);
        if ($status){
            Session::flash('message','Agent created successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to create Agent!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('agent.index');
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
        $data=Agent::find($id);
        $countries = ['Germany','United Kingdom','Switzerland','China','Hong Kong','Japan','India','Colombia','Peru','Mexico','United States','Singapur','Korea','Panama','Nigeria','Argeria','Angola','Qatar','United Arab Emirates'];
        $categorys = Category::all();
        return view('agent.edit',compact('data','countries','categorys'));
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
        $agent=Agent::find($id);
        $imagename = $this->update_file($request->file('image'),'/img/agent',$request->input('imageToDelete'),$agent->image);

        $agent->country=$request->input('country');
        $agent->city=$request->input('city');
        $agent->category=$request->input('category');
        $agent->name=$request->input('name');
        $agent->email=$request->input('email');
        $agent->website=$request->input('website');
        $agent->skype=$request->input('skype');
        $agent->whatsapp=$request->input('whatsapp');
        $agent->image=$imagename;
        $status=$agent->update();
        if ($status){
            Session::flash('message','Agent updated successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to updated Agent!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('agent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent=Agent::find($id);
        $this->delete_file('/img/agent',$agent->image);
        $status=$agent->delete();
        if ($status){
            Session::flash('message','Agent deleted successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to delete Agent!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('agent.index');
    }
}
