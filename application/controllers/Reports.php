<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login_user();
        $this->load->model('ModelReports');
    }

    public function index()
    {
        $data['links'] = array(
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/flatpickr/flatpickr.min.css">'
        );
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/js/flat-pickr/flatpickr.js"></script>',
            '<script src="' . base_url() . 'assets/js/flat-pickr/es.js"></script>',
            '<script src="' . base_url() . 'modules/js/report.js"></script>',

        );
        $data['title'] = "Reporte Temperatura";
        $this->template->load('admin/template', 'admin/reports', $data);
    }


    public function reportPDFSales()
    {
        $this->session->set_userdata('dateIn', $this->input->post('dateIn'));
        $this->session->set_userdata('dateOut',  $this->input->post('dateOut'));
        echo json_encode(200);
    }


    public function getTableSales()
    {
        $result = $this->ModelReports->reportSales();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function ViewReportPDF()
    {
        $this->load->library('dompdf_lib');
        $dateIn = $this->session->userdata("dateIn");
        $dateOut =  $this->session->userdata("dateOut");
        if ($dateIn != null || $dateOut != null) {
            $result = $this->ModelReports->reportSalesPDF($dateIn, $dateOut);
        } else {
            $result = $this->ModelReports->reportSalesPDF();
        }

        $data['result'] = $result;
        $data['d1'] = $dateIn;
        $data['d2'] = $dateOut;
        // Carga la vista que deseas convertir a PDF
        $html = $this->load->view('admin/reports/pdfSales', $data, true);
        // Genera el PDF
        $this->dompdf_lib->generar_pdf($html, 'Reporte temperatura de ' . $dateIn . ' hasta ' . $dateOut . '.pdf');
    }
    public function getDetailsSales()
    {
        $idventa = $this->input->post('i');
        $result = $this->ModelReports->getDetailsSales(array('idventa' => $idventa));
        echo json_encode($result);
    }
    public function ticket($id)
    {
        $this->load->library('dompdf_lib');
        $data['detail_sale'] = $this->ModelReports->getDetailsSales(array('idventa' => $id));
        $data['sale'] = $this->ModelReports->reportSales(array('idventa' => $id));

        // Carga la vista que deseas convertir a PDF
        $html = $this->load->view('admin/reports/ticket', $data, true);
        // Genera el PDF
        $this->dompdf_lib->generar_ticket($html, '.pdf');
    }
}
