<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'email' => 'sometimes|email',
            'password' => 'required|string',
            'status' => 'sometimes|integer',
        ]);

        $data['password_hash'] = Hash::make($data['password']);
        unset($data['password']);
        $data['status'] = $data['status'] ?? 10;

        $user = User::create($data);

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'username' => 'sometimes|string',
            'email' => 'sometimes|email',
            'password' => 'sometimes|string',
            'status' => 'sometimes|integer',
        ]);

        if (isset($data['password'])) {
            $data['password_hash'] = Hash::make($data['password']);
            unset($data['password']);
        }

        $user->update($data);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}

