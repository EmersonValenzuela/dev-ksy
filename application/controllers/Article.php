<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelArticle');
    }
    public function index()
    {

        $data['links'] = array();
        $data['scripts'] = array(
            '<script src="' . base_url() . 'modules/js/article.js"></script>'
        );
        $data['title'] = 'Articulos';
        $this->template->load('admin/template', 'admin/article', $data);
    }
    //API DATA para sacar informacion
    public function get_articles()
    {
        $result = $this->ModelArticle->get_article();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function get_article()
    {
        $result = $this ->ModelArticle->get_article(array('idarticulo' => $this->input->post('i')));
        $jsonData["result"] = $result;
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
}
