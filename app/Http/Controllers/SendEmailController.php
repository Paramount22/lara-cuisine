<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class SendEmailController extends Controller
{
    public function index()
    {
        return view('email.send_email');
    }

    public function send(Request $request)
    {
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'message' => 'required'

          ]);

      $data = [
        'name' => $request->name,
          'email' => $request->email,
        'message' => $request->message,
      ];

      Mail::to('jurma@jurma.site')->send(new SendEmail($data));

      flash()->success('Správa bola odoslaná');

      return back();

    }

}
