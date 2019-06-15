<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
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
        $data=Event::orderBy('updated_at','desc')->get();
        return view('event.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagename = $this->upload_file($request->file('image'),'/img/event');

        $status=Event::create([
            'name'=>$request->input('name'),
            'image'=>$imagename,
            'price'=>$request->input('price'),
            'date'=>$request->input('date'),
            'short_description_en'=>$request->input('short_description_en'),
            'short_description_sp'=>$request->input('short_description_sp'),
            'status'=>$request->input('status')
        ]);
        if ($status){
            Session::flash('message','Event created successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to create Event!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('event.index');
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
        $data=Event::find($id);
        return view('event.edit',compact('data'));
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
        $event=Event::find($id);
        $imagename = $this->update_file($request->file('image'),'/img/event',$request->input('imageToDelete'),$event->image);

        $event->name=$request->input('name');
        $event->image=$imagename;
        $event->price=$request->input('price');
        $event->date=$request->input('date');
        $event->short_description_en=$request->input('short_description_en');
        $event->short_description_sp=$request->input('short_description_sp');
        $event->status=$request->input('status');
        $status=$event->update();
        if ($status){
            Session::flash('message','Event updated successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to updated Event!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event=Event::find($id);
        $this->delete_file('/img/event',$event->image);

        $status=$event->delete();
        if ($status){
            Session::flash('message','Event deleted successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to delete Event!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('event.index');
    }
}
