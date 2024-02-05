<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login_user();
        $this->load->model('ModelPos');
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
    public function load()
    {
        if ($this->input->post('category') != null) {
            $result = $this->ModelPos->get_article(array('categoria' => $this->input->post('category')));
        } else {
            $result = $this->ModelPos->get_article();
        }
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function sale()
    {
        try {
            $values = $this->input->post('carrito');

            // Calcular el IGV
            $igv = $values['total_price'] * 0.18;
            $igv = round($igv, 2);

            // Crear el array para la venta
            $sale = array(
                "usuario" => 1,
                "cliente" => $values['client'],
                "tipo_comprobante" => $values['voucher'],
                "serie_comprobante" => $values['voucher'] . "001",
                "impuesto" => $igv,
                "total_venta" => $values['total_price'],
                "estado" => 1
            );

            // Insertar la venta en la base de datos
            $idSale = $this->ModelPos->insert($sale, 'venta');

            // Actualizar el número de comprobante
            $this->ModelPos->update(array('idventa' => $idSale), array('num_comprobante' => $idSale), 'venta');

            // Itera sobre las claves numéricas y realiza la inserción
            foreach ($values as $key => $value) {
                if (is_numeric($key)) {
                    $idarticulo = $value["articulo"]["idarticulo"];
                    $saleDetail = array(
                        "idventa" => $idSale,
                        "idarticulo" => $idarticulo,
                        "cantidad" => $value['cantidad'],
                        "precio_detalle" => $value["articulo"]["precio_venta"],
                    );
                    $this->ModelPos->insert($saleDetail, 'detalle_venta');
                }
            }
            $jsonData['id'] = $idSale;
            $jsonData['user'] = "ADMIN";



            echo json_encode($jsonData);

            // Si todo está bien, realizar más acciones o responder a la solicitud

        } catch (Exception $e) {
            // Manejar la excepción, puedes imprimir mensajes de error o loguearlos
            echo json_encode('Error: ' . $e->getMessage());
        }
    }
    public function upload_ticket()
    {
        // Verifica si se ha enviado un archivo
        if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
            // Directorio donde se guardará el archivo PDF
            $directorio_destino = './comprobantes/';

            // Verifica si el directorio destino existe, si no, créalo
            if (!is_dir($directorio_destino)) {
                mkdir($directorio_destino, 0777, true);
            }

            // Mueve el archivo PDF al directorio destino
            $nombre_archivo = $this->input->post('num_comp'); // Nombre deseado para el archivo PDF
            $archivo_temporal = $_FILES['file']['tmp_name'];
            $archivo_destino = $directorio_destino . $nombre_archivo;
            move_uploaded_file($archivo_temporal, $archivo_destino);

            // Devuelve una respuesta al cliente
            echo 'Archivo PDF guardado con éxito en: ' . $archivo_destino;
        } else {
            // Maneja el caso de que no se haya enviado ningún archivo o haya ocurrido un error
            echo 'Error al guardar el archivo PDF';
        }
    }
}
