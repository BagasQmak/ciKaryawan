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
        if( !$this->session->userdata('username')) {
           redirect('auth');
        } 
        $data['user'] = $this->db->get_where('tabel_user', ['username' => 
        $this->session->userdata('username')])->row_array();
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

        $this->form_validation->set_rules('nipeg', 'Nipeg', 'xss_clean|max_length[10]|integer', ['integer' => "%s Hanya boleh diisi Angka"]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'xss_clean');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('bagian', 'Bagian', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules ('username', 'Username', 'required|trim');
        $this->form_validation->set_rules ('email', 'Email', 'trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules ('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!', 
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules ('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->input->post('image')) {
            // $image = $this->input->post('image');
           

           $upload_image = $_FILES['image']['image'];
           
           if($upload_image) {
               $config['allowed_types'] = 'gif|jpg|png';
               $config['max_size'] = 20480;
               $config['upload_path'] = './assets/img/profile';


               $this->load->library('upload', $config);

               if($this->upload->do_upload('image')) {
                   $new_image = $this->upload->data('file_name');
                   $this->db->set('image', $new_image);
               }
               
            };
        }

        $this->form_validation->set_message('required', '%s Harus diisi!');
        $this->form_validation->set_message('is_unique', '%s Sudah ada (terpakai), Mohon ganti dengan yang lain');
        $this->form_validation->set_message('alpha_dash_space', '%s Hanya boleh diisi Huruf');

        $crud = $this->crud_model;
        $validation = $this->form_validation;
        // $validation->set_rules($crud->rules());
        // $validation->set_message($crud->errorMessage());

        if( !$this->session->userdata('username')) {
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
        $data['user'] = $this->db->get_where('tabel_user', ['username' => 
        $this->session->userdata('username')])->row_array();
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
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('bagian', 'Bagian', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|xss_clean|callback_alpha_dash_space');
        $this->form_validation->set_rules('role_id', 'Role', 'required|xss_clean');

        // $this->form_validation->set_message('is_unique', '%s Sudah ada (terpakai), Mohon ganti dengan yang lain');
        $this->form_validation->set_message('alpha_dash_space', '%s Hanya boleh diisi Huruf');
        $this->form_validation->set_message('max_length', '%s Tidak boleh lebih dari 10 karakter');
        $this->form_validation->set_message('role_id', '%s Harus Dipilih');

        $crud = $this->crud_model;
        $validation = $this->form_validation;
        // $validation->set_rules($crud->rules());

        if( !$this->session->userdata('username')) {
            redirect('auth');}

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
        $data['user'] = $this->db->get_where('tabel_user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view("crud/edit", $data);
        $this->load->view('templates/footer');
    }

    public function hapus($nipeg = null)
    {

        if( !$this->session->userdata('username')) {
            redirect('auth');}

        if (!isset($nipeg)) show_404();
        
        if ($this->crud_model->hapus($nipeg)) {
            $this->session->set_flashdata('success', 'Dihapus');
            redirect('crud');
        }
    }

}