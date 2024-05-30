<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        // ambil data user lalu simpan pada variable $user
        $user = Auth::user();
        // kondisi jika user nya ada 
        if ($user) {
            return redirect()->intended('dashboard');
        }

        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        // buat validasi pada saat tombol login di klik
        // validasi nya username & password wajib di isi 
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        // ambil data request username & password saja 
        $credential = $request->only('username', 'password');

        // cek jika data username dan password valid (sesuai) dengan data
        if (Auth::attempt($credential)) {
            // kalau berhasil simpan data user ya di variabel $user
            $user =  Auth::user();

            if ($user) {
                return redirect()->intended('dashboard');
            }
        }

        // jika ga ada data user yang valid maka kembalikan lagi ke halaman login
        // pastikan kirim pesan error juga kalau login gagal ya
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }

    public function logout(Request $request)
    {
        // logout itu harus menghapus session nya 
        $request->session()->flush();

        // jalan kan juga fungsi logout pada auth 
        Auth::logout();
        // kembali kan ke halaman login
        return Redirect('login');
    }
}
