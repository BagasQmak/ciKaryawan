<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->get_datasess = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
		$this->load->model('front_model');
		$this->get_datasetupapp = $this->front_model->fetchsetupapp();
		$timezone_all = $this->get_datasetupapp;
		date_default_timezone_set($timezone_all['timezone']);
	}


	public function index()
	{
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
		$data = [
			'title' => "Menu Absensi",
			'user' => $this->get_datasess,
			'dataapp' => $this->get_datasetupapp,
			'dbabsensi' => $this->front_model->fetchdbabsen($this->get_datasess['id']),
			'greeting' => $greet
		];
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/absensi', $data);
        $this->load->view('templates/footer');
	}
}
