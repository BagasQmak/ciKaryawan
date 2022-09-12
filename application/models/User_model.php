<?php

class User_model extends CI_Model {
        private $_table = "tabel_user";

        public $nipeg;
        public $nama;
        public $tanggallahir;
        public $jabatan;
        public $bagian;
        public $divisi;
        public $username;
        public $password;
        public $role_id;

        public function tampilData()
        {
            $this->db->from($this->_table);
            $this->db->order_by('id', "desc");
            $query = $this->db->get();
            return $query->result();
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
            $this->username = $post["username"];
            $this->email = $post["email"];
            $this->image = ($post["image"])  ? $post["image"] : "default.jpg";
            $this->password = $post["password"];
            $this->role_id = $post["role_id"];
            return $this->db->update($this->_table, $this, array('nipeg' => $post['nipeg']));
        }
}