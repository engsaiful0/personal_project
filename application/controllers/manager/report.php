<?php

class Report extends CI_Controller {

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
        
    }

    public function order_report() {
        $crud = new Grocery_CRUD();
        $crud->set_table('order');
        $crud->set_subject('order');
        $crud->unset_operations();
        $output = $crud->render();
        $this->load->view('manager/common_report_view', $output);
    }

    public function entertainment_report() {
        $crud = new Grocery_CRUD();
        $crud->set_table('entertainment');
        $crud->set_subject('entertainment');
        $crud->unset_operations();
        $output = $crud->render();
        $this->load->view('manager/common_report_view', $output);
    }

    public function item_wise_sale_report_form() {
        $this->load->view('manager/report/item_wise_sale_report_form');
    }

    public function item_wise_sale_report_result() {
        $this->load->view('manager/report/item_wise_sale_report_result');
    }

    public function item_wise_sale_report_excel() {
        $file = 'Item_Wise_Sale_Report.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/report/item_wise_sale_report_result');
    }

    public function item_group_sale_report_form() {
        $this->load->view('manager/report/item_group_sale_report_form');
    }

    public function item_group_sale_report_result() {
        $this->load->view('manager/report/item_group_sale_report_result');
    }

    public function item_group_sale_report_excel() {
        $file = 'Item_Group_Sale_Report.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/report/item_group_sale_report_result');
    }
    
     public function item_group_and_specific_form() {
        $this->load->view('manager/report/item_group_and_specific_form');
    }

    public function item_group_and_specific_result() {
        $this->load->view('manager/report/item_group_and_specific_result');
    }

    public function item_group_and_specific_excel() {
        $file = 'Item_Group_And_Specific_Report.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/report/item_group_and_specific_result');
    }

    public function payment_type_sale_report_form() {
        $this->load->view('manager/report/payment_type_sale_report_form');
    }

    public function payment_type_sale_report_result() {
        $this->load->view('manager/report/payment_type_sale_report_result');
    }

    public function payment_type_sale_report_excel() {
        $file = 'Payment_Type_Sale_Report.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/report/payment_type_sale_report_result');
    }

    public function user_wise_sale_report_form() {
        $this->load->view('manager/report/user_wise_sale_report_form');
    }

    public function user_wise_sale_report_result() {
        $this->load->view('manager/report/user_wise_sale_report_result');
    }

    public function user_wise_sale_report_excel() {
        $file = 'User_Wise_Sale_Report.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/report/user_wise_sale_report_result');
    }
    
//    public function deleted_order_report() {
//        $crud = new Grocery_CRUD();
//        $crud->set_table('order');
//        $crud->where('delete_status', 'deleted');
//        $crud->set_relation('user_id', 'user', 'user_name');
//        $crud->unset_operations();
//        $output = $crud->render();
//        $this->load->view('manager/common_report_view', $output);
//    }
    
    public function deleted_order_report_form() {
        if ($this->session->userdata('manager_logged_in')) {
            exit();
        }
        $this->load->view('manager/report/deleted_order_report_form');
    }

    public function deleted_order_report_result() {
        $this->load->view('manager/report/deleted_order_report_result');
    }

    public function deleted_order_report_excel() {
        $file = 'Deleted_Sale_Report.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/report/deleted_order_report_result');
    }
    
}
