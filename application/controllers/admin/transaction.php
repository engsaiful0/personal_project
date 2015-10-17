<?php

class Transaction extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->library('grocery_CRUD');
        $this->load->helper('url');
        if (!$this->session->userdata('admin_logged_in')) {
            $url_login = site_url('login');
            redirect($url_login,'refresh');
        }
    }
    
    public function index() {
        
    }
    
    public function item_requisition_entry() {
        $crud = new Grocery_CRUD();
        $crud->set_table('item_requisition');
        $crud->set_subject('Item Requisition');
        $output = $crud->render();
        $this->load->view('admin/transaction_view', $output);
    }
    
    public function item_receiving_entry() {
        $crud = new Grocery_CRUD();
        $crud->set_table('item_receiving');
        $crud->set_subject('Item Receiving');
        $output = $crud->render();
        $this->load->view('admin/transaction_view', $output);
    }
    
    public function item_dispose_entry() {
        $crud = new Grocery_CRUD();
        $crud->set_table('item_dispose');
        $crud->set_subject('Item Dispose');
        $output = $crud->render();
        $this->load->view('admin/transaction_view', $output);
    }
    
    public function item_process_entry() {
        $crud = new Grocery_CRUD();
        $crud->set_table('item_process');
        $crud->set_subject('Item Process');
        $output = $crud->render();
        $this->load->view('admin/transaction_view', $output);
    }
    
    public function stock_reconciliation_entry() {
        $crud = new Grocery_CRUD();
        $crud->set_table('stock_reconciliation');
        $crud->set_subject('Stock Reconciliation');
        $output = $crud->render();
        $this->load->view('admin/transaction_view', $output);
    }
    
    public function cash_reconciliation_entry() {
        $crud = new Grocery_CRUD();
        $crud->set_table('cash_reconciliation');
        $crud->set_subject('Cash Reconciliation');
        $output = $crud->render();
        $this->load->view('admin/transaction_view', $output);
    }
	public function order() {
        $crud = new Grocery_CRUD();
        $crud->set_table('order');
        $crud->set_subject('order');
        $output = $crud->render();
        $this->load->view('admin/transaction_view', $output);
    }
	public function entertainment() {
        $crud = new Grocery_CRUD();
        $crud->set_table('entertainment');
        $crud->set_subject('entertainment');
        $output = $crud->render();
        $this->load->view('admin/transaction_view', $output);
    }
}

