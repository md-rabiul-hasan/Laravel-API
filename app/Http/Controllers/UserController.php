<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function getToken(Request $request) {
        $email    = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                "name" => Auth::user()->name,
                "status" => 200,
                "api_token" => Auth::user()->api_token
            ]);
        }else{
            return response()->json([
                "error" => "user not found",
                "status" => 404
            ]);
        }
    }
}
