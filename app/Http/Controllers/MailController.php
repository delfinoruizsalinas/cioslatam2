<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactanosMail;
use App\Mail\Activacion_partnerMail;


class MailController extends Controller
{
    public function mailPartner()
    {
        $mailData = [
            'miembro' => 'Partner',
            'perfil' => 'Administrador',
        ];
       //dd($mailData); 
        Mail::to('contacto@ciosmexicanos.com')->send(new ContactanosMail($mailData));
        return "Email is sent successfully."; 
    }
    public function mailPartnerActivation($mail_partner)
    {
        $mailData = [
            'miembro' => 'Partner',
            'perfil' => 'Partner',
        ];
        Mail::to('contacto@ciosmexicanos.com')
                ->cc($mail_partner)
                ->send(new Activacion_partnerMail($mailData));

       //dd($mailData); 
        //Mail::to($mail_partner)
        //        ->send(new Activacion_partnerMail($mailData));
        return "Email is sent successfully."; 
    }
}
