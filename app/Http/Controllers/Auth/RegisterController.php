<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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

    public function showRegistrationForm()
    {
        $categories = Category::all();

        return view('auth.register', compact('categories'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:320', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'restaurant_name' =>['required', 'string', 'max:100'],
            'restaurant_description' =>['required', 'string', 'max:500'],
            'restaurant_description' =>['required', 'string', 'max:500'],
            'address' => ['required', 'string', 'max:200'],
            'p_iva'=>['required', 'string', 'max:11'],
            'img'=>['required', 'image', 'max:1500'],
            'categories'=> ['required', 'exists:categories,id']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {     $user= User::create([
            'name' => $data['name'],
            'surname'=>$data['surname'],
            'restaurant_name' =>$data['restaurant_name'],
            'phone_number' =>$data['phone_number'],
            'img'=>$data['img']->store('images'),
            'restaurant_description' =>$data['restaurant_description'],
            'address' => $data['address'],
            'p_iva'=>$data['p_iva'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->categories()->attach($data['categories']);
        return $user;
    }
}
