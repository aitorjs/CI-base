<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->model('login_model');
		//$this->load->view('welcome_message');
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
                  ->login_model
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
      $data['subview'] = 'login';
      $this->load->view('layouts/layout', $data);
	}
}