<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public static function contact()
    {
        echo view('partial.contact');
    }

    public static function sendmail(Request $request){
        Mail::send('emails.send', ['title' => $request->emailname, 'mail' => $request->emailaddress,'content' =>$request->emailtext], function ($message)
        {
            $message->from('me@gmail.com', 'asdas test');
            $message->to('rokkerdoktor@gmail.com');

        });
        return redirect('/')->with('flash_message', 'Köszönjük a megkeresésed!');
    }
}
