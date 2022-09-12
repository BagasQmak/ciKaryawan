<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller 
{ 

    public function __construct()
    {
        parent::__construct();
        $bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $this->get_today_date = $hari[(int)date("w")] . ', ' . date("j ") . $bulan[(int)date('m')] . date(" Y");
        
        $this->load->model('front_model');
        // $this->load->model('M_Settings');
        
        $this->get_datasess = $this->db->get_where('tabel_user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->appsetting = $this->db->get_where('db_setting', ['status_setting' => 1])->row_array();
        $timezone_all = $this->appsetting;
        date_default_timezone_set($timezone_all['timezone']);
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            exit('Opss you cannot access this [Hacking Attemp].');
        }
    }

    public function absenajax()
    {
        $clocknow = date("H:i:s");
        $today = $this->get_today_date;
        $appsettings = $this->appsetting;
        $is_pulang = $this->db->get_where('db_absensi', ['tgl_absen' => $today, 'nipeg' => $this->get_datasess['nipeg']])->row_array();
        if (strtotime($clocknow) <= strtotime($appsettings['absen_mulai'])) {
            $reponse = [
                'csrfName' => $this->security->get_csrf_token_name(),
                'csrfHash' => $this->security->get_csrf_hash(),
                'success' => false,
                'msgabsen' => '<div class="alert alert-danger text-center" role="alert">Belum Waktunya Absen Datang</div>'
            ];
        } elseif (strtotime($clocknow) >= strtotime($appsettings['absen_mulai_to']) && strtotime($clocknow) <= strtotime($appsettings['absen_pulang']) && $this->db->get_where('db_absensi', ['tgl_absen' => $today, 'nipeg' => $this->get_datasess['nipeg']])->row_array()) {
            $reponse = [
                'csrfName' => $this->security->get_csrf_token_name(),
                'csrfHash' => $this->security->get_csrf_hash(),
                'success' => false,
                'msgabsen' => '<div class="alert alert-danger text-center" role="alert">Belum Waktunya Absen Pulang</div>'
            ];
        } elseif (strtotime($clocknow) >= strtotime($appsettings['absen_mulai_to']) && strtotime($clocknow) >= strtotime($appsettings['absen_pulang']) && !empty($is_pulang['jam_pulang'])) {
            $reponse = [
                'csrfName' => $this->security->get_csrf_token_name(),
                'csrfHash' => $this->security->get_csrf_hash(),
                'success' => false,
                'msgabsen' => '<div class="alert alert-danger text-center" role="alert">Anda Sudah Absen Pulang</div>'
            ];
        } else {
            $this->front_model->do_absen();
            $reponse = [
                'csrfName' => $this->security->get_csrf_token_name(),
                'csrfHash' => $this->security->get_csrf_hash(),
                'success' => true
            ];
        }
        echo json_encode($reponse);
    }
