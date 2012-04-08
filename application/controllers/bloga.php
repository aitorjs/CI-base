<?php 
class Bloga extends CI_Controller {

	 function __construct()
    {
        session_start();
        parent::__construct();

        if (!isset($_SESSION['user'])) {
         redirect('login');
        }
        $this->load->model('bloga_model'); 
    }


    function index()
    {
        $data['title'] = 'Bloga';
        $data['heading'] = 'Bloga';

        $data['data'] = $this->bloga_model->get_blogak();
        $this->load->view('bloga/index', $data);
    }

    /* TODO: Si mete un id que no existe que redireccione a index */
    function by_erabiltzailea($id = null)
    {
        $data['title'] = 'Blogak by erabiltzailea';
        $data['heading'] = 'Blogak by erabiltzailea';

        $data['data'] = $this->bloga_model->get_blogak_by_erabiltzaile($id);
        $this->load->view('bloga/by_erabiltzailea', $data);
    }
}