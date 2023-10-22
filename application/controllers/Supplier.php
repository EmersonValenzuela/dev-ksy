<?php
defined('BASEPATH') or exit('No direct script access allowed');

class supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelSupplier');
    }
    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array(
            '<script src="' . base_url() .'modules/js/supplier.js"></script>'
        );
        $data['title'] = 'Proveedors';
        $this->template->load('admin/template', 'admin/supplier', $data);
    }
    public  function create()
    {
        $names_s = $this->input->post('names_s');
        $type_docs = $this->input->post('type_docs');
        $number_docs = $this->input->post('number_docs');
        $addresss = $this->input->post('addresss');
        $phones = $this->input->post('phones');
        $emails = $this->input->post('emails');

        $data = array(
            "nombreProveedor" => $names_s,
            "tipo_documentoProveedor" => $type_docs,
            "num_documentoProveedor" => $number_docs,
            "direccionProveedor" => $addresss,
            "telefonoProveedor" => $phones,
            "emailProveedor" => $emails,
        );

        $result = $this->ModelSupplier->insert($data, 'proveedor');
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
    public function update()
    {
        $id = $this->input->post('id_supplier');
        $names_s = $this->input->post('names_s');
        $type_docs = $this->input->post('type_docs');
        $number_docs = $this->input->post('number_docs');
        $addresss = $this->input->post('addresss');
        $phones = $this->input->post('phones');
        $emails = $this->input->post('emails');
        $data = array(
            "nombreProveedor" => $names_s,
            "tipo_documentoProveedor" => $type_docs,
            "num_documentoProveedor" => $number_docs,
            "direccionProveedor" => $addresss,
            "telefonoProveedor" => $phones,
            "emailProveedor" => $emails,
        );
        $result = $this->ModelSupplier->update(array('idproveedor' => $id), $data, 'proveedor');
        if ($result) {
            $jsonData['rsp'] = 200;
        } else {
            $jsonData['rsp'] = 400;
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $result = $this->ModelSupplier->delete(array('idproveedor' => $id), 'proveedor');
        $jsonData['rsp'] = $result;
        header('Content-type: application/json; charset=utf-8');
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
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
}
