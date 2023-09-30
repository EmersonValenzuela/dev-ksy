<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('');
    }
    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array();
        $data['title'] = 'Dashboard';
        $this->template->load('admin/template', 'admin/dashboard', $data);
    }
}
