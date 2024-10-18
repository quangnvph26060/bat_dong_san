<?php

namespace App\Http\Controllers\Client;

use App\Models\News;
use App\Models\EmailRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    function home()
    {
        $news = News::limit(10)->get();
        return view('client.pages.home.home', compact('news'));
    }

    function news()
    {
        $news = News::paginate(10);
        return view('client.pages.news.new', compact('news'));
    }

    function newsDetail($slug)
    {
        $news = News::paginate(10);
        $newDetail = News::where('slug', $slug)->first();
        if (!$newDetail) abort(404);
        return view('client.pages.news.detail', compact('news', 'newDetail'));
    }

    function subscribe(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'name' => 'nullable|string',
                'phone' => 'required|regex:/^[0-9]{10}$/',
            ],
            __('request.messages'),
        );

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors(), 'message' => 'Vui lòng kiểm tra lại thông tin!']);
        }

        $existEmail = EmailRequest::where('email', $request->email)->first();

        if ($existEmail) {
            if ($existEmail->last_sent_at && \Carbon\Carbon::parse($existEmail->last_sent_at)->addMinutes(5) > now()) {
                return response()->json(['status' => false, 'message' => 'Vui lòng thực hành sau 5 phút!']);
            }

            $existEmail->last_sent_at = now();
            $existEmail->save();
        } else {

            $data = $validator->validated();
            $data['last_sent_at'] = now();
            EmailRequest::create($data);
        }

        return response()->json(['status' => true, 'message' => 'Yêu cầu của bạn đã được ghi nhận!']);
    }
}
