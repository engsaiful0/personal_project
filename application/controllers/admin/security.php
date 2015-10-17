<?php

class Security extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        if (!$this->session->userdata('admin_logged_in')) {
            $url_login = site_url('login');
            redirect($url_login, 'refresh');
        }
    }

    public function index() {
        
    }

    public function user_setup() {
        $crud = new Grocery_CRUD();
        $crud->set_table('user')->set_subject('User');
        $crud->display_as('user_name', 'User Name')
             ->display_as('user_level', 'User Level')   
             ->display_as('cash_register_id', 'Cash Register Name');
        $crud->set_relation('cash_register_id', 'cash_register', 'cash_register_name');
        $crud->field_type('user_level', 'dropdown', array('admin'=>'Admin', 'manager'=>'Manager','user'=>'User'));
        $crud->field_type('status', 'dropdown', array('active' => 'Active','inactive' => 'Inactive'));
        $crud->required_fields('user_name','password','user_level','cash_register_id','status');
        $output = $crud->render();
        $this->load->view('admin/security_view', $output);
    }

}