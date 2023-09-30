<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCategory');
    }
    public function index(){
        $data['links']=array();
        $data['scripts']=array( 
            '<script src="' . base_url() . 'modules/js/category.js"></script>'
        );
        $data['title']='Categorias';
        $this ->template->load('admin/template', 'admin/category', $data);
    }
    public function create()
    {
        $names_c = $this->input->post('names_c');
        $descripcion=$this->input->post('descripcion');
        $condition=$this->input->post('condition');
        $data= array(
            "nombre"=>$names_c,
            "descripcion"=>$descripcion,
            "condicion"=>$condition,
        );
        $result = $this->ModelCategory->insert($data, 'categoria');
        if ($result){
            $jsonData['rsp']=200;
            $jsonData['id']=$result;
        }else{
            $jsonData['rsp']=400;
        }

        $jsonData["data"]=$data;
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($jsonData);

    }
}
