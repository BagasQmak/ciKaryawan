<?php

class Pendapatan_model extends CI_Model {
    private $_table = "tabel_pendapatan";

    public $no;
    public $nominal;
    public $keterangan;
    public $tanggal;

    public function tampilDataPendapatan(){
        $this->db->from($this->_table);
        $this->db->order_by('tanggal', "asc");
        $query = $this->db->get();
        return $query->result();

    }

    public function getById($no)
        {
            return $this->db->get_where($this->_table, ["no" => $no])->row();
        }

    public function simpan()
    {
        $post = $this->input->post();
        $this->no = $post["no"];
        $this->nominal = $post["nominal"];
        $this->keterangan = $post["keterangan"];
        $this->tanggal = $post["tanggal"];
        return $this->db->insert($this->_table, $this);
        
    }

     public function update()
        {
            $post = $this->input->post();
            $this->no = $post["no"];
            $this->nominal = $post["nominal"];
            $this->keterangan = $post["keterangan"];
            $this->tanggal = $post["tanggal"];
            return $this->db->update($this->_table, $this, array('no' => $post['no']));
        }

        public function hapus($no)
        {
            return $this->db->delete($this->_table, array("no" => $no));
        }

}