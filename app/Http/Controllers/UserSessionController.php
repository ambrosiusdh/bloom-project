<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserSessionController extends Controller
{
    public function getUserSession(Request $request)
    {
        if (!$request->has('userSession')) {
            return response()->json([
                'success' => false,
                'message' => 'not allowed'
            ], 403);
        }

        return response()->json([
            'user' => session()->get('userSession')
        ]);
    }

    public function loginUser(Request $request)
    {

        if (!$request->json()->get("username") || !$request->json()->get("password")) {
            return response()->json([
                'success' => false,
                'message' => 'Please insert the input'
            ], 200);
        }

        $username = $request->json()->get("username");
        $password = $request->json()->get("password");
        $user = User::where('username', $username)->first();

        if ($user === null || !Hash::check($password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect Username or Password'
            ], 200);
        }

        session()->put('userSession', $user);

        return response()->json([
            'success' => true,
            'username' => $user->username,
            'userFullName' => $user->name
        ], 200);

    }
}
