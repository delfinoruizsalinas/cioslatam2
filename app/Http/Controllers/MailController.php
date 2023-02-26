<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactanosMail;


class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'miembro' => 'Partner',
            'perfil' => 'Administrador'
        ];
       //dd($mailData); 
        Mail::to('delfinoruizsalinas@gmail.com')->send(new ContactanosMail($mailData));

        dd("Email is sent successfully.");
    }
}
