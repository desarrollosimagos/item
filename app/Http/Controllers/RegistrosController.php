<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use DB;
use App\Quotation;
use App\Page;
use App\Emails;


class RegistrosController extends Controller
{
	public function find_mail(Request $request)
    {
        // Validate the request...

        $emails = DB::table('newsletter_emails')
			->where('email',$request->newsletterEmail)
            ->count();
           
        return response()->json($emails);
    }
	    
    public function registro_mails(Request $request)
    {
        // Validate the request...

        $email = new Emails;

        $email->email = $request->newsletterEmail;

        $email->save();
    }
	
}
