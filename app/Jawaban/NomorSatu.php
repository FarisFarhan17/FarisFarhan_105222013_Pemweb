<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NomorSatu {

    public function auth(Request $request) {
		$request->validate([
			'email' => 'required|string',
			'password' => 'required|string',
		]);

		// Cek apakah email atau username
		$loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
	
		$credentials = [
			$loginType => $request->email,
			'password' => $request->password,
		];
	
		if (Auth::attempt($credentials)) {
			// Jika berhasil login, redirect ke halaman home
			return redirect()->route('event.home')->with('success', 'Login berhasil');
		}
	
		// Jika gagal login
		return redirect()->back()->withErrors([
			'email' => 'Email/Username atau password salah.',
		])->withInput();
	}	

    public function logout(Request $request) {
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('event.home')->with('success', 'Logout berhasil');
    }
}
?>
