<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function admin(Request $request)
    {
        $admin = Auth::user();

        if (!$admin) {
            return response()->json(
                [
                    'message' => 'Non authentifié.',
                ],
                403,
            );
        }

        return response()->json(
            [
                'message' => 'Admin authentifié.',
                'admin' => $admin,
            ],
            200,
        );
    }

    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'mot_de_passe' => 'required|string',
        ]);

        $admin = User::where('email', $request->email)->first();


        if (!Hash::check($request->mot_de_passe, $admin->password)) {
            return response()->json(
                [
                    'message' => 'Mot de passe incorrect.',
                ],
                401,
            );
        }


        $token = $admin->createToken('AdminToken')->plainTextToken;


        Auth::login($admin);

        return response()->json(
            [
                'message' => 'Vous êtes authentifié.',
                'admin' => $admin,
                'token' => $token,
            ],
            200,
        );
    }

    public function logout(Request $request)
    {

        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(
            [
                'message' => 'Vous êtes déconnecté.',
            ],
            200,
        );
    }
}
