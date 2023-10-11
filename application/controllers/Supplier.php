<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelSupplier');
    }
    public function index()
    {
        $data['links'] = array();
        $data['links'] = array(
            '<script src="' . base_url() . 'modules/js/supplier.js"></script>'
        );
        $data['title'] = 'Suppliers';
        $this->template->load('admin/template', 'admin/supplier', $data);
    }

    public function create()
    {
        $names_s = $this->input->post('names_s');
        $type_doc = $this->input->post('type_doc');
        $number_doc = $this->input->post('number_doc');
        $addres = $this->input->post('addres');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $data = array(
            "nombre" => $names_s,
            "tipo_documento" => $type_doc,
            "num_documento" => $number_doc,
            "direccion" => $addres,
            "phone" => $phone,
            "email" => $email
        );
        $result = $this->ModelSupplier->insert($data, 'proveedor');
        if ($result) {
            $jsonData['rsp'] = 200;
            $jsonData['id'] = $result;
        }else {
            $jsonData['rsp'] =400;
        }
        $jsonData["data"] = $data;
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }

    public function update()
    {
        $id_supplier = $this->input->post('id_supplier');
        $names_s=$this->input->post('names_s');
        $type_doc=$this->input->post('type_doc');
        $number_doc=$this->input->post('number_doc');
        $addres=$this->input->post('addres');
        

    }





    //API DATA
    public function get_suppliers()
    {
        $result = $this->ModelSupplier->get_supplier();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function get_supplier()
    {
        $result = $this->ModelSupplier->get_supplier(array('idproveedor' => $this->input->post('i')));
        $jsonData["result"] = $result;
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
}
