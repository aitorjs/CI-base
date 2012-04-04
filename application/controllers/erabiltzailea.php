<?php 
class Erabiltzailea extends CI_Controller {

    public $data = array('subview' => 'Oops, forgot to set a subview');

	 function __construct()
    {
        parent::__construct();
        $this->load->model('erabiltzailea_model');
        $this->load->helper('url');
    }


    function index()
    {
        if ($this->uri->segment(3) > $this->erabiltzailea_model->count_all_erabiltzaileak()) {
          redirect('erabiltzailea/');
        }
        $this->load->library('pagination');
        $config['base_url'] = base_url().'erabiltzailea/index';
        $config['total_rows'] = $this->erabiltzailea_model->count_all_erabiltzaileak();
       // $config['total_rows'] = '20';
        $config['per_page'] = '5';
        $config['first_link'] = 'Hasiera';
        $config['last_link'] = 'Azkena';

        //$config['uri_segment'] = 2;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['title'] = 'Erabiltzaileak';
        $data['heading'] = 'Erabiltzaileak';

        $data['data'] = $this->erabiltzailea_model->get_erabiltzaileak($config['per_page'],$this->uri->segment(3));
       // var_dump($data['data']);
        // $data['results'] = $this->books_model->get_books($config['per_page'],$this->uri->segment(3));

        $data['subview'] = 'erabiltzailea/index';
        $this->load->view('layouts/layout', $data);
        //$this->load->view('erabiltzailea/index', $data);
    }

     function add()
    {
        $data['title'] = 'Add Erabiltzailea';
        $data['heading'] = 'Add Erabiltzailea';

        $this->load->library('form_validation');
         $this->form_validation->set_rules('izena', 'Name', 'required|min_length[4]');
        $this->form_validation->set_rules('email', 'Email Address', 'valid_email|required');
        $this->form_validation->set_rules('pasahitza', 'Password', 'required|min_length[8]');

        if ($this->form_validation->run() !== false) {
          $data['data'] = $this->erabiltzailea_model->add_erabiltzailea();
          $this->session->set_flashdata('message_ok', $this->input->post('izena').' erabiltzaile berria sortu duzu.');
          redirect('erabiltzailea');
        } else {
          $data['motak'] = $this->erabiltzailea_model->get_motak();
          $data['subview'] = 'erabiltzailea/add';
          $this->load->view('layouts/layout', $data);
         // $this->load->view('erabiltzailea/add', $data);
        }
    }

    function edit($id = null)
    {
        if ($id == null) {
          redirect('erabiltzailea/');
        }
        if ($this->erabiltzailea_model->get_erabiltzailea($id) == false) {
          redirect('erabiltzailea/');
        }
        /* TOOO: Añadir logotipo */
        $data['title'] = 'Edit Erabiltzailea';
        $data['heading'] = 'Edit Erabiltzailea';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('izena', 'Name', 'required|min_length[4]');
        $this->form_validation->set_rules('email', 'Email Address', 'valid_email|required');
        $this->form_validation->set_rules('pasahitza', 'Password', 'min_length[8]');
        if ($this->form_validation->run() !== false) {
          $data['data'] = $this->erabiltzailea_model->edit_erabiltzailea($id);
          $this->session->set_flashdata('message_ok', $this->input->post('izena').' erabiltzailea eguneratu duzu.');
          redirect('erabiltzailea/');
        } else {
          $data['erabiltzailea'] = $this->erabiltzailea_model->get_erabiltzailea($id);
          $data['motak'] = $this->erabiltzailea_model->get_motak();
          // $this->load->view('erabiltzailea/edit', $data);
          $data['subview'] = 'erabiltzailea/edit';
          $this->load->view('layouts/layout', $data);
        }
    }

    function delete($id = null) {
      if ($id == null) {
        redirect('erabiltzailea/');
      }
      if ($this->erabiltzailea_model->get_erabiltzailea($id) == false) {
          redirect('erabiltzailea/');
        }
      $data['data'] = $this->erabiltzailea_model->delete_erabiltzailea($id);
      $this->session->set_flashdata('message_ok', $this->input->post('izena').' erabiltzailea ezabatu duzu.');
      redirect('erabiltzailea/');
    }

    public function login()
   {
      if (isset($_SESSION['username'])) {
         redirect('bloga');
      }
      $data['title'] = 'Erabiltzaileak';
      $data['heading'] = 'Erabiltzaileak';

      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email Address', 'valid_email|required');
      $this->form_validation->set_rules('pasahitza', 'Password', 'required|min_length[4]');

      if ($this->form_validation->run() !== false) {
          $res = $this
                  ->erabiltzailea_model
                  ->verify_user(
                     $this->input->post('email'), 
                     $this->input->post('pasahitza')
                  );

         if ( $res !== false ) {
            $_SESSION['username'] = $this->input->post('email');
            redirect('bloga', $data);
         }
      }
      //$this->load->view('erabiltzailea/login');
      $data['subview'] = 'erabiltzailea/login';
      $this->load->view('layouts/layout', $data);
   }

   public function logout()
   {
      session_destroy();
      redirect('erabiltzailea/login');
   }
}