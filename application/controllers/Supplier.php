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
            "nombreProveedor" => $names_s,
            "tipo_documentoProveedor" => $type_doc,
            "num_documentoProveedor" => $number_doc,
            "direccionProveedor" => $addres,
            "telefonoProveedor" => $phone,
            "emailProveedor" => $email
        );
        $result = $this->ModelSupplier->insert($data, 'proveedor');
        if ($result) {
            $jsonData['rsp'] = 200;
            $jsonData['id'] = $result;
        } else {
            $jsonData['rsp'] = 400;
        }
        $jsonData["data"] = $data;
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }

    public function update()
    {
        $id_supplier = $this->input->post('id_supplier');
        $names_s = $this->input->post('names_s');
        $type_doc = $this->input->post('type_doc');
        $number_doc = $this->input->post('number_doc');
        $addres = $this->input->post('addres');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $data = array(
            "nombreProveedor" => $names_s,
            "tipo_documentoProveedor" => $type_doc,
            "num_documentoProveedor" => $number_doc,
            "direccionProveedor" => $addres,
            "telefonoProveedor" => $phone,
            "emailProveedor" => $email
        );
        $result = $this->ModelSupplier->update(array('idproveedor' => $id_supplier), $data, 'proveedor');
        if ($result) {
            $jsonData['rsp'] = 200;
            $jsonData['id'] = $result;
        } else {
            $jsonData['rsp'] = 400;
        }

        $jsonData["data"] = $data;
        header(('Content-Type; application/json; charset=utf-8'));
        echo json_encode($jsonData);
    }

    public function delete()
    {
        $id = $this->input->post('');
        $result = $this->ModelSupplier->delete(array('idproveedor' => $id), 'proveedor');
        $jsonData['rsp'] = $result;
        header(('Content-Type; application/json; charset=utf-8'));
        echo json_encode($jsonData);
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
