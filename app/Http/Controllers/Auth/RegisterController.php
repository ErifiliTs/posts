<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{   
    // redirects to home when we are signed in 
    // so that we can no longer see register page
    public function __construct(){

        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        // on php console
        // error_log(request('username'));
    
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        //sign in 
        auth()->attempt($request->only('email', 'password'));

        // store data 
        return redirect()->route('dashboard');
    }
}
