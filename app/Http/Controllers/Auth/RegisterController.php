<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                Rule::unique((new User)->getConnectionName() . '.' . (new User)->getTable(), 'email'),
            ],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 402,
                'response' => $validator->errors()
            ]);  
        }
        try {
            DB::beginTransaction();
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password_hash' => bcrypt($request->password),
                'status' => 10,
            ]);

            if(!$user){
                DB::rollBack();
                return response()->json(['message' => 'Gagal menyimpan user.'], 500);
            }
            DB::commit();
            $token = $user->createToken('api-app')->plainTextToken;
            return response()->json([
                    'user' => $user,
                    'token' => $token
                ],201);

            
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error' => $th->getMessage()
            ], 500);
        }
        
    }
}
