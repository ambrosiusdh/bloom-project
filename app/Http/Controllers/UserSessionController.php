<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserSessionController extends Controller
{
    public function getUserSession(Request $request){
        if(!$request->has('userSession')){
            return response()->json([
                'success' => false,
                'message' => 'not allowed'
            ], 403);
        }

        return $request->session()->get('userSession');
    }

    public function loginUser(Request $request){

        if(!$request->json()->get("userId") || !$request->json()->get("userPassword")){
            return response()->json([
                'success' => false,
                'message' => 'Please insert the input'
            ], 200);
        }

        $username = $request->json()->get("userId");
        $userPassword = $request->json()->get("userPassword");



        return response()->json([
            'userId' => $request->json()->get("userId")
        ]);
    }
}
