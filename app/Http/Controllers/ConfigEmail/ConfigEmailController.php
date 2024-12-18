<?php

namespace App\Http\Controllers\ConfigEmail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ConfigEmailController extends Controller
{
    public function edit()
    {
        $email = env('MAIL_RECEIVED');
        return view('admin.config.edit', compact('email'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
            ],
            __('request.messages'),
            [
                'email' => 'Email',
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
        $env = preg_replace('/MAIL_RECEIVED=(.*)/m', 'MAIL_RECEIVED=' . $email, $env);
        file_put_contents(base_path('.env'), $env);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công',
        ]);
    }
}
