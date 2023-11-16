<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        
        if (Session::get('status') === 'login' && Session::get('role')=== "admin") {
           
            return redirect()->route('dashboard.index');

        } else {
            return view("admin.login", [
                'page' => 'login',
                'subpage' => 'login',
                'title' => 'Login',
            ]);
        }
    }
    public function login(Request $request) {
       
        $email = $request->input('email');
        $password = $request->input('password');
    
       
        if (empty($email) || empty($password)) {
            return back()->with('error', 'Email dan password harus diisi.');
        }
    
      
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return back()->with('error', 'Format email tidak valid.');
        }
    
       $data = Login::prosesLogin($email, $password);
       if ($data['success']) {
            Session::put('role', $data['role']);
            Session::put('status', 'login');
            if (isset($data['desa'])) {
                Session::put('desa', $data['desa']);
            }
            return redirect()->route('login.index');
        } else {
            return back()->with('error', $data['message']);
        }
    }

    // Fungsi logout jika diperlukan
    public function logout(Request $request){
        $request->session()->flush();

        return redirect()->route('login.index');
    }
}
