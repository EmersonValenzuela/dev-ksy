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
            $this->db->where('condicion_articulo',1);
            $query = $this->db->get();
            return $query->result();
        }
        return $this->db
            ->select('a.*')
            ->select('c.*')
            ->from('articulo a')
            ->join('categoria c', 'c.idcategoria = a.categoria')
            ->where('condicion_articulo',1)
            ->get()
            ->result();
    }
}
