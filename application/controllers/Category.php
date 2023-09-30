<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCategory');
    }
    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array(
            '<script src="' . base_url() . 'modules/js/category.js"></script>'
        );
        $data['title'] = 'Categorias';
        $this->template->load('admin/template', 'admin/category', $data);
    }
    public function create()
    {
        $names_c = $this->input->post('names_c');
        $descripcion = $this->input->post('description');
        $condition = $this->input->post('condition');
        $data = array(
            "nombre" => $names_c,
            "descripcion" => $descripcion,
            "condicion" => $condition,
        );
        $result = $this->ModelCategory->insert($data, 'categoria');
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
        $id_category = $this->input->post('id_category');
        $names_c = $this->input->post('names_c');
        $descripcion = $this->input->post('description');
        $condition = $this->input->post('condition');
        $data = array(
            "nombre" => $names_c,
            "descripcion" => $descripcion,
            "condicion" => $condition,
        );
        $result = $this->ModelCategory->update(array('idcategoria' => $id_category),$data, 'categoria');
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

    public function delete()
    {
        $id = $this->input->post('id');
        $result = $this->ModelCategory->delete(array('idcategoria' => $id), 'categoria');
        $jsonData['rsp'] = $result;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }

    //API DATA 
    public function get_categories()
    {
        $result = $this->ModelCategory->get_category();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function get_category()
    {
        $result = $this->ModelCategory->get_category(array('idcategoria' => $this->input->post('i')));
        $jsonData["result"] = $result;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
}
