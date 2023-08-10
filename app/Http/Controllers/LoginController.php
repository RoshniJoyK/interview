<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('index');
    }

    public function dashboard(Request $request){
        if ($request->session()->has('id')) {
            $_SESSION['name']=$request->session()->get('name');
            return view('dashboard');
        }else{
            return redirect("/")->with("success","Invalid Access");
        }
    }

    public function user_profile(Request $request){
        if ($request->session()->has('id')) {
            $id   = $request->session()->get('id');
            $user = Adminlogin::find($id);
            $_SESSION['name']=$request->session()->get('name');
            return view('userprofile',compact('user'));
        }else{
            return redirect("/")->with("success","Invalid Access");
        }
    }

    public function update_profile(Request $request){
        if($request->session()->has('id')) {
            $id   = $request->session()->get('id');
            $user = Adminlogin::find($id);
            if($request->password != ''){
                $password = Hash::make(request('password'));
            }else{
                $password = $user['password'];
            }
            $formdata = [
                            'email'    => request('email'),
                            'username' => request('username'),
                            'password' => $password
                        ];
            $user->update($formdata);
        }else{
            return redirect("/")->with("success","Invalid Access");
        }
    }

    public function logout(){
        Session::flush();
        return Redirect('/');
    }


    public function login(Request $request){

        $email = $request->Email;
        $user  = Adminlogin::where('email','=',$email)->first();

        if(!empty($user)){
            if(Hash::check($request->Password,$user->password)){
                $request->session()->put('id', $user->id);
                $request->session()->put('name', $user->username);
                return redirect('/dashboard');
            }else{
                return redirect('/')->with("success","Invalid Password");
            }
        }else{
            return redirect('/')->with("success","Invalid Username ");
        }
    }

}
