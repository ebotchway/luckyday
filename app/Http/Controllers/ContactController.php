<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        //get email from form
        $email = $_POST['email'];

        // the message
        $msg = "Hello, I came by your site and want to be alerted when completed.\n My email is: " . $email . ".\n Thank you";
        $to = "Luckydaytvshow@gmail.com";
        $subject = "Alert upon site Completion";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 50);

        // send email
        mail($to, $subject, $msg);
        return back();
    }
}
