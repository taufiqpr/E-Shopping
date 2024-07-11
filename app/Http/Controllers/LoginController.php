<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\PasswordResetToken; 
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class LoginController extends Controller {
    public function index(){
        return view('auth.login');
    }

    public function forgot_password(){

        return view('auth.forgot-password');
    }

    public function forgot_password_act(Request $request){

        $customMessage = [
            'email|required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.exists' => 'Email tidak terdaftar didatabase',
        ];

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], $customMessage);

        $token = \Str::random(60);

        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]
        );

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return redirect()->route('forgot-password')->with('succes', 'Kami telah mengirim link reset passwrod ke email anda');
    }

    public function validasi_forgot_password_act(Request $request){

        $customMessage = [
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
        ];

        $request->validate([
            'password' => 'required|min:6'
        ], $customMessage);

        $token = PasswordResetToken::where('token', $request->token)->first();

        if (!$token) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }

        $user = User::where('email', $token->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('failed', 'Email tidak terdaftar didatabase');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $token->delete();
        return redirect()->route('login')->with('succes', 'Password Berhasil direset');
    }

    public function validasi_forgot_password(Request $request, $token){
        
        $getToken = PasswordResetToken::where('token', $token)->first();

        if (!$getToken) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }
        return view ('auth.validasi-token', compact('token'));
    }


    public function login_proses(Request $request){
        // dd($request->all());
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()-> route('dashboard');
        }else{
            return redirect()-> route('login')->with('failed', 'email atau password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('succes', 'kamu berhasil logout');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data['name'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password); 

        User::create($data);

        $login = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect()-> route('dashboard');
        }else{
            return redirect()-> route('login')->with('failed', 'email atau password salah');
        }
    }
}
