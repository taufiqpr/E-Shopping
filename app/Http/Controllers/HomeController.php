<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
     public function dashboard(){
        return view ('dashboard');
     }

     public function index(){
        $data = Home::get();
        return view ('index', compact('data'));
     }

     public function create(){
      return view('create');
     }

     public function store(Request $request){
      $validator = Validator::make($request->all(),[
         'email' => 'required|email',
         'nama'  => 'required',
         'alamat'  => 'required',
         'password' => 'required',
      ]);

      if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

      $data['email'] = $request->email;
      $data['name'] = $request->nama;
      $data['password'] = Hash::make($request->password);
      $data['alamat'] = $request->alamat;

      Home::create($data);

      return redirect()->route('index');
     }

     public function edit(Request $request,$id){
      $data = Home::find($id);

      return view('edit', compact('data'));
     }

     public function update(Request $request,$id){
      $validator = Validator::make($request->all(),[
         'email' => 'required|email',
         'nama'  => 'required',
         'password' => 'nullable',
         'alamat'  => 'required',
      ]);

      if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

      $data['email'] = $request->email;
      $data['name'] = $request->nama;
      $data['alamat'] = $request->alamat;

      if($request->password){
         $data['password'] = Hash::make($request->password);

      }

      Home::whereId($id)->update($data);

      return redirect()->route('index');
     }

     public function delete(Request $request,$id){
      $data = Home::find($id);

      if($data){
         $data->delete();
      }
      return redirect()->route('index');
     }

     public function login_google()
     {
         return view('logingoogle');
     }
 
     public function redirect()
     {
         return Socialite::driver('google')->redirect();
     }
 
     public function callback()
     {
         try {
             $googleUser = Socialite::driver('google')->stateless()->user();
             $user = User::where('email', $googleUser->email)->first();
 
             if(!$user) {
                 $user = User::create([
                     'name' => $googleUser->name,
                     'email' => $googleUser->email,
                     // Additional user details can be saved here
                 ]);
             }
 
             Auth::login($user);
 
             return redirect()->route('home.landing');
         } catch (\Exception $e) {
             // Log the error message
             \Log::error($e->getMessage());
 
             // Redirect back with an error message
             return redirect()->route('index')->with('error', 'Failed to authenticate using Google. Please try again.');
         }
     }
 
     public function landing()
     {
         return view('landing');
     }
}
