<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use DB;
use App\Quotation;
use App\Page;
use App\Emails;
use App\Message;
use App\Postulation;


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

        $message = new Message;

        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;

        $message->save();
    }
    
    // *****************************************************************
	// Método para registrar una nueva postulación de trabajo
    public function registro_postulation(Request $request)
    {
        // Validate the request...

        $postulation = new Postulation;
        
        $postulation->your_name = $request->your_name;
        $postulation->your_email = $request->your_email;
        $postulation->endereo = $request->endereo;
        $postulation->provincia = $request->provincia;
        $postulation->comuna = $request->comuna;
        $postulation->passaporte = $request->passaporte;
        $postulation->sexo = $request->sexo;
        $postulation->estado_civil = $request->estado_civil;
        $postulation->nascimento = $request->nascimento;
        $postulation->nacionalidade = $request->nacionalidade;
        $postulation->naturalidade = $request->naturalidade;
        $postulation->telefone = $request->telefone;
        //~ $postulation->anexar_cv = $request->anexar_cv;
        $postulation->anexar_cv = $_FILES['anexar_cv']['name'];  // Usamos el array asociativo nativo de php $_FILES para obtener los atributos del archivo

        $postulation->save();
        
        // Sección para el registro del archivo en la ruta establecida para tal fin (public/files)
        $ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
        
        if (move_uploaded_file($_FILES['anexar_cv']['tmp_name'], $ruta."/files/".$_FILES['anexar_cv']['name'])) {
			echo "El fichero es válido y se subió con éxito.\n";
		} else {
			echo "¡Posible ataque de subida de ficheros!\n";
		}
        
    }
	
}
