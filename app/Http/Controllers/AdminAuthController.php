<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = DB::table('admins')
            ->where('email', $request->email)
            ->first();

        if (!$admin) {
            return back()
                ->withInput()
                ->with('error', 'Email atau password salah.');
        }

        if (!Hash::check($request->password, $admin->password)) {
            return back()
                ->withInput()
                ->with('error', 'Email atau password salah.');
        }

        $request->session()->regenerate();

        session([
            'admin_id' => $admin->id,
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Login berhasil. Selamat datang!');
    }


    public function dashboard()
{
    $jumlahPesan = \App\Models\Pesan::where(
        'status',
        'Belum Dibaca'
    )->count();

    return view(
        'admin.dashboard',
        compact('jumlahPesan')
    );
}


    public function logout(Request $request)
    {
        $request->session()->flush();

        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login')
            ->with('success', 'Anda berhasil logout.');
    }
}