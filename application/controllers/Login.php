<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}
	public function index()
	{
		$data['title'] =  'Login';
		$this->load->view('login', $data);
	}

	public function authUser()
	{
		$u = $this->input->post('u');
		$p = $this->input->post('p');


		$r = $this->LoginModel->auth_user_login(array('login' => $u), 'usuario');
		if ($r) {
			if ($r->clave == $p) {
				$jsonData['rsp'] = 200;
			} else {
				$jsonData['rsp'] = 400;
			}
		} else {
			$jsonData['rsp'] = 100;
		}
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsonData);
	}
}
