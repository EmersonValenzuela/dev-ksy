
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCategory extends CI_Model
{
    public function get_category($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->from('categoria');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
        }
        $this->db->select('*');
        $this->db->from('categoria');
        $query = $this->db->get();
        return $query->result();
    }
}
