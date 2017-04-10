<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use DB;
use App\Quotation;
use App\Page;
use App\Emails;
use App\Message;


class RegistrosController extends Controller
{
	// *****************************************************************
	// Método para buscar un email por su nombre
	public function find_mail(Request $request)
    {
        // Validate the request...

        $emails = DB::table('newsletter_emails')
			->where('email',$request->newsletterEmail)
            ->count();
           
        return response()->json($emails);
    }
	
	// Método para registrar un nuevo email para notificaciones
    public function registro_mails(Request $request)
    {
        // Validate the request...

        $email = new Emails;

        $email->email = $request->newsletterEmail;

        $email->save();
    }
    
    // *****************************************************************
	// Método para registrar un nuevo mensaje de contacto
    public function registro_message(Request $request)
    {
        // Validate the request...

        $email = new Message;

        $email->name = $request->name;
        $email->email = $request->email;
        $email->subject = $request->subject;
        $email->message = $request->message;

        $email->save();
    }
	
}
