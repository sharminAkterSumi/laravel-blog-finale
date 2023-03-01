<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocioalLogincontroller extends Controller
{
 public function googlelogin()
 {
  /**
   * GOOGLE_CLIENT_ID=960911124865-ij0jdvuao7nar6m4faet2dl85fqf7n58.apps.googleusercontent.com
*GOOGLE_CLIENT_SECRET=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
*GOOGLE_REDIRECT_URL= http://localhost:8000/google/redirect
   */
  return Socialite::driver('google')->redirect();
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
