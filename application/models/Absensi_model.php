<?php

class Absensi_model extends CI_Model
{
    private $_table = "db_absensi";

    public $kode_absen;
    public $nipeg;
    public $nama;
    public $shift;
    public $tgl_absen;
    public $jam_masuk;
    public $jam_pulang;
    public $status_pegawai;
    public $keterangan_absen;
    public $maps_absen;

    public function __construct()
    {
        parent::__construct();
        $bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        // $this->get_today_date = $hari[(int)date("w")] . ', ' . date("j ") . $bulan[(int)date('m')] . date(" Y");
        $this->appsetting = $this->db->get_where('db_setting', ['status_setting' => 1])->row_array();
    }

    public function do_absen()
    {
        $bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $today = $hari[(int)date("w")] . ', ' . date("j ") . $bulan[(int)date('m')] . date(" Y");

        // $today = $this->get_today_date;
        $clocknow = date("H:i:s");
        $appsetting = $this->appsetting;

        $post = $this->input->post();
        $this->kode_absen = 'absen_' . date('Ym') . mt_rand(11111, 99999);
        $this->nipeg = $post["nipeg"];
        $this->nama = $post["nama"];
        $this->shift = $post["shift"];
        $this->jam_masuk = $clocknow;
        $this->jam_pulang = "00:00:00";
        $this->tgl_absen =  $today;
        if ($this->jam_masuk == null) {
            $this->status_pegawai = 0;
        } elseif ($this->jam_masuk <= $appsetting['absen_mulai_to']) {
            $this->status_pegawai = 1;
        } elseif ($this->jam_masuk >= $appsetting['absen_mulai_to']) {
            $this->status_pegawai = 2;
        }
        $this->keterangan_absen = htmlspecialchars($post["keterangan_absen"], true);
        $this->maps_absen = $post["map"];
        return $this->db->insert($this->_table, $this, array('nipeg' => $post['nipeg']));
    }

    public function tampilData()
    {
        $this->db->from($this->_table);
        $this->db->order_by('id_absen', "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($nipeg)
    {
        return $this->db->get_where($this->_table, ["nipeg" => $nipeg])->row();
    }

    public function hapus($kode_absen)
    {
        return $this->db->delete($this->_table, array("kode_absen" => $kode_absen));
    }
}
