<?php

namespace App\Http\Controllers\Email;

use App\Models\EmailRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailRequestController extends Controller
{
    function index()
    {
        $emails = EmailRequest::paginate(10);
        return view('admin.email.index', compact('emails'));
    }

    function changeStatus($id)
    {

        $email = EmailRequest::find($id);
        if (!$email) {
            return response()->json([
                'status' => false,
                'message' => 'Email không tồn tại!'
            ]);
        }
        $email->status = 1;
        $email->save();
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thành công!'
        ]);
    }
}
