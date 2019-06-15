<?php

namespace App\Http\Controllers;

use App\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CodeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Code::find($id);
        return view('code.edit',compact('data'));
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
        $code=Code::find($id);
        $code->value=$request->input('value');
        $status=$code->update();
        if ($status){
            Session::flash('message','Code updated successfully!');
            Session::flash('alert-class','success');
        }else{
            Session::flash('message','Failed to updated Code!');
            Session::flash('alert-class','danger');
        }
        return redirect()->route('code.edit',$id);
    }
}
