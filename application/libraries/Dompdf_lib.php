<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Dompdf_lib
{
    public function __construct()
    {
        // Carga la librería dompdf
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
    }

    public function generar_pdf($html, $filename = '')
    {
        // Configura las opciones de dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Carga el contenido HTML
        $dompdf->loadHtml($html);

        // Establece el tamaño del papel y la orientación a horizontal
        $dompdf->setPaper('A4', 'landscape');

        // Renderiza el PDF
        $dompdf->render();

        // Configura el encabezado de la respuesta
        header('Content-Type: application/pdf');

        // Devuelve el contenido del PDF
        echo $dompdf->output();
    }
}
