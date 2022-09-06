<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('pendapatan_model');
        $this->load->model('crud_model');
      }

    public function index() {
        if( !$this->session->userdata('username')) {
            redirect('auth');}


         $data["tabel_pendapatan"] = $this->pendapatan_model->tampilDataPendapatan();
        $data['title'] = 'Data Pendapatan';
        $data['user'] = $this->db->get_where('tabel_user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendapatan/index', $data);
        $this->load->view('templates/footer');
    }

    function alpha_dash_space($str_in = '') {
        return (! preg_match("/^([-a-z0-9_ ])+$/i", $str_in)) ? FALSE : TRUE;
    }
    

    public function tambah() {
        if( !$this->session->userdata('username')) {
            redirect('auth');}

         

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nominal', 'Nominal', 'required|xss_clean|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|xss_clean|differs["tanggal"]');

        $this->form_validation->set_message('alpha_dash_space', '%s Hanya boleh diisi Huruf dan Angka');
        $this->form_validation->set_message('numeric', '%s Hanya boleh diisi Angka');
        $this->form_validation->set_message('required', '%s Harus diisi');
        $this->form_validation->set_message('differs', '%s sudah ada, tidak boleh sama!');
       
        $pendapatan = $this->pendapatan_model;
        $validation = $this->form_validation;
        // $validation->set_rules($crud->rules());
        // $validation->set_message($crud->errorMessage());

        if ($validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data Gagal Ditambahkan');
        } else {
            $pendapatan->simpan();
            $this->session->set_flashdata('success', 'Ditambahkan');
            redirect('pendapatan');
        } 

        $data['title'] = "Tambah Data";
        $data['user'] = $this->db->get_where('tabel_user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendapatan/tambah', $data);
        $this->load->view('templates/footer');
        
    }

    public function edit($no = null) {
        if (!isset($no)) redirect('index.php');
       
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nominal', 'Nominal', 'required|xss_clean|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|xss_clean');

        $this->form_validation->set_message('alpha_dash_space', '%s Hanya boleh diisi Huruf dan Angka');
        $this->form_validation->set_message('numeric', '%s Hanya boleh diisi Angka');
        $this->form_validation->set_message('required', '%s Harus diisi');
       
        $pendapatan = $this->pendapatan_model;
        $validation = $this->form_validation;

         if( !$this->session->userdata('username')) {
            redirect('auth');}

        if ($validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data Gagal Diubah');
        } else {
            $pendapatan->update();
            $this->session->set_flashdata('success', 'Diubah');
            redirect('pendapatan');
        } 

        
        $data["pendapatan"] = $pendapatan->getById($no);
        if (!$data["pendapatan"]) show_404();
        
        $data['title'] = "Edit Data";
        $data['user'] = $this->db->get_where('tabel_user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("pendapatan/edit", $data);
        $this->load->view('templates/footer');
    }

    public function hapus($no = null)
    {

        if( !$this->session->userdata('username')) {
            redirect('auth');}

        if (!isset($no)) show_404();
        
        if ($this->pendapatan_model->hapus($no)) {
            $this->session->set_flashdata('success', 'Dihapus');
            redirect('pendapatan');
        }
    }

    public function tanggal($tanggal) {
        var_dump($tanggal);
    }

}