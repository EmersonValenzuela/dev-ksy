
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function get_users($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
        }
        $this->db->select('*');
        $this->db->from('usuario');
        $query = $this->db->get();
        return $query->result();
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

    public function delete($data ,$table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($data);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $this->db->where($data);
            $this->db->delete($table);
            return true;
        } else {
            return false;
        }
    }
}
