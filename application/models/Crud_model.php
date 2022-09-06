<?php

class Crud_model extends CI_Model {
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
        
        public function getById($nipeg)
        {
            return $this->db->get_where($this->_table, ["nipeg" => $nipeg])->row();
        }

        function make_user_id($id,$lenth=13){
            return str_pad(substr(sprintf("%u", crc32(sha1($id))),0,$lenth), $lenth, "0", STR_PAD_LEFT);
        }
    
        public function simpan()
        {
           
            $post = $this->input->post();
            $this->nipeg = random_string('numeric', 13);
            $this->nama = $post["nama"];
            $this->tanggallahir = $post["tanggallahir"];
            $this->jabatan = $post["jabatan"];
            $this->bagian = $post["bagian"];
            $this->divisi = $post["divisi"];
            $this->username = $post["username"];
            $this->password = password_hash($post["password1"], PASSWORD_DEFAULT);
            $this->image = ($post["image"])  ? $post["image"] : "default.jpg";
            $this->role_id = $post["role_id"];
            $this->is_active = 1;
            $this->date_created = time();
            
            return $this->db->insert($this->_table, $this);
            
        }
    
        public function update()
        {
            $post = $this->input->post();
            $this->nipeg = $post["nipeg"];
            $this->nama = $post["nama"];
            $this->jabatan = $post["jabatan"];
            $this->bagian = $post["bagian"];
            $this->divisi = $post["divisi"];
            $this->username = $post["username"];
            $this->password =$post["password"];
            $this->role_id = $post["role_id"];
            return $this->db->update($this->_table, $this, array('nipeg' => $post['nipeg']));
        }
    
        public function hapus($nipeg)
        {
            return $this->db->delete($this->_table, array("nipeg" => $nipeg));
        }
}