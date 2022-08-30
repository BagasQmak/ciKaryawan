<?php

class Menu_model extends CI_Model {
        private $_table = "user_menu";
    
        public $id;
        public $menu;


        public function tampilData()
        {
            $this->db->from($this->_table);
            $query = $this->db->get();
            return $query->result();
        }

        public function tampilDataSubMenu()
        {   
           
           $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                    ";
            return $this->db->query($query)->result();
        }


        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["id" => $id])->row();
        }

         public function simpan()
        {
            $post = $this->input->post();
            $this->id = $post["id"];
            $this->menu = $post["menu"];
            return $this->db->insert($this->_table, $this);
            
        }

        public function update()
        {
            $post = $this->input->post();
            $this->id = $post["id"];
            $this->menu = $post["menu"];
            
            return $this->db->update($this->_table, $this, array('id' => $post['id']));
        }
    
        public function hapus($id)
        {
            return $this->db->delete($this->_table, array("id" => $id));
        }
}