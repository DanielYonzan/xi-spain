<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Salone;
use App\User;
use App\Http\Controllers\Controller;
use App\Zone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        $zones = Zone::all();
        $categorys = Category::where('status',1)->orderBy('rank')->get();
        return view('auth.register', compact('zones','categorys'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'zone' => 'required',
            'area' => 'required',
            'account_type' => 'required',
            'salone_name' => 'required',
            'slug' => 'required',
            'logo' => 'required',
//            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $logoname = $this->upload_file($data['logo'],'/img/salone/logo');
        $category = NULL;

        if ($data['account_type'] == 'service' && isset($data['category'])){
            $category = $data['category'];
        }
        $status=Salone::create([
            'zone'=>$data['zone'],
            'area'=>$data['area'],
            'category'=>$category,
            'name'=>$data['salone_name'],
            'slug'=>$data['slug'],
            'logo' => $logoname,
            'user_id' => $user->id,
            'trial_end_date' => date("Y-m-d H:i:s",strtotime(' + 30 days'))
        ]);
        if ($status){
//            Session::flash('message','Account created successfully!');
//            Session::flash('alert-class','success');
            return $user;
        }
    }
}
