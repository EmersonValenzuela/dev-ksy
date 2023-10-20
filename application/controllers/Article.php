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

        $data['links'] = array(
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/quill.snow.css">',
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/intltelinput.min.css">',
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/tagify.css">',
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/flatpickr/flatpickr.min.css">',
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/dropzone.css">'
        );
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/js/flat-pickr/flatpickr.js"></script>',
            '<script src="' . base_url() . 'assets/js/flat-pickr/custom-flatpickr.js"></script>',
            '<script src="' . base_url() . 'assets/js/dropzone/dropzone.js"></script>',
            '<script src="' . base_url() . 'assets/js/dropzone/dropzone-script.js"></script>',
            '<script src="' . base_url() . 'assets/js/select2/tagify.js"></script>',
            '<script src="' . base_url() . 'assets/js/select2/tagify.polyfills.min.js"></script>',
            '<script src="' . base_url() . 'assets/js/select2/intltelinput.min.js"></script>',
            '<script src="' . base_url() . 'assets/js/editors/quill.js"></script>',
            '<script src="' . base_url() . 'assets/js/height-equal.js"></script>',
            '<script src="' . base_url() . 'assets/js/tooltip-init.js"></script>',
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
        $result = $this->ModelArticle->get_article(array('idarticulo' => $this->input->post('i')));
        $jsonData["result"] = $result;
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
    public function fillCategory()
    {
        $result = $this->ModelArticle->selec_table('categoria');

        echo json_encode($result);
    }
}
