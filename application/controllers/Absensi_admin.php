<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_admin extends CI_Controller 
{ 
    public function index()
    {
        $data['title'] = 'Data Absensi';
        $data['user'] = $this->db->get_where('tabel_user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/absensi', $data);
        $this->load->view('templates/footer');
    }
}