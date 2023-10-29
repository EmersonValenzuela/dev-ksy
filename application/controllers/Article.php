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
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/filepond.css">',
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/filepond-plugin-image-preview.css">',
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/flatpickr/flatpickr.min.css">',
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/dropzone.css">'
        );
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/js/flat-pickr/flatpickr.js"></script>',
            '<script src="' . base_url() . 'assets/js/flat-pickr/custom-flatpickr.js"></script>',
            '<script src="' . base_url() . 'assets/js/select2/tagify.js"></script>',
            '<script src="' . base_url() . 'assets/js/select2/tagify.polyfills.min.js"></script>',
            '<script src="' . base_url() . 'assets/js/select2/intltelinput.min.js"></script>',
            '<script src="' . base_url() . 'assets/js/editors/quill.js"></script>',
            '<script src="' . base_url() . 'assets/js/height-equal.js"></script>',
            '<script src="' . base_url() . 'assets/js/filepond/filepond-plugin-image-preview.js"></script>',
            '<script src="' . base_url() . 'assets/js/filepond/filepond-plugin-file-rename.js"></script>',
            '<script src="' . base_url() . 'assets/js/filepond/filepond-plugin-image-transform.js"></script>',
            '<script src="' . base_url() . 'assets/js/filepond/filepond.js"></script>',
            '<script src="' . base_url() . 'assets/js/filepond/custom-filepond.js"></script>',
            '<script src="' . base_url() . 'assets/js/tooltip-init.js"></script>',
            '<script src="' . base_url() . 'modules/js/article.js"></script>'
        );
        $data['title'] = 'Articulos';
        $this->template->load('admin/template', 'admin/article', $data);
    }
    public function create()
    {
        if (!empty($_FILES['archivo']['name'])) {
            $config['upload_path'] = 'modules/uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG|JPEG';

            $image_name = date('dmYhis') . '_' . rand(0, 99999) . "." . pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);

            $config['file_name'] = $image_name;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('archivo')) {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
        } else {
            $image_name = "";
        }

        $cod = $this->input->post('prdCod');
        $tags = $this->input->post('tags');

        $data = array(
            'categoria' => $this->input->post('prdCategoria'),
            'codigo_articulo' => $cod,
            'nombre_articulo' => $this->input->post('prdtitulo'),
            'stock_articulo' => $this->input->post('prdStock'),
            'precio_venta' => $this->input->post('prdInitialCost'),
            'precio_compra' => $this->input->post('prdSelling'),
            'tipoCambio' => $this->input->post('prdChoose'),
            'descripcion_articulo' => $this->input->post('prdDescription'),
            'imagen_articulo' => $image_name,
            'etiquetaArticulo' => $tags,
            'condicion_articulo' => $this->input->post('prdStatus')
        );

        $result = $this->ModelArticle->insert($data,"articulo");
        $jsonData['id'] = $result;
        $jsonData['data'] = $data;
        echo json_encode($jsonData);
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
