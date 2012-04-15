<?php 
class Bloga_model extends MY_Model{
	 function __construct()
    {
        parent::__construct();
        $this->table_name = 'blogak';
        $this->primary_key = 'id';
        $this->order_by = 'id DESC';
    }
    
    function get_pagination($num, $offset) {
        $query = $this->db->get($this->table_name, $num, $offset);  
        return $query->result();
    }

    function get_blogak($limit = null)
    {
        if ($limit != null) {
             $this->db->limit($limit);
        }
        $this->db->order_by($this->order_by);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_blogak_by_erabiltzaile($erabiltzailea_id)
    {
        $this->db->join('blogak_etiketak', 'blogak_etiketak.bloga_id = blogak.id');
        $this->db->join('etiketak', 'blogak_etiketak.etiketa_id = etiketak.id');

        $this->db->where('blogak.erabiltzailea_id', $erabiltzailea_id);
     //   $this->db->where('blogak_etiketak.etiketa_id', 'etiketak.id');
        $query = $this->db->get('blogak');
       // var_dump($query); exit();
        return $query->result();
    }

    function count_all_blogak()
    {
        return $this->db->count_all($this->table_name);
    }
}