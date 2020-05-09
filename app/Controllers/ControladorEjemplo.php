<?php

namespace App\Controllers;
use App\Libraries\LibreriaPdf;



class ControladorEjemplo extends BaseController {



    public function index() {

	return view('welcome_message');
    }


    public function Pdf(){
      $html = view('pdf/prueba'); #contenido
      $NomArchivo = "ejemplopdf"; #nombre del archivo

    //  $template = new LibreriaPdf();
      LibreriaPdf::pdf($html,$NomArchivo);

    }


    public function Phpmail(){
  $destinatario = 'azraelx33@gmail.com';
  $asunto = "ejmplo de correo asunto";
  $html = view('pdf/prueba'); #contenido en formato html

  $result = LibreriaPdf::PhpMailer($html,$destinatario,$asunto); #result capturara el error si no se ejecuta
  echo view('Login'); # la vista que vas a cargar


    }




}
