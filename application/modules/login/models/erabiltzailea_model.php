<?php

/* TODO El id = null y si existe ese id en edit y delete meterlo en una funcion local ( _local) 
poniendo un nombre que leyendolo se sepa que hace idNotNullAndExist()?  */
class Erabiltzailea_model extends MY_Model {
    function __construct()
    {
       // session_start();
        parent::__construct();
        $this->table_name = 'erabiltzaileak';
        $this->primary_key = 'id';
        $this->order_by = 'id DESC';
    }
    
    function get_pagination($num, $offset) {
        $query = $this->db->get($this->table_name, $num, $offset);  
        return $query->result();
    }

    function verify_user($email, $pasahitza)
    {
        $this->db->where('email', $email);
        $this->db->where('pasahitza', md5($pasahitza));
        $this->db->limit(1);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0)
        {   
            return $query->row();
        }
        $this->session->set_flashdata('message_error', 'Correo electrónico o contraseña incorrectas.');
        return false;
    }

     function get_groups()
    {
        $this->db->select('id, name');
        $query = $this->db->get('groups');
        $query = $query->result();
        foreach ($query as $name) {
            $groups[$name->id] = $name->name;
        }
        return $groups;
    }

    function count_all_erabiltzaileak()
    {
        return $this->db->count_all($this->table_name);
    }
}