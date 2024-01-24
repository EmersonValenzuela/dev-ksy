<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelReports extends CI_Model
{
    public function reportSales()
    {
        return $this->db
            ->select('V.*, U.nombreCliente, DATE_FORMAT(V.fecha_hora, "%Y/%m/%d") as formatted_date')
            ->from('venta V')
            ->join('cliente U', 'V.cliente = U.idcliente')
            ->order_by('V.fecha_hora', 'DESC')
            ->get()
            ->result();
    }
    public function reportSalesPDF($dateIn = null, $dateOut = null)
    {
        $d1 = date('Y-m-d', strtotime($dateIn));
        $d2 = date('Y-m-d', strtotime($dateOut));
        if ($dateIn != null && $dateOut != null) {
            return $this->db
                ->select('V.*, U.nombreCliente, DATE_FORMAT(V.fecha_hora, "%Y/%m/%d") as formatted_date, U.num_documentoCliente')
                ->from('venta V')
                ->join('cliente U', 'V.cliente = U.idcliente')
                ->where('STR_TO_DATE(V.fecha_hora, "%Y-%m-%d") BETWEEN \'' . $d1 . '\' AND \'' . $d2 . '\'') // Ajusta la sintaxis para incluir las comillas simples
                ->order_by('V.fecha_hora', 'DESC')
                ->get()
                ->result();
        }
        return $this->db
            ->select('V.*, U.nombreCliente, DATE_FORMAT(V.fecha_hora, "%Y/%m/%d") as formatted_date, U.num_documentoCliente')
            ->from('venta V')
            ->join('cliente U', 'V.cliente = U.idcliente')
            ->order_by('V.fecha_hora', 'DESC')
            ->get()
            ->result();
    }
    public function getDetailsSales($where)
    {
        return $this->db
            ->select('*')
            ->from('detalle_venta')
            ->where($where)
            ->get()
            ->result();
    }
}
