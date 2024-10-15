<?php

namespace App\Http\Controllers\ConfigEmail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ConfigEmailController extends Controller
{
    public function edit()
    {
        $email = env('MAIL_USERNAME');
        $password = env('MAIL_PASSWORD');
        return view('admin.config.edit', compact('email', 'password'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            __('request.messages'),
            [
                'email' => 'Email',
                'password' => 'Password',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Vui lòng kiểm tra lại thông tin!'
            ]);
        }

        $email = $request->email;
        $password = $request->password;
        $env = file_get_contents(base_path('.env'));
        $env = preg_replace('/MAIL_USERNAME=(.*)/m', 'MAIL_USERNAME=' . $email, $env);
        $env = preg_replace('/MAIL_PASSWORD=(.*)/m', 'MAIL_PASSWORD=' . $password, $env);
        file_put_contents(base_path('.env'), $env);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công',
        ]);
    }
}
