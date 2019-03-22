<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class FeedbackController extends Controller
{
    public function send(Request $request)
    {
        $result = false;

        if($request->ajax() && !empty($request->all()))
        {
            $sender = $request;


            Mail::to(env('MAIL_ADMIN_EMAIL'))->send(new FeedbackMail($sender));



            $result = true;
        }

        return response()->json(['result' => $result]);
    }
}
