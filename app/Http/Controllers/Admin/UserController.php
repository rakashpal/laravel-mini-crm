<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserValidation;
class UserController extends Controller
{
    /**
     * Login page
     */
    public function index(){
      if (Auth::check()) {
        return redirect('admin/dashboard');
      }
      Auth::logout();

  
      return view('admin.login', ['title' => 'Login Page']);
    }

    /**
     * Check user Detail
     */
    public function login(UserValidation $request){
      
      if (!Auth::check()) {
        $email=$request->get('email');
        $password=$request->get('password');
  
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
          return redirect('admin/dashboard');
      }else{
        return redirect('admin/login')->with('error', 'Login credential is not valid ') ;
      }
      }else{
        return redirect('admin/dashboard');
      }
  }
  
  public function logout(){
    Auth::logout();
    return redirect(\URL::previous());
  }
}
