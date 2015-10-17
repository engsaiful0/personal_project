<?php

class Cash_transfer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        if (!$this->session->userdata('admin_logged_in')) {
            if (!$this->session->userdata('manager_logged_in')) {
                if (!$this->session->userdata('user_logged_in')) {
                    $url_login = site_url('login');
                    redirect($url_login, 'refresh');
                }
            }
        }
    }

    public function index($message = "") {
        $data['message'] = $message;
        $this->load->view('sale/cash_transfer_view', $data);
    }

    public function cash_transfer_check() {
        $this->load->model('sale/cash_transfer_model', 'cash_transfer_model');
        $result_user = $this->cash_transfer_model->cash_transfer_check_db();
        $row_count = $result_user->num_rows();
        
        if ($row_count) {
           $user_level = $result_user->result()[0]->user_level; 
        }
        
        if ($row_count) {
            if ($user_level == 'user') {
                $message = 'Cash must transfer to Admin or Manager';
                $this->index($message);
            } else {
                $to_user_id = $result_user->result()[0]->id;
                $this->cash_transfer_insert($to_user_id);
            }
        } else {
            $message = 'To Cash Register user name or password does not match';
            $this->index($message);
        }
    }

    public function cash_transfer_insert($to_user_id) {
        $this->load->model('sale/cash_transfer_model', 'cash_transfer_model');
        $this->cash_transfer_model->cash_transfer_insert_db($to_user_id);
        $this->load->view('sale/cash_transfer_print');
//        $message = 'Record has been saved';
//        $this->index($message);
    }

}
