<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPeople extends CI_Model
{
    public function get_people($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->from('persona');
            $this->db->where('tipo_persona', 'cliente');
            $query = $this->db->get();
            $resultado = $query->result();
        }
        $this->db->select('*');
        $this->db->from('persona');
        $this->db->where('tipo_persona', 'cliente');
        $query = $this->db->get();
        return $query->result();
    }
    public function inser($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}
