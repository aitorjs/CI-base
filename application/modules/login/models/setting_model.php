<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends MY_Model{
		
	function __construct(){
		parent::__construct();
	}

	public function getTheme()
	{
		$this->db->select('default_theme, admin_theme');
		$query = $this->db->get('settings');
        if ($query->num_rows() > 0)
        {   
            return $query->row();
        }
        $this->session->set_flashdata('message_error', 'No se ha creado la tabla de settings para el tema de los temas.');
        return false;
	}
}