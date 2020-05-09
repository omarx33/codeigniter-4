<?php
namespace App\Libraries;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf; # dompdf
class LibreriaPdf {


    public static function pdf($html,$NomArchivo) {


			// instantiate and use the dompdf class
			$dompdf = new Dompdf();
			$dompdf->loadHtml($html);

			// (Optional) Setup the paper size and orientation
			// $dompdf->setPaper('A4', 'landscape');
			//vertical
			$dompdf->setPaper('A4', 'letter');
			// Render the HTML as PDF
			$dompdf->render();

			// $dompdf ->stream('LISTA DE Empleados.pdf',array('Attachment'=>0));#Previzualizar
			$dompdf->stream($NomArchivo.'.pdf');#Descargar Pdf


    }


    public static function PhpMailer($html,$destinatario,$asunto) {
#si vas a enviar correos con gmail habilita la opcion: Permitir el acceso de aplicaciones poco seguras

      $mail = new PHPMailer(true);

      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        //Tell PHPMailer to use SMTP
  $mail->isSMTP();

  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;

  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  // use
  // $mail->Host = gethostbyname('smtp.gmail.com');
  // if your network does not support SMTP over IPv6

  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;

  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'tls';

  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;

  //Config UTF-8
  $mail->CharSet = "utf-8";

  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "tucorreo@gmail.com";

  //Password to use for SMTP authentication
  $mail->Password = "xxxx";

  //Set who the message is to be sent from
  $mail->setFrom('tucorreo@gmail.com', 'omar');#remitente

  //Set an alternative reply-to address
  //$mail->addReplyTo('azraelx33@gmail.com', 'adjunto');

  //Set who the message is to be sent to
  $mail->addAddress($destinatario);#destinatario
//  $mail->addAddress($destinatario,'ejemplo ana');#o tambien añade el nombre
  //$mail->AddCC("jorge0920520@gmail.com"); copia carbon
  //$mail->AddBCC("jorge0920520@gmail.com"); copia oculta
  //Set the subject line
  $mail->Subject = $asunto; #asunto

  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);



  $mail->msgHTML($html);

  //Replace the plain text body with one created manually
  //$mail->AltBody = 'This is a plain-text message body';

  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');
  //$mail->addAttachment('images/php.png');

  //send the message, check for errors
  if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  }
  //else
  // {
  // echo "ok";
  //
  // }


    }




}
