<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');

	}


public function iniciarSession(){
	//iniciar session
	$session = \Config\Services::session();
	$newdata = [
		'name' => 'novato'
	];
	$session->set($newdata);
	echo $session->get('name');
}

	public function eliminarSession(){
		$this->session->remove('name');
	}

	//--------------------------------------------------------------------

}
