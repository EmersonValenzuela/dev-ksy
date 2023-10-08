<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelClient');
    }
    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array(
            '<script src="' . base_url() .'modules/js/client.js"></script>'
        );
        $data['title'] = 'Clientes';
        $this->template->load('admin/template', 'admin/client', $data);
    }
    public  function create()
    {
        $names_cli = $this->input->post('names_cli');
        $type_docc = $this->input->post('type_docc');
        $number_docc = $this->input->post('number_docc');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');

        $data = array(
            "nombre" => $names_cli,
            "tipo_documento" => $type_docc,
            "num_documento" => $number_docc,
            "direccion" => $address,
            "telefono" => $phone,
            "email" => $email,
        );

        $result = $this->ModelClient->insert($data, 'cliente');
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
    public function update_client()
    {
        $id = $this->input->post('id_client');
        $names_cli = $this->input->post('names_cli');
        $type_docc = $this->input->post('type_docc');
        $number_docc = $this->input->post('number_docc');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $data = array(
            "nombre" => $names_cli,
            "tipo_documento" => $type_docc,
            "num_documento" => $number_docc,
            "direccion" => $address,
            "telefono" => $phone,
            "email" => $email,
        );
        $result = $this->ModelClient->update(array('idcliente' => $id), $data, 'cliente');
        if ($result) {
            $jsonData['rsp'] = 200;
        } else {
            $jsonData['rsp'] = 400;
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }

    public function delete_client()
    {
        $id = $this->input->post('id');
        $result = $this->ModelClient->delete(array('idcliente' => $id), 'cliente');
        $jsonData['rsp'] = $result;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
    //API DATA 
    public function get_clients()
    {
        $result = $this->ModelClient->get_client();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function get_client()
    {
        $result = $this->ModelClient->get_client(array('idcliente' => $this->input->post('i')));
        $jsonData["result"] = $result;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
}
