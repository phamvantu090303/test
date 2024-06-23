<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
//     public function redirectToGoogle()
//     {
//         return Socialite::driver('google')->redirect();
//     }
//     public function handleGoogleCallback()
//     {
//         try {

//             $user = Socialite::driver('google')->user();
// //google_id được sinh ra từ mã serverAuthCode khi bạn sử dụng Socialite để xác thực người dùng thông qua Google.
//             $finduser = User::where('google_id', $user->id)->first();

//             if($finduser){

//                 Auth::login($finduser);

//                 return redirect()->intended('/');

//             }else{
//                 $newUser = User::create([
//                     'name' => $user->name,
//                     'email' => $user->email,
//                     'google_id'=>$user->id,
//                     'password' => encrypt('12345')
//                 ]);

//                 Auth::login($newUser);

//                 return redirect()->intended('/');
//             }

//         } catch (Exception $e) {
//             dd($e->getMessage());
//         }
//     }
//     public function logout()
//     {
//       Auth::logout();
//       return redirect()->intended('/login');
//     }
}
