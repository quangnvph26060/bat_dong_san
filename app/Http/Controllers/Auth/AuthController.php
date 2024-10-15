<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{

    public function login()
    {
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('123456789'),
        // ]);
        return view('admin.auth.login');
    }

    function authenticate(LoginRequest $request)
    {
        $cridentials = $request->validated();

        $remember = $request->has('remember') ? true : false;

        if (auth()->attempt($cridentials, $remember)) {

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Đăng nhập thành công.',
                    'redirect' => route('admin.dashboard')
                ]
            );
        }

        return response()->json(
            [
                'status' => false,
                'message' => 'Tài khoản hoặc mật khẩu không chính xác!',
            ]
        );
    }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     return redirect()->route('form_login');
    // }


}
