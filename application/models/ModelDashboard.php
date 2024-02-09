
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDashboard extends CI_Model
{
    public function getDataApex()
    {
        // Obtener la fecha actual y ajustarla para obtener el final del día
        $currentDate = date('Y-m-d');
        $endOfDay = $currentDate . ' 23:59:59';

        // Calcular la fecha 7 días atrás
        $sevenDaysAgo = date('Y-m-d', strtotime('-7 days')) . ' 00:00:00';

        // Construir la consulta
        $this->db->select('tipos.tipo_comprobante, fechas.fecha, COALESCE(ventas.cantidad_ventas, 0) as cantidad_ventas, COALESCE(ventas.total_venta, 0) as total_venta');
        $this->db->from('
            (SELECT "F" as tipo_comprobante
             UNION SELECT "B" as tipo_comprobante
             UNION SELECT "N" as tipo_comprobante) as tipos
             CROSS JOIN
            (SELECT DISTINCT DATE(fecha_hora) as fecha FROM venta WHERE fecha_hora BETWEEN "' . $sevenDaysAgo . '" AND "' . $endOfDay . '") as fechas
            LEFT JOIN
            (SELECT tipo_comprobante, DATE(fecha_hora) as fecha, COUNT(*) as cantidad_ventas, SUM(total_venta) as total_venta FROM venta WHERE fecha_hora BETWEEN "' . $sevenDaysAgo . '" AND "' . $endOfDay . '" GROUP BY tipo_comprobante, DATE(fecha_hora)) as ventas
            ON tipos.tipo_comprobante = ventas.tipo_comprobante AND fechas.fecha = ventas.fecha
        ', null, false);
        $query = $this->db->get();

        // Obtener los resultados
        return $query->result();
    }

    public function getAmount()
    {
        // Obtener la fecha actual y ajustarla para obtener el final del día
        $currentDate = date('Y-m-d');
        $endOfDay = $currentDate . ' 23:59:59';
    
        // Calcular la fecha 7 días atrás
        $sevenDaysAgo = date('Y-m-d', strtotime('-7 days')) . ' 00:00:00';
    
        // Tipos de comprobante que deben estar presentes
        $tiposComprobante = ['B', 'F', 'N'];
    
        // Construir el conjunto de resultados con los tipos de comprobante
        $resultadosEsperados = [];
        foreach ($tiposComprobante as $tipo) {
            $resultadosEsperados[] = (object) ['tipo_comprobante' => $tipo, 'monto_total' => 0];
        }
    
        // Obtener los resultados reales de la consulta
        $this->db->select('tipo_comprobante, SUM(total_venta) as monto_total');
        $this->db->from('venta');
        $this->db->where('fecha_hora BETWEEN "' . $sevenDaysAgo . '" AND "' . $endOfDay . '"');
        $this->db->group_by('tipo_comprobante');
        $query = $this->db->get();
        $results = $query->result();
    
        // Fusionar los resultados reales con los resultados esperados
        foreach ($resultadosEsperados as $key => $resultadoEsperado) {
            foreach ($results as $resultado) {
                if ($resultado->tipo_comprobante === $resultadoEsperado->tipo_comprobante) {
                    $resultadosEsperados[$key]->monto_total = $resultado->monto_total;
                    break;
                }
            }
        }
    
        // Calcular la suma total de los montos por tipo de comprobante
        $totalAmount = 0;
        foreach ($resultadosEsperados as $row) {
            $totalAmount += $row->monto_total;
        }
    
        // Combinar los resultados en un solo array
        $data = [
            'total_amount' => $totalAmount,
            'amounts_by_type' => $resultadosEsperados
        ];
    
        // Devolver los datos al frontend
        return $data;
    }
    
    public function getTable($where)
    {
        return $this->db->select('c.*, v.nombreCliente')
            ->from('venta c')
            ->join('cliente v', 'v.idcliente = c.cliente')
            ->where($where)
            ->get()->result();
    }
}
?>