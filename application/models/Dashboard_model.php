<?php

class Dashboard_model extends CI_Model {
        private $_tableUser = "tabel_user";
        private $_tablePendapatan = "tabel_pendapatan";

        public function jumlahSemuaData(){
            $this->db->select('*');
            $this->db->from($this->_tableUser);
           
            return $this->db->count_all_results();

        }

        public function totalPendapatan() {
            // $query = $this->db->query('SELECT sum(nominal) FROM (SELECT nominal FROM tabel_pendapatan ORDER BY tanggal ASC) AS subquery');

            // return $query;

            $this->db->select_sum('nominal');
            $result = $this->db->get('tabel_pendapatan')->row();  
            return $result->nominal;
            
        }


}