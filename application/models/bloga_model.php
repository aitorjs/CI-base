<?php
class Bloga_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_blogak()
    {
        $query = $this->db->get('blogak');
       // var_dump($query); exit();
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

        /* SELECT *
FROM `blogak`
JOIN blogak_etiketak ON blogak_etiketak.bloga_id = blogak.id
JOIN etiketak ON blogak_etiketak.etiketa_id = etiketak.id
WHERE blogak.erabiltzailea_id =1 */
    }

   /* function insert_entry()
    {
        $this->title   = $this->input->post('title');
        $this->content = $this->input->post('content');
        $this->date    = time();

        $this->db->insert('erabiltzailea', $this);
    }

    function update_entry()
    {
         $this->title   = $this->input->post('title');
        $this->content = $this->input->post('content');
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }*/
}