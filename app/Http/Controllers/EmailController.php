<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function contact(Request $request)
    {
        $subject = 'Asunto del correo';
        $for = 'herrera.alvaradoartu@gmail.com';
        Mail::send('/emails/email', $request->all(), function ($msj) use ($subject, $for) {
            $msj->from('herrera.alvaradoartu@gmail.com', 'Marktech');
            $msj->subject($subject);
            $msj->to($for);
        });

        return redirect()->back();
    }
}
