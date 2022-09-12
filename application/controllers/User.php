<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('crud_model');
        $this->get_datasess = $this->db->get_where('tabel_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('absensi_model');
        $this->load->model('front_model');
        $this->get_datasetupapp = $this->front_model->fetchsetupapp();
        $timezone_all = $this->get_datasetupapp;
        date_default_timezone_set($timezone_all['timezone']);
    }

    public function index()
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $data["tabel_user"] = $this->user_model->tampilData();
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('tabel_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function editProfil()
    {

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->library('form_validation');

        // $this->form_validation->set_rules('nipeg', 'Nipeg', 'xss_clean|max_length[10]|integer', ['integer' => "%s Hanya boleh diisi Angka"]);

        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|trim');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required|xss_clean|trim');
        if ($this->input->post('image')) {
            // $image = $this->input->post('image');


            $upload_image = $_FILES['image']['image'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 20480;
                $config['upload_path'] = './assets/img/profile';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
            };
        }

        $this->form_validation->set_message('required', "%s Harus diisi!");


        $crud = $this->user_model;
        $validation = $this->form_validation;

        if ($validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data Gagal Diubah');
        } else {


            $crud->update();
            $this->session->set_flashdata('success', 'Diubah');
            redirect('user');
        }

        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('tabel_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
    }

    public function absen()
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        if (date("H") < 4) {
            $greet = 'Selamat Malam';
        } elseif (date("H") < 11) {
            $greet = 'Selamat Pagi';
        } elseif (date("H") < 16) {
            $greet = 'Selamat Siang';
        } elseif (date("H") < 18) {
            $greet = 'Selamat Sore';
        } else {
            $greet = 'Selamat Malam';
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'nama', 'required', ['required' => "%s Harus diisi"]);

        $absen = $this->absensi_model;
        $validation = $this->form_validation;

        if ($validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal Absen');
        } else {
            $absen->do_absen();
            $this->session->set_flashdata('success', 'Berhasil Absen');
            redirect('absensi_user');
        }


        $data = [
            'title' => "Menu Absensi",
            'user' => $this->get_datasess,
            'tabel_user' => $this->crud_model->tampilData(),
            'dataapp' => $this->get_datasetupapp,
            'dbabsensi' => $this->front_model->fetchdbabsen($this->get_datasess['nipeg']),
            'greeting' => $greet

        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/absen', $data);
        $this->load->view('templates/footer');
    }
}
