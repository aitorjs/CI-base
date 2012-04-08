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
    
  function get_erabiltzaileak($num, $offset) {
        $query = $this->db->get('erabiltzaileak', $num, $offset);  
        return $query->result();
    }

    function verify_user($email, $pasahitza)
    {
        $this->db->where('email', $email);
        $this->db->where('pasahitza', md5($pasahitza));
        $this->db->limit(1);
        $query = $this->db->get('erabiltzaileak');
        if ($query->num_rows() > 0)
        {   
            return $query->row();
        }
        $this->session->set_flashdata('message_error', 'Correo electrónico o contraseña incorrectas.');
        return false;
    }

  /*  function add_erabiltzailea()
    {
     // mota_id ez bada definititzen erabiltzailea (2) bezala sortuko du.
        $this->mota_id = $this->input->post('motak_id');
        $this->izena = $this->input->post('izena');
        $this->email = $this->input->post('email');
        $this->pasahitza = md5($this->input->post('pasahitza'));
        $this->created = new DateTime;
        $this->created = $this->created->format('Y-m-d H:i:s');
        
        $this->db->insert('erabiltzaileak', $this);
    }*/

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

  /*  function get_erabiltzailea($id)
    {
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get('erabiltzaileak');
         if ($query->num_rows() > 0)
        {   
            return $query->row();
        }
        return false;

    }*/

    /*function edit_erabiltzailea($id)
    {
        $this->mota_id = $this->input->post('motak_id');
        $this->izena = $this->input->post('izena');
        $this->email = $this->input->post('email');
        if ($this->input->post('pasahitza') != null) {
            $this->pasahitza = md5($this->input->post('pasahitza'));
        }
        $this->updated = new DateTime;
        $this->updated = $this->updated->format('Y-m-d H:i:s');
        $this->db->update('erabiltzaileak', $this, array('id' => $id));
    }
  
    function delete_erabiltzailea($id)
    {
        $this->db->delete('erabiltzaileak', array('id' => $id));
    }*/

    function count_all_erabiltzaileak()
    {
        return $this->db->count_all('erabiltzaileak');
    }
}