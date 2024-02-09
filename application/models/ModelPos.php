<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPos extends CI_Model
{
    public function get_article($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->from('articulo');
            $this->db->where($where);
            $this->db->where('condicion_articulo', 1);
            $query = $this->db->get();
            return $query->result();
        }
        return $this->db
            ->select('a.*')
            ->select('c.*')
            ->from('articulo a')
            ->join('categoria c', 'c.idcategoria = a.categoria')
            ->where('condicion_articulo', 1)
            ->get()
            ->result();
    }

    public function get_last_sale($where = null)
    {
        if ($where != null) {
            $this->db->select('num_comprobante');
            $this->db->from('venta');
            $this->db->where($where);
            $this->db->order_by('idventa', 'DESC'); // Cambia 'id' por el campo que define el orden
            $this->db->limit(1); // Limita el resultado a 1
            $query = $this->db->get();
            $last_record = $query->row();
            if ($last_record) {
                // Si se encontró un registro, obtener el valor de num_comprobante y sumarle uno
                $last_num_comprobante = $last_record->num_comprobante;
                $next_num_comprobante = $last_num_comprobante + 1;
                return $next_num_comprobante;
            } else {
                // Si no se encontraron registros que cumplan las condiciones, devolver un valor predeterminado o manejar el caso según sea necesario
                return 1; // Por ejemplo, si no hay registros, comenzar desde 1
            }
        }
    }
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data, $table)
    {
        $this->db->where($id);
        $this->db->update($table, $data);
        return $this->db->insert_id();
    }
    public function getById($where)
    {
        $this->db->select('*');
        $this->db->from('articulo');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }
}
