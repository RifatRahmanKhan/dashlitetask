<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


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
        $this->middleware('auth');
        $this->middleware('regi_acc');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $moderator = null;
        $officer = null;
        if(Auth::user()->role == 2 && $data['role'] == 3){
            $moderator = Auth::user()->id;
            $officer = null;
        }
        else if(Auth::user()->role == 2 && $data['role'] == 4){
            $moderator = Auth::user()->id;
            $officer = null;
        }
        else if(Auth::user()->role == 3 && $data['role'] == 4){
            $moderator = Auth::user()->moderator;
            $officer = Auth::user()->id;
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
            'moderator' => $moderator,
            'officer' => $officer,
        ]);
    }

    /**
 * Handle a registration request for the application.
 *
 * @param  \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
public function register(Request $request)
{
    $validator = $this->validator($request->all())->validate();

    

    if(Auth::user()->role == 1){
        $validate = $request->validate([
            'role' => 'required|numeric|max:2|min:1',
        ]);
    }else if(Auth::user()->role == 2){
        $validate = $request->validate([
            'role' => 'required|numeric|max:4|min:3',
        ]);
    }else if(Auth::user()->role == 3){
        $validate = $request->validate([
            'role' => 'required|numeric|max:4|min:4',
        ]);
    }
    $user = $this->create($request->all());

    return $this->registered($request, $user)
    ?: redirect(route('home'));
}
}
