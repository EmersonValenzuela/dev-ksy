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
		if ($this->session->userdata('cargo') == 1) {
			header('Location: ' . base_url('Punto-venta'));
			exit;
		}
		if ($this->session->userdata('cargo') == 2) {
			header('Location: ' . base_url('Gestionar-Articulos'));
			exit;
		}
		if ($this->session->userdata('cargo') == 3) {
			header('Location: ' . base_url('dashboard'));
			exit;
		}
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
				$data = array(
					'idusuario' => $r->idusuario,
					'nombre' => $r->nombre,
					'cargo' => $r->cargo,
					'is_user_login' => TRUE,
				);
				$this->session->set_userdata($data);

				$jsonData['rsp'] = 200;
				$jsonData['cargo'] = $r->cargo;
			} else {
				$jsonData['rsp'] = 400;
			}
		} else {
			$jsonData['rsp'] = 100;
		}
		echo json_encode($jsonData);
	}
	public function logout()
	{
		$array_items = array('idusuario', 'nombre', 'cargo', 'is_user_login');

		$this->session->unset_userdata($array_items);

		header('Location: ' . base_url());
		exit;
	}
}
