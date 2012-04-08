<?php 

class Login_model extends CI_Model{
		
	function __construct(){
		parent::__construct();
	}

	public function verify_user($email, $pasahitza)
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

    public function get_permissions($group_id) {

        $this->db->join('groups_permissions', 'groups.id = groups_permissions.group_id');
        $this->db->join('permissions', 'permissions.id = groups_permissions.permission_id');

        $this->db->where('groups.id', $group_id);
     //   $this->db->where('blogak_etiketak.etiketa_id', 'etiketak.id');
        return $this->db->get('groups')->result_array();
       // var_dump($query); exit();
        //  return $query->result();
    }

    /*public function get_groups()
    {
        $this->db->select('id, name');
        $query = $this->db->get('groups');
        $query = $query->result();
        foreach ($query as $name) {
            $groups[$name->id] = $name->name;
        }
        return $groups;
    }*/
}

?>