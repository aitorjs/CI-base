<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bloga extends CI_Controller {
   function __construct()
    {
        session_start();
        parent::__construct();

      /*  if (!isset($_SESSION['user'])) {
         redirect('login');
        }*/
        $this->load->model('bloga_model'); 
        $this->load->helper('xml');
    }


  /*  function index()
    {
        $data['title'] = 'Bloga';
        $data['heading'] = 'Bloga';

        $data['data'] = $this->bloga_model->get_blogak();
        $this->load->view('bloga/index', $data);
    }*/

    /* TODO: Si mete un id que no existe que redireccione a index */
    function by_erabiltzailea($id = null)
    {
        $data['title'] = 'Blogak by erabiltzailea';
        $data['heading'] = 'Blogak by erabiltzailea';

        $data['data'] = $this->bloga_model->get_blogak_by_erabiltzaile($id);
        $data['subview'] = 'bloga/bloga/by_erabiltzailea';
      //  $this->load->view('bloga/bloga/by_erabiltzailea', $data);
        $this->template
        ->set_theme('prueba') // application/themes/prueba
        ->set_layout('layout') // application/themes/prueba/views/layouts/layout.php
        ->build('bloga/bloga/by_erabiltzailea', $data); // application/modules/login/views/login.php
    }

    public function feed() {
      $data['encoding'] = 'utf-8';
        $data['feed_name'] = 'DerekAllard.com';
        $data['feed_url'] = 'http://www.derekallard.com';
        $data['page_description'] = 'Code Igniter, PHP, and the World of Web Design';
        $data['page_language'] = 'en-ca';
        $data['creator_email'] = 'Derek Allard is at derek at derekallard dot com';
        $data['blogak'] = $this->bloga_model->get_blogak(10);
        header("Content-Type: application/rss+xml");
        $this->load->view('feed/rss', $data);
    }

    public function view($id=null)
    {
       if ($id == null) {
          redirect('/');
       }
       if ($this->bloga_model->get($id) == false) {
          redirect('/');
       }
       $data['title'] = 'Bloga';
       $data['heading'] = 'Bloga';

       $data['bloga'] = $this->bloga_model->get($id);

       $this->load->model('login/erabiltzailea_model'); 
       $data['erabiltzailea'] = $this->erabiltzailea_model->get($data['bloga']['erabiltzailea_id']);

       $data['subview'] = 'bloga/bloga/view';
       $this->load->view('layouts/layout', $data);
    }
   
      function index()
    {
        if ($this->uri->segment(3) > $this->bloga_model->count_all_blogak()) {
          redirect('bloga');
        }
        $this->load->library('pagination');
        $config['base_url'] = base_url().'bloga/index';
        $config['total_rows'] = $this->bloga_model->count_all_blogak();
       // $config['total_rows'] = '20';
        $config['per_page'] = '5';
        $config['first_link'] = 'Hasiera';
        $config['last_link'] = 'Azkena';

        //$config['uri_segment'] = 2;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['title'] = 'Erabiltzaileak';
        $data['heading'] = 'Erabiltzaileak';

        $data['data'] = $this->bloga_model->get_pagination($config['per_page'],$this->uri->segment(3));
       // var_dump($data['data']);
        // $data['results'] = $this->books_model->get_books($config['per_page'],$this->uri->segment(3));

        $data['subview'] = 'bloga/bloga/index';
        $this->load->view('layouts/layout', $data);
        //$this->load->view('erabiltzailea/index', $data);
    }

     /**
     * Add a new record to the posts table
     * 
     * @return void
     * @author Joost van Veen
     */
    public function add() {
        //$this->load->config('base', TRUE);
        //$email = $this->config->config['base']['email'];
        //$email;
        $data['title'] = 'Add Bloga';
        $data['heading'] = 'Add Bloga';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('erabiltzailea_id', 'ID Erabiltzailea', 'required');
        $this->form_validation->set_rules('izenburua', 'Izenburua', 'required|min_length[4]');
        $this->form_validation->set_rules('edukia', 'Edukia', 'required|trim');
       // $this->form_validation->set_rules('pasahitza', 'Password', 'required|trim|min_length[8]');

        if ($this->form_validation->run() !== false) {
          $this->created = new DateTime;
          $data = array(
              'erabiltzailea_id' => $this->input->post('erabiltzailea_id'),
              'izenburua' => $this->input->post('izenburua'),
              'edukia' => $this->input->post('edukia'),
              'created' => $this->created->format('Y-m-d H:i:s'));
          $id = $this->bloga_model->save($data);
          if ($id) {
            $this->session->set_flashdata('message_ok', $this->input->post('izenburua').' blog notizi berria sortu duzu.');
            redirect('bloga');
          } else {
             $this->session->set_flashdata('message_error', 'Arazoa bloga berria sortzerakoan.');
            redirect('bloga');
          }
        } else {
          $this->load->model('login/erabiltzailea_model'); 
      //    $data['erabiltzailea'] = $this->erabiltzailea_model->get($data['bloga']['erabiltzailea_id']);

          $data['erabiltzaileak'] = $this->erabiltzailea_model->get_erabiltzaileak();
          $data['subview'] = 'bloga/bloga/add';
          $this->load->view('layouts/admin', $data);
         // $this->load->view('erabiltzailea/add', $data);
        }
       
    }
    
    /**
     * Update a record in the posts table
     * 
     * @return void
     * @author Joost van Veen
     */
    public function update($id = null) {

        if ($id == null) {
          redirect('bloga/');
        }
        if ($this->bloga_model->get($id) == false) {
          redirect('bloga/');
        }
        $this->load->module('login');
        $this->login->accessAndPermissions();
        $data['title'] = 'Update Erabiltzailea';
        $data['heading'] = 'Update Erabiltzailea';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('izena', 'Name', 'required|min_length[4]');
        $this->form_validation->set_rules('email', 'Email Address', 'valid_email|required');
        $this->form_validation->set_rules('pasahitza', 'Password', 'min_length[8]');

        if ($this->form_validation->run() !== false) {
           $this->updated = new DateTime;
           $data = array(
            'group_id' => $this->input->post('group_id'),
            'izena' => $this->input->post('izena'),
            'email' => $this->input->post('email'),
            'updated' => $this->updated->format('Y-m-d H:i:s'));

          if ($this->input->post('pasahitza') != null) {
            $data = array('pasahitza' => md5($this->input->post('pasahitza')));
          }
          $id = $this->bloga_model->save($data, $id);
          if ($id) {
            $this->session->set_flashdata('message_ok', $this->input->post('izena').' erabiltzaile eguneratu duzu.');
            redirect('bloga');
          } else {
             $this->session->set_flashdata('message_error', 'Arazoa erabiltzailea eguneratzerakoan.');
            redirect('bloga');
          }
        } else {
          $data['erabiltzailea'] = $this->bloga_model->get($id);
         // var_dump($data['erabiltzailea']);
          $data['groups'] = $this->bloga_model->get_groups();
          // $this->load->view('erabiltzailea/edit', $data);
          $data['subview'] = 'bloga/update';
          $this->load->view('layouts/layout', $data);
        }
    }

    /**
     * Delete posts
     * @return void
     * @author Joost van Veen
     */
    public function delete($id = null) {
        // $this->posts->delete(1); // Delete post #1
        // $this->posts->delete(array(2,3)); // Delete posts #2 and #3
      if ($id == null) {
        redirect('bloga/');
      }
      if ($this->bloga_model->get($id) == false) {
          redirect('bloga/');
      }
        
      //$data['data'] = $this->bloga_model->delete_erabiltzailea($id);
      $this->bloga_model->delete($id);
      $this->session->set_flashdata('message_ok', $this->input->post('izena').' erabiltzailea ezabatu duzu.');
      redirect('bloga/');
    }
}