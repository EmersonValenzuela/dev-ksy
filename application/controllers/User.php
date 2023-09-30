<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
    }
    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array(
            '<script src="' . base_url() . 'modules/js/user.js"></script>'
        );
        $data['title'] = 'Usuarios';
        $this->template->load('admin/template', 'admin/user', $data);
    }

    public  function create()
    {
        $names_u = $this->input->post('names_u');
        $type_doc = $this->input->post('type_doc');
        $number_doc = $this->input->post('number_doc');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $condition = $this->input->post('condition');
        $phone = $this->input->post('phone');
        $range = $this->input->post('range');
        $currentuser = $this->input->post('current-user');
        $currentpassword = $this->input->post('current-password');
        $data = array(
            "nombre" => $names_u,
            "tipo_documento" => $type_doc,
            "num_documento" => $number_doc,
            "direccion" => $address,
            "telefono" => $phone,
            "email" => $email,
            "cargo" => $range,
            "login" => $currentuser,
            "clave" => $currentpassword,
            "condicion" => $condition,
        );

        $result = $this->ModelUser->insert($data, 'usuario');
        if ($result) {
            $jsonData['rsp'] = 200;
            $jsonData['id'] = $result;
        } else {
            $jsonData['rsp'] = 400;
        }


        $jsonData["data"] = $data;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
    public function update_user()
    {
        $id = $this->input->post('id_user');
        $names_u = $this->input->post('names_u');
        $type_doc = $this->input->post('type_doc');
        $number_doc = $this->input->post('number_doc');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $condition = $this->input->post('condition');
        $phone = $this->input->post('phone');
        $range = $this->input->post('range');
        $currentuser = $this->input->post('current-user');
        $currentpassword = $this->input->post('current-password');
        $data = array(
            "nombre" => $names_u,
            "tipo_documento" => $type_doc,
            "num_documento" => $number_doc,
            "direccion" => $address,
            "telefono" => $phone,
            "email" => $email,
            "cargo" => $range,
            "login" => $currentuser,
            "clave" => $currentpassword,
            "condicion" => $condition,
        );
        $result = $this->ModelUser->update(array('idusuario' => $id), $data, 'usuario');
        if ($result) {
            $jsonData['rsp'] = 200;
        } else {
            $jsonData['rsp'] = 400;
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }

    public function delete_user()
    {
        $id = $this->input->post('id');
        $result = $this->ModelUser->delete(array('idusuario' => $id), 'usuario');
        $jsonData['rsp'] = $result;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
    //API DATA 
    public function get_users()
    {
        $result = $this->ModelUser->get_users();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function get_user()
    {
        $result = $this->ModelUser->get_users(array('idusuario' => $this->input->post('i')));
        $jsonData["result"] = $result;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
}
