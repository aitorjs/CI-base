<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	 public $data = array('subview' => 'Oops, forgot to set a subview');

	 function __construct()
    {
        session_start();
        parent::__construct();
        $this->load->model('login_model');
        //$this->load->helper('url');
    }

    public function index() {
      //$this->load->view('login/login');
     /* if (isset($_SESSION['username'])) {
         redirect('bloga');
      }*/
       //$this->accessAndPermissions(); 
      $data['title'] = 'Erabiltzaileak';
      $data['heading'] = 'Erabiltzaileak';

      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
      $this->form_validation->set_rules('pasahitza', 'Password', 'required|trim|min_length[4]');

      if ($this->form_validation->run() !== false) {
          $res = $this
                  ->login_model
                  ->verify_user(
                     $this->input->post('email'), 
                     $this->input->post('pasahitza')
                  );

        if ( $res !== false ) {
             $permissions = $this->login_model->get_permissions($res->group_id);
             $perms = array();
             foreach ($permissions as $permission) {
               $perms[$permission['id']] = $permission['url'];
             }
            $_SESSION['permissions'] = $perms;
            $_SESSION['user'] = $res;
            //var_dump($_SESSION); exit();
           // $_SESSION['username'] = $this->input->post('email');
            redirect('bloga', $data);
         }
      }
      //$this->load->view('erabiltzailea/login');
      $data['subview'] = 'login/login';
      //$this->load->view('layouts/layout', $data);

      // lo mismo que load->view
      //$this->template->build('erabiltzailea/login', $data);

      $this->template
        ->set_theme('prueba') // application/themes/prueba
        ->set_layout('layout') // application/themes/prueba/views/layouts/layout.php
        ->build('login/login', $data); // application/modules/login/views/login.php
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }

    public function accessAndPermissions() {
        if (!isset($_SESSION['user'])) {
          $this->session->set_flashdata('message_error', 'Logeatu zaitez!.');
          redirect('login/login');
        }
        if (!in_array($this->uri->segment(1).'/'.$this->uri->segment(2), $_SESSION['permissions'])) {
          //echo "aaaaaaaa"; exit();
          $this->session->set_flashdata('message_error', 'Ez duzu baimenik hor sartzeko.');
          redirect('login/erabiltzailea');
        }
   }
}