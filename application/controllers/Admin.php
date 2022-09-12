<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absensi_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tabel_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function rekapAbsen()
    {
        $data["absensi"] = $this->absensi_model->tampilData();
        $data['title'] = 'Data Absensi';
        $data['user'] = $this->db->get_where('tabel_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/absensi', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($kode_absen = null)
    {

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        if (!isset($kode_absen)) show_404();

        if ($this->absensi_model->hapus($kode_absen)) {
            $this->session->set_flashdata('success', 'Dihapus');
            redirect('admin/rekapAbsen');
        }
    }
}
