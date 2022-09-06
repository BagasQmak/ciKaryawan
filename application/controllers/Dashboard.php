<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('crud_model');
        $this->load->model('pendapatan_model');
        
      }


    public function index() {
        if( !$this->session->userdata('username')) {
            redirect('auth');}

         $data["pendapatan"] = $this->pendapatan_model->tampilDataPendapatan();
         
         $data["totalPendapatan"] = $this->dashboard_model->totalPendapatan();
         $data["tabel_user"] = $this->crud_model->tampilData();
        $data['title'] = 'Dashboard';
        $data['totalData'] = $this->dashboard_model->jumlahSemuaData();
        $data['user'] = $this->db->get_where('tabel_user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }

  
}