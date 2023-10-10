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
