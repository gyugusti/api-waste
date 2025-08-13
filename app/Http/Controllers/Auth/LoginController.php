<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Login
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

       if (!Auth::attempt(['username' => $request->username, 'password' => $request->password, 'status' => 10])) {
            return response()->json([
                'status' => 400,
                'keterangan' => 'Username atau Password Salah',
                'response' => [
                ]
            ]);
        }
        $user = Auth::user();
        return response()->json([
            'status' => 200,
            'keterangan' => 'Berhasil Login',
            'response' => [
                'token'=> $user->createToken('api-app')->plainTextToken,
            ]
        ]);
    }
}
