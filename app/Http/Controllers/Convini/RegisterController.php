<?php

namespace App\Http\Controllers\Convini;

use App\Convini;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = '/convini/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:convini');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {       return Validator::make($data, [
            'convini_name' => ['required', 'string', 'max:20'],
            'branch_name' => ['required', 'string', 'max:20'],
            'prefecture' => ['required'],
            'address' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email:rfc,filter', 'max:30', 'unique:convinis'],
            'password' => ['required', 'string', 'min:8','max:50'],
            'password_confirm' =>['same:password'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Convini
     */
    protected function create(array $data)
    {
        return Convini::create([
            'convini_name' => $data['convini_name'],
            'branch_name' => $data['branch_name'],
            'prefectures' => $data['prefecture'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'convini_pic' => 'no-image.png',
        ]);
    }

    public function showRegister()
    {
        return view('convini.register');
    }

    public function register(Request $request)
    {   
        $this->validator($request->all())->validate();
        \Debugbar::addMessage(3);
        event(new Registered($convini = $this->create($request->all())));
        $this->guard()->login($convini);

        return $this->registered($request, $convini)
                        ?: redirect($this->redirectPath());
    }

    protected function guard()
    {
        return Auth::guard('convini');
    }
}
