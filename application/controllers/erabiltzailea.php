<?php 
class Erabiltzailea extends CI_Controller {

	 function __construct()
    {
        parent::__construct();
        $this->load->model('erabiltzailea_model'); 
    }


    function index()
    {
        $data['title'] = 'Erabiltzaileak';
        $data['heading'] = 'Erabiltzaileak';

        $data['data'] = $this->erabiltzailea_model->get_last_ten_entries();
        $this->load->view('erabiltzailea/index', $data);
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
          $this->load->view('erabiltzailea/add', $data);
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
          $this->load->view('erabiltzailea/edit', $data);
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
      $this->load->view('erabiltzailea/login');
   }

   public function logout()
   {
      session_destroy();
      redirect('erabiltzailea/login');
   }
}