<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuhController extends Controller
{
    //
    public function index(){
        return view('auth.signup');
    }
    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'required|string|min:1',
            'email'=>'required|email|min:1',
            'password'=>'required|string|min:1',
        ]);
        $validated['password']=hash::make($request->password);
        User::create($validated);
        return redirect()->route('Auth.signin');
    }
    public function index2(){
        return view('auth.signin');
    }
    public function check( Request $request){
        $validated=$request->validate([
            'email'=>'required|email|min:1',
            'password'=>'required|string|min:1',
        ]);
        if(Auth::attempt($validated)){
            Auth::user();
            return redirect()->route('home');
        }
        return redirect()->route('Auth.signin')->withErrors(['error' => 'Invalid credentials']);
    }
    
}
