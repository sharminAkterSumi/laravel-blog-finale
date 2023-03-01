<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocioalLogincontroller extends Controller
{
 public function googlelogin()
 {
  // return Socialite::driver('google')->redirect();
 }
 public function googleredirect()
 {
//   $user = Socialite::driver('google')->stateless()->user();

//   // $newuser= User::create([
//   //   'name'=>,
//   //   'email'=>,
//   //   'password'=>,
//   // ])
//   //   dd($user);

 }
}
