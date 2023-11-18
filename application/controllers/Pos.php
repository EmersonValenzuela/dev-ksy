<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelClient');
    }
    public function index()
    {
        $data['links'] = array(
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/swiper/swiper-bundle.min.css">',
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/swiper/swiper.min.css">'
        );
        $data['scripts'] = array(
            ' <script src="' . base_url() . 'assets/js/touchspin_2/custom_touchspin.js"></script>',
            ' <script src="' . base_url() . 'assets/js/swiper/swiper-bundle.min.js"></script>',
            ' <script src="' . base_url() . 'assets/js/dashboard/dashboard_8.js"></script>',
            '<script src="' . base_url() . 'modules/js/pos.js"></script>'
        );
        $data['title'] = 'Punto de Venta';
        $this->template->load('admin/template', 'admin/pos', $data);
    }
}
