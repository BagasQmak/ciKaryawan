<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{ 

    public function __construct(){
        parent::__construct();
        $this->load->model('menu_model');
      }

    public function index()
    {
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data["menu"] = $this->menu_model->tampilData();

     
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        if( !$this->session->userdata('email')) {
            redirect('auth');
         } 

        $this->load->library('form_validation');
        $data['title'] = 'Tambah Menu';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|xss_clean');

         $this->form_validation->set_message('required', '%s Harus diisi');

         $menu = $this->menu_model;

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data Gagal Ditambahkan');
        } else {
           $menu->simpan();
            $this->session->set_flashdata('success', 'Ditambahkan');
            redirect('menu');
        } 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('menu/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null) {
        if (!isset($id)) redirect('menu');
       
        $this->load->library('form_validation');

        $this->form_validation->set_rules('menu', 'menu', 'required|xss_clean');
       
        $this->form_validation->set_message('required', '%s Harus diisi');

        $menu = $this->menu_model;

         if( !$this->session->userdata('email')) {
            redirect('auth');
         } 

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data Gagal Diubah');
        } else {
            $menu->update();
            $this->session->set_flashdata('success', 'Diubah');
            redirect('menu');
        } 

        
        $data["menu"] = $menu->getById($id);
        if (!$data["menu"]) show_404();
        
        $data['title'] = "Edit Menu";
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view("menu/edit", $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id = null)
    {

        if( !$this->session->userdata('email')) {
            redirect('auth');
         } 

        if (!isset($id)) show_404();
        
       if($this->menu_model->hapus($id)) {
        $this->session->set_flashdata('success', 'Dihapus');
        redirect('menu');
       }
      
        
    }

    public function subMenu() {
        $data['title'] = 'SubMenu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data["subMenu"] = $this->menu_model->tampilDataSubMenu();

     
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }
}