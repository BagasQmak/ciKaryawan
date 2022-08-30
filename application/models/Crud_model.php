<?php

class Crud_model extends CI_Model {
        private $_table = "tabel_user";
    
        public $nipeg;
        public $nama;
        public $tanggallahir;
        public $jabatan;
        public $bagian;
        public $divisi;
    
    
        public function tampilData()
        {
            $this->db->from($this->_table);
            $this->db->order_by('nama', "desc");
            $query = $this->db->get();
            return $query->result();
        }
        
        public function getById($nipeg)
        {
            return $this->db->get_where($this->_table, ["nipeg" => $nipeg])->row();
        }
    
        public function simpan()
        {
            $post = $this->input->post();
            $this->nipeg = $post["nipeg"];
            $this->nama = $post["nama"];
            $this->tanggallahir = $post["tanggallahir"];
            $this->jabatan = $post["jabatan"];
            $this->bagian = $post["bagian"];
            $this->divisi = $post["divisi"];
            return $this->db->insert($this->_table, $this);
            
        }
    
        public function update()
        {
            $post = $this->input->post();
            $this->nipeg = $post["nipeg"];
            $this->nama = $post["nama"];
            $this->tanggallahir = $post["tanggallahir"];
            $this->jabatan = $post["jabatan"];
            $this->bagian = $post["bagian"];
            $this->divisi = $post["divisi"];
            return $this->db->update($this->_table, $this, array('nipeg' => $post['nipeg']));
        }
    
        public function hapus($nipeg)
        {
            return $this->db->delete($this->_table, array("nipeg" => $nipeg));
        }
}