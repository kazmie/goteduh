<?php
namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $guard = 'admin';
    protected $redirectTo = 'admin/dashboard';

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    // public function guard()
    // {
    //     return auth()->guard('admin');
    // }
    
    public function __construct()
    {
        //$this->middleware('guest:admin')->except('logout');
    }
    public function redirectTo()
    {
        return 'admin/dashboard';
    }
    protected function guard()
    {
        return \Auth::guard('admin');
    }

    public function index()
    {
        
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function showRegisterPage()
    {
        return view('auth.admin-register');
    }

    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:199',
    //         'email' => 'required|string|email|max:255|unique:admins',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    //     Admin::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //     ]);
    //     return redirect()->route('admin-login')->with('success', 'Registration Success');
    // }

    // public function login(Request $request)
    // {
    //     if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //         return redirect()->route('admin-dashboard');
    //     }
    //     return back()->withErrors(['email' => 'Email or password are wrong.']);
    // }
}
