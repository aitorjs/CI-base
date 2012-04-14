<?php

/* TODO El id = null y si existe ese id en edit y delete meterlo en una funcion local ( _local) 
poniendo un nombre que leyendolo se sepa que hace idNotNullAndExist()?  */
class Groups_model extends MY_Model {
    function __construct()
    {
       // session_start();
        parent::__construct();
        $this->table_name = 'groups';
        $this->primary_key = 'id';
        $this->order_by = 'id DESC';
    }
    
    public function get_pagination($num, $offset) {
        $query = $this->db->get($this->table_name, $num, $offset);  
        return $query->result();
    }

    public function verify_user($email, $pasahitza)
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

    // TODO: Meter el where de active
     public function get_groups()
    {
        $this->db->select('id, name');
        $query = $this->db->get('groups');
        $query = $query->result();
        foreach ($query as $name) {
            $groups[$name->id] = $name->name;
        }
        return $groups;
    }

    public function count_all()
    {
        return $this->db->count_all($this->table_name);
    }

    public function get_all_groups()
    {
        $this->db->select('id, name, active');
        $this->db->where('active', 1);
        $this->db->where('name !=', 'admin');

        $query = $this->db->get('groups');
        $query = $query->result();
        return $query;
    }

    //TODO: Meterlo en permiso
     public function get_all_permissions()
    {
        $this->db->select('id, name, active');
        $this->db->where('active', 1);
     
        $query = $this->db->get('permissions');
        $query = $query->result();
        return $query;
    }

    public function permissions_by_group()
    {
        
        $this->db->join('groups_permissions', 'groups.id = groups_permissions.group_id');
        $this->db->join('permissions', 'permissions.id = groups_permissions.permission_id');
        //$this->db->order_by('groups_permissions.group_id', 'DESC');
        foreach ($this->db->get('groups')->result_array() as $permissions_by_group)
        {
            $p_by_g[$permissions_by_group['group_id'].'.'.$permissions_by_group['permission_id']] = 
                    $permissions_by_group['group_id'].'.'.$permissions_by_group['permission_id'];
        }
          // echo "HOLA";var_dump($p_by_g);
       // return $this->db->get('groups')->result_array();
        //var_dump($p_by_g); exit();
        return $p_by_g;
    }

    //TODO: Meterlo en groups_permissions
    public function get_permissions_by_group($group_id, $permission_id)
    {
        
        $this->db->where('group_id', $group_id);
        $this->db->where('permission_id', $permission_id);

        $this->db->limit(1);
        $group_permission = $this->db->get('groups_permissions');
        if ($group_permission->num_rows() > 0)
        {
            return TRUE;  
        }
        return FALSE;
    }

    //TODO: Meterlo en groups_permissions
    public function add_permission_by_group($group_id, $permission_id)
    {
        $data = array(
        'group_id' => $group_id,
        'permission_id' => $permission_id
        );
        $this->db->insert('groups_permissions', $data);
    }

    //TODO: Meterlo en groups_permissions
    public function delete_permissions_by_group()
    {
        $this->db->empty_table('groups_permissions');
    }
}