<?php

class Entry extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->library('grocery_CRUD');
        $this->load->helper('url');
        if (!$this->session->userdata('admin_logged_in')) {
            if (!$this->session->userdata('manager_logged_in')) {
                $url_login = site_url('login');
                redirect($url_login, 'refresh');
            }
        }
    }

    public function index() {
        $output['css_files'] = array();
        $output['js_files'] = array();
        $output['output'] = "";
        $this->load->view('manager/entry_view', $output);
    }

//    public function supplier_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('supplier');
//        $crud->set_subject('Supplier');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function customer_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('customer');
//        $crud->set_subject('Customer');
//        $crud->set_field_upload('image', 'upload/customer');
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function staff_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('staff');
//        $crud->set_subject('Staff');
//        $crud->set_field_upload('image', 'upload/staff');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function shop_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('shop');
//        $crud->set_subject('Shop');
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function extra_item_group_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('extra_item_group');
//        $crud->set_subject('Extra Item Group');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function instruction_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('instruction');
//        $crud->set_subject('Instruction');
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function item_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('item');
//        $crud->set_subject('Item');
//        $crud->display_as('item_group_id', 'Item group')
//                ->display_as('extra_item_group_id', 'Extra item group');
//        $crud->set_relation('item_group_id', 'item_group', 'description');
//        $crud->set_relation('extra_item_group_id', 'extra_item_group', 'name');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function item_group_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('item_group');
//        $crud->set_subject('Item Group');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function branch_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('branch');
//        $crud->set_subject('Branch');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function job_title_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('job_title');
//        $crud->set_subject('Job Title');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function measurement_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('measurement');
//        $crud->set_subject('Measurement');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function payment_method_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('payment_method');
//        $crud->set_subject('Payment Method');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function promotional_discount_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('promotional_discount');
//        $crud->set_subject('Promotional Discount');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function scrolling_message_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('scrolling_message');
//        $crud->set_subject('Scrolling Message');
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function special_discount_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('special_discount');
//        $crud->set_subject('special_discount');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function tax_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('tax');
//        $crud->set_subject('Tax');
//        $crud->field_type('status', 'dropdown', array('active' => 'Active', 'inactive' => 'Inactive'));
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function cash_register_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('cash_register');
//        $crud->set_subject('Cash Register')
//                ->required_fields('cash_register_name');
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }
//
//    public function invoice_message_entry() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('invoice_message')
//                ->columns('message')
//                ->fields('message');
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/entry_view', $output);
//    }

}
