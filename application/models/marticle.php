<?php
class Marticle extends CI_Model {
    var $tabel = 'tb_article'; //variabel tabel
    function __construct() {
        parent::__construct();
    }
    function get_allarticle() {
        $this->db->from($this->tabel);
        $query = $this->db->get();
 
        //cek apakah ada article
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_article_by_id($id) {
        $this->db->from($this->tabel);
        $this->db->where('id_article', $id);
 
        $query = $this->db->get();
 
        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }
    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }
    function get_update($id,$data) {
        $this->db->where('id_article', $id);
        $this->db->update($this->tabel, $data);
        return TRUE;
    }
    function del_article($id) {
        $this->db->where('id_article', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
}
?>