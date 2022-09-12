<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model');
		$this->load->model('front_model');
		$this->get_datasess = $this->db->get_where('tabel_user', ['username' => 
        $this->session->userdata('username')])->row_array();
		$this->load->model('absensi_model');
		$this->get_datasetupapp = $this->front_model->fetchsetupapp();
		$timezone_all = $this->get_datasetupapp;
		date_default_timezone_set($timezone_all['timezone']);
	}


	public function index()
	{

		// if( !$this->session->userdata('username')) {
        //     redirect('auth');
        // }
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

	// public function absen() {

	// 	$this->load->library('form_validation');

    //     $this->form_validation->set_rules('nipeg', 'Nipeg', 'xss_clean|max_length[10]|integer', ['integer' => "%s Hanya boleh diisi Angka"]);

	// 	$this->form_validation->set_message('alpha_dash_space', '%s Hanya boleh diisi Huruf');

	// 	$absen = $this->front_model;
    //     $validation = $this->form_validation;

	// 	if ($validation->run() == FALSE) {
    //         $this->session->set_flashdata('error', 'Gagal Absen');
    //     } else {
    //         $absen->do_absen();
    //         $this->session->set_flashdata('success', 'Berhasil Absen');
    //         redirect('absensi');
    //     } 

	// 	$data['title'] = "Absensi";
    //     $data['user'] = $this->db->get_where('tabel_user', ['username' => 
    //     $this->session->userdata('username')])->row_array();
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar');
    //     $this->load->view('user/absensi', $data);
    //     $this->load->view('templates/footer');
	// }
}
