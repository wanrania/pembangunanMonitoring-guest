<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            //Redirect ke halaman dashboard
            return redirect()->route('dashboard');
        }
        //Redirect ke halaman login
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek kecocokan password
        if ($user && Hash::check($request->password, $user->password)) {

            // LOGIN user secara manual (wajib)
            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();      // Hapus semua session
        $request->session()->regenerateToken(); // Cegah CSRF

        // Redirect ke halaman login
        return redirect()->route('dashboard');
    }
}
