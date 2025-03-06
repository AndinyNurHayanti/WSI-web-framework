<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string', // VALIDASI KOLOM USERNAME
        'password' => 'required|string|min:6'
    ]);

    // LAKUKAN PENGECEKAN, JIKA INPUTAN DARI USERNAME FORMATNYA ADALAH EMAIL,
    // MAKA KITA AKAN MELAKUKAN PROSES AUTHENTICATION MENGGUNAKAN EMAIL, SELAIN ITU,
    // AKAN MENGGUNAKAN USERNAME
    $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    // TAMPUNG INFORMASI LOGINNYA, DIMANA KOLOM TYPE PERTAMA BERSIFAT DINAMIS
    // BERDASARKAN VALUE DARI PENGECEKAN DIATAS
    $login = [
        $loginType => $request->username,
        'password' => $request->password
    ];

    // LAKUKAN LOGIN
    if (Auth::attempt($login)) {
        // JIKA BERHASIL, MAKA REDIRECT KE HALAMAN HOME
        return redirect()->route('home');
    }

    // JIKA SALAH, MAKA KEMBALI KE LOGIN DAN TAMPILKAN NOTIFIKASI
    return redirect()->route('login')->with('error', 'Email/Password salah!');
}
}