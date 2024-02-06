<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		check_login_user();
        $this->load->model('ModelDashboard');
    }
    public function index()
    {
        $data['links'] = array(
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/js-datatables/style.css">',
        );
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/js/chart/apex-chart/stock-prices.js"></script>',
            '<script src="' . base_url() . 'assets/js/chart/apex-chart/apex-chart.js"></script>',
            '<script src="' . base_url() . 'assets/js/js-datatables/simple-datatables%40latest.js"></script>',
            '<script src="' . base_url() . 'modules/js/dashboard.js"></script>'
        );
        $data['facturas'] = $this->ModelDashboard->getTable(array('tipo_comprobante' => 'F'));
        $data['boletas'] = $this->ModelDashboard->getTable(array('tipo_comprobante' => 'B'));
        $data['nota_ventas'] = $this->ModelDashboard->getTable(array('tipo_comprobante' => 'N'));
        $data['title'] = 'Dashboard';
        $this->template->load('admin/template', 'admin/dashboard', $data);
    }

    public function getDataApex()
    {
        $data = $this->ModelDashboard->getDataApex();
        echo json_encode($data);
    }
    public function getAmount()
    {
        $data = $this->ModelDashboard->getAmount();
        echo json_encode($data);
    }

}
?>