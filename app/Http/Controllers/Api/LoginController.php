<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use ApiResponseTrait;

    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->all(), 'Validasi gagal', 422);
        }

        $credentials = $request->only('email', 'password');

        if (! $token = auth()->guard('api')->attempt($credentials)) {
            return $this->errorResponse(null, 'Email atau password salah', 401);
        }

        return $this->successResponse([
            'user' => auth()->guard('api')->user(),
            'token' => $token,
        ], 'Login berhasil');
    }
}
