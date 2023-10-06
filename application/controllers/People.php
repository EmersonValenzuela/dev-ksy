<?php
defined('BASEPATH') or exit('No direct script access allowed');

class People extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPeople');
    }
    public function index()
    {
        $data['links'] = array();
        $data['links'] = array(
            '<script src="' . base_url() . 'modules/js/people.js"></script>'
        );
        $data['title'] = 'Peoples';
        $this->template->load('admin/template', 'admin/people', $data);
    }
        //API DATA 
        public function get_peoples()
        {
            $result = $this->ModelPeople->get_people();
            if ($result) {
                foreach ($result as $row) {
                    $array['data'][] = $row;
                }
            } else {
                $array['data'] = array();
            }
            echo json_encode($array);
        }
        public function get_people()
        {
            $result = $this->ModelPeople->get_category(array('idpersona' => $this->input->post('i')));
            $jsonData["result"] = $result;
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsonData);
        }
}
