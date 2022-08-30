<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{ 
    public function index()
    {
        if( !$this->session->userdata('email')) {
            redirect('auth');
         } 


        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function editProfil() {

        $this->load->library('form_validation');

        // $this->form_validation->set_rules('nipeg', 'Nipeg', 'xss_clean|max_length[10]|integer', ['integer' => "%s Hanya boleh diisi Angka"]);

        $this->form_validation->set_rules('name', 'Nama', 'required|xss_clean|trim');

        $this->form_validation->set_message('required', "%s Harus diisi!");
        if( !$this->session->userdata('email')) {
            redirect('auth');
         } 

         $validation = $this->form_validation;

         if ($validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data Gagal Diubah');
        } else {
           $name = $this->input->post('name');
           $email = $this->input->post('email');

           $upload_image = $_FILES['image']['name'];
           
           if($upload_image) {
               $config['allowed_types'] = 'gif|jpg|png';
               $config['max_size'] = 20480;
               $config['upload_path'] = './assets/img/profile';


               $this->load->library('upload', $config);

               if($this->upload->do_upload('image')) {
                   $new_image = $this->upload->data('file_name');
                   $this->db->set('image', $new_image);
               }
           }

           $this->db->set('name', $name);
           $this->db->where('email', $email);
           $this->db->update('user');

            $this->session->set_flashdata('success', 'Diubah');
            redirect('user');
        } 

        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
    }
}