<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('crud_model');
      }

    public function index() {
        $data["tabel_user"] = $this->crud_model->tampilData();
        $data['title'] = 'Data Pegawai';
        if( !$this->session->userdata('email')) {
           redirect('auth');
        } 
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('crud/index', $data);
        $this->load->view('templates/footer');
    }

    function alpha_dash_space($str){
        return( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE; 
    }

    public function tambah()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nipeg', 'Nipeg', 'required|xss_clean|max_length[10]|integer|is_unique[tabel_user.nipeg]', ['integer' => "%s Hanya boleh diisi Angka"]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required|xss_clean');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('bagian', 'Bagian', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|xss_clean|callback_alpha_dash_space');

        $this->form_validation->set_message('is_unique', '%s Sudah ada (terpakai), Mohon ganti dengan yang lain');
        $this->form_validation->set_message('alpha_dash_space', '%s Hanya boleh diisi Huruf');

        $crud = $this->crud_model;
        $validation = $this->form_validation;
        // $validation->set_rules($crud->rules());
        // $validation->set_message($crud->errorMessage());

        if( !$this->session->userdata('email')) {
            redirect('auth');
         } 

        if ($validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data Gagal Ditambahkan');
        } else {
            $crud->simpan();
            $this->session->set_flashdata('success', 'Ditambahkan');
            redirect('crud');
        } 

        $data['title'] = "Tambah Data";
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('crud/tambah', $data);
        $this->load->view('templates/footer');
        
    }

    public function edit($nipeg = null)
    {
        if (!isset($nipeg)) redirect('index.php');
       
        $this->load->library('form_validation');

        // $this->form_validation->set_rules('nipeg', 'Nipeg', 'xss_clean|max_length[10]|integer', ['integer' => "%s Hanya boleh diisi Angka"]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required|xss_clean');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('bagian', 'Bagian', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|xss_clean|callback_alpha_dash_space');

        // $this->form_validation->set_message('is_unique', '%s Sudah ada (terpakai), Mohon ganti dengan yang lain');
        $this->form_validation->set_message('alpha_dash_space', '%s Hanya boleh diisi Huruf');
        $this->form_validation->set_message('max_length', '%s Tidak boleh lebih dari 10 karakter');

        $crud = $this->crud_model;
        $validation = $this->form_validation;
        // $validation->set_rules($crud->rules());

        if( !$this->session->userdata('email')) {
            redirect('auth');
         } 

        if ($validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data Gagal Diubah');
        } else {
            $crud->update();
            $this->session->set_flashdata('success', 'Diubah');
            redirect('crud');
        } 

        $data["crud"] = $crud->getById($nipeg);
        if (!$data["crud"]) show_404();
        
        $data['title'] = "Edit Data";
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view("crud/edit", $data);
        $this->load->view('templates/footer');
    }

    public function hapus($nipeg = null)
    {

        if( !$this->session->userdata('email')) {
            redirect('auth');
         } 

        if (!isset($nipeg)) show_404();
        
        if ($this->crud_model->hapus($nipeg)) {
            $this->session->set_flashdata('success', 'Dihapus');
            redirect('crud');
        }
    }

}