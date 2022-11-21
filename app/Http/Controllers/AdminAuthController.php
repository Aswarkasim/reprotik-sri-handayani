<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAuthController extends Controller
{
    //
    function index()
    {
        return view('admin/auth/login');
    }

    function login(Request $request)
    {
        $data  = $request->validate([
            'nim'     => 'required',
            'password'  => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('admin/dashboard');
        }

        return back()->with('loginError', 'Gagal login. Akses anda salah');
    }

    function register()
    {

        $data = [
            'current_year' => date('Y'),
            'content'  => 'home/home/register'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function doRegister(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required',
            'nim'      => 'required|unique:users',
            'angkatan'      => 'required',
            'nohp'      => 'required',
            'password'      => 'required',
            're_password'      => 'required|same:password',
        ]);

        $data['role']   = 'user';
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        Alert::success('Sukses', 'Akun telah dibuat');
        return redirect('/');
    }

    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
