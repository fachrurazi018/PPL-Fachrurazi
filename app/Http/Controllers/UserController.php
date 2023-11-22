<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // method public register
    public function register()
    {
        // mengambil data title 
        $data['title'] = 'Register';
        // mengembalikan nilai ke tampilan user register dengan variabel data title
        return view('auth.register', $data);
    }
    
    public function register_action(Request $request)
    {
        // method request validasi nama, username, password, dan password confirmation
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        // method new user dari name, username, dan password
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // data dari user disimpan
        $user->save();
        // nilai dikembalikan ke route login dengan tampilan registrasi berhasil dan perintah login
        return redirect()->route('login')->with('success','Registrasi berhasil. Silakan Login!');
    }
    // method login
    public function login()
    {
        $data['title'] = 'Login';
        return view('auth.login', $data);
    }
    // method login_action dengan parameter request
    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password harus diisi.',
        ]);
    
        // Autentikasi user
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            if($user->role === 'admin'){
                $request->session()->regenerate();        
                return redirect()->intended(route('dashboard_admin'));
            }
            elseif($user->role === 'user'){
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard'));
            }    
            // Redirect ke halaman dashboard jika login berhasil
        }
    
        // Pesan kesalahan jika username atau password salah
        return back()->withErrors(['email' => 'Username atau password Anda salah.'])->withInput();
    }
    // public method password
    public function password()
    {
        $data['title'] = 'Change Password';
        return view('auth/password', $data);
    }
    public function password_action(Request $request)
    {
        // method request untuk memvalidasi password baru dan password lama
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        // menyimpan password baru
        $user->save();
        $request->session()->regenerate();
        // menampilkan pesan password diubah
        return back()->with('success','Password diubah!');
    }
    // method public logout dengan parameter request
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // mengembalikan ke halaman awal
        return redirect('/');
    }
    
}
