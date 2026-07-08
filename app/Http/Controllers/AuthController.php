<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff; // Pastikan model Staff dipanggil

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // 1. Validasi input form
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Cocokkan email DAN password teks biasa (plain text) langsung ke kolom 'pass'
        $user = Staff::where('email', $request->email)
                     ->where('password', $request->password) // Cocokkan langsung tanpa hash/enkripsi apa pun!
                     ->first();

        // 3. Jika ketemu datanya, langsung login-kan manual ke sistem session Laravel
        if ($user) {
            Auth::login($user, $request->has('remember'));
            $request->session()->regenerate();

            // Ambil role-nya dari database
            $userRole = $user->role;

            // Alihkan ke rute yang sesuai di web.php kamu
            if ($userRole === 'admin') {
                return redirect()->intended('/admin');
            } elseif ($userRole === 'estimator') {
                return redirect()->intended('/estimator');
            }

            return redirect()->intended('/');
        }

        // 4. Jika tidak cocok, balikkan ke login dengan teks peringatan merah
        return back()->with('error', 'Email atau password salah!')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}