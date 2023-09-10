<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthenticationController extends Controller
{
    public function login() {
        return view("auth.login");
    } 
    public function registration(){
        return view("auth.registration");
    }
    public function registerUser(Request $request){
        $request->validate([         
            'name' => 'required',
            'position' => 'required',
            'contactNumber' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->position = $request->position;
        $user->contactNumber = $request->contactNumber;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success','You have Regisered Successfullly');
        }
        else{
            return back()->with('failed','Failed to Registered! ');
        }
    }

    public function loginUser(Request $request){
        $request->validate([            
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }
            else{
                return back()->with('failed','Password not match! ');
            }
        }
        else{
            return back()->with('failed','Failed to Login! ');
        }
    }

    public function dashboard(){
        $dataProducts = array();
        $dataUser = array();
        if(Session::has('loginId')){
            $dataProducts = Product::all(); // for the products table
            $dataUser = User::where('id','=', Session::get('loginId'))->first(); // for the user table
        }else{
            return 'error';
        }
        return view('dashboard', compact('dataProducts','dataUser'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
