<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function verifyAccount($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if($user->role_id === 2) {
                if(!$user->is_email_verified) {
                    $verifyUser->user->is_email_verified = 1;
                    $verifyUser->user->save();
                    $message = "Your e-mail is verified. waiting approve from admin.";
                } else {
                    $message = "Your e-mail is already verified. You can now login.";
                }
            } else {
                if(!$user->is_email_verified) {
                    $verifyUser->user->is_email_verified = 1;
                    $verifyUser->user->status = 1;
                    $verifyUser->user->save();
                    $message = "Your e-mail is verified. waiting approve from admin.";
                } else {
                    $message = "Your e-mail is already verified. You can now login.";
                }
            }

        }


        $deleteToken = $verifyUser->delete();

        return $message;
    }

    public function upload() {
        return response()->json([
         'data' => ProductDesign::get()
        ]);
    }

    public function uploadShow($id) {
        return response()->json([
            'data' => ProductDesign::find($id)
        ]);
    }
}
