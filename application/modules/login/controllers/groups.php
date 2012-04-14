<?php 
class Groups extends CI_Controller {

    public $data = array('subview' => 'Oops, forgot to set a subview');

	 function __construct()
   {
        parent::__construct();
        $this->load->model('groups_model');
        $this->load->helper('url');
   }

    function index()
    {
        if ($this->uri->segment(3) > $this->groups_model->count_all()) {
          redirect('login/groups/');
        }
        //$this->load->module('login');
        //$this->login->accessAndPermissions();

        $this->load->library('pagination');
        $config['base_url'] = base_url().'groups/index';
        $config['total_rows'] = $this->groups_model->count_all();
       // $config['total_rows'] = '20';
        $config['per_page'] = '5';
        $config['first_link'] = 'Hasiera';
        $config['last_link'] = 'Azkena';

        //$config['uri_segment'] = 2;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['title'] = 'Groups';
        $data['heading'] = 'Groups';

        $data['data'] = $this->groups_model->get_pagination($config['per_page'],$this->uri->segment(3));
       // var_dump($data['data']);
        // $data['results'] = $this->books_model->get_books($config['per_page'],$this->uri->segment(3));

        $data['subview'] = 'login/groups/index';
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
        $this->load->module('login');
        $this->login->accessAndPermissions();

        $data['title'] = 'Add Groups';
        $data['heading'] = 'Add Groups';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[4]');
     
        if ($this->form_validation->run() !== false) {
          $this->created = new DateTime;
          $data = array(
              'name' => $this->input->post('name'),
              'active' => $this->input->post('active'),
              'created' => $this->created->format('Y-m-d H:i:s'));
          $id = $this->groups_model->save($data);
          if ($id) {
            $this->session->set_flashdata('message_ok', $this->input->post('name').' groups berria sortu duzu.');
            redirect('login/groups');
          } else {
             $this->session->set_flashdata('message_error', 'Arazoa groups berria sortzerakoan.');
            redirect('login/groups');
          }
        } else {
          $data['groups'] = $this->groups_model->get_groups();
          $data['subview'] = 'login/groups/add';
          $this->load->view('layouts/layout', $data);
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
          redirect('groups/erabiltzailea/');
        }
        if ($this->groups_model->get($id) == false) {
          redirect('groups/erabiltzailea/');
        }
        //$this->load->module('login');
        //$this->login->accessAndPermissions();
        $data['title'] = 'Update groups';
        $data['heading'] = 'Update groups';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[4]');

        if ($this->form_validation->run() !== false) {
           $this->updated = new DateTime;
           if ($this->input->post('active') !== false)  $active = 1;
           else $active = 0;
           $data = array(
             'name' => $this->input->post('name'),
              'active' => $active,
              'updated' => $this->updated->format('Y-m-d H:i:s'));
          $id = $this->groups_model->save($data, $id);
          if ($id) {
            $this->session->set_flashdata('message_ok', $this->input->post('name').' groups eguneratu duzu.');
            redirect('login/groups');
          } else {
             $this->session->set_flashdata('message_error', 'Arazoa groups eguneratzerakoan.');
            redirect('login/groups');
          }
        } else {
          $data['group'] = $this->groups_model->get($id);
         // var_dump($data['erabiltzailea']);
         // $data['groups'] = $this->groups_model->get_groups();
          // $this->load->view('erabiltzailea/edit', $data);
          $data['subview'] = 'login/groups/update';
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
        redirect('login/groups/');
      }
      if ($this->groups_model->get($id) == false) {
          redirect('login/groups/');
      }
      //$this->load->module('login');
      //$this->login->accessAndPermissions();
      //$data['data'] = $this->erabiltzailea_model->delete_erabiltzailea($id);
      $this->groups_model->delete($id);
      $this->session->set_flashdata('message_ok', $this->input->post('name').' groups ezabatu duzu.');
      redirect('login/groups/');
    }

    public function all()
    {
        //$this->load->module('login');
        //$this->login->accessAndPermissions();
        $data['title'] =  'Permissions by groups';
        $data['heading'] = 'Permissions by groups';

        //$this->load->library('form_validation');
        //$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]');
        $submit = $this->input->post('submit');
          if ($submit) {
             $this->groups_model->delete_permissions_by_group();
             foreach ($this->input->post() as $data)
             {
              $datar = explode('.', $data);
              if ($datar[0] != 'Login') {
                  $this->groups_model->add_permission_by_group($datar[0], $datar[1]);
                  $y = 'saved';
              }
             }
            // exit();
             if (isset($y)) {
                $this->session->set_flashdata('message_ok', 'Eguneratu duzu.');
             redirect('login/groups/all');
             }
             redirect('login/groups/all');
        } else {
          $data['groups'] = $this->groups_model->get_all_groups();
          $data['permissions'] = $this->groups_model->get_all_permissions();
          $data['permissions_by_group'] = $this->groups_model->permissions_by_group();
          $data['subview'] = 'login/groups/all';
          $this->load->view('layouts/layout', $data);
        }
    }
}