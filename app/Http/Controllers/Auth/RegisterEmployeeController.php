<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;


use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterEmployeeController extends Controller
{
    //

    use RedirectsUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        session()->put('previousUrl', url()->previous());

        return view('auth.RegisterEmployee');
    }


    protected function guard()
    {
        return Auth::guard();
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255','min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=> ['required', 'string', 'min:8', 'confirmed'],
        ]);

       $user=  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password),
            'userType'=>'employee',
        ]);

        Profile::create([
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'user_id'=>$user->id
        ]);

        $this->guard()->login($user);

       return redirect()->route('employee.profile');
        
    }


}
