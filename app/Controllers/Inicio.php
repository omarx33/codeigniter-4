<?php namespace App\Controllers;

use App\Libraries\LibreriaPdf;

class Inicio extends BaseController
{
	public function index()
	{
		return view('welcome_message');

	}


  public function iniciarSession(){
	
  	//iniciar session
	//echo view('Login');
    echo view('template/header');
    echo view('template/aside');
    echo view('template/plantilla');
    echo view('template/footer');


    // echo view('template/plantilla');



  }

	//--------------------------------------------------------------------




}
