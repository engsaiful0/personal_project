<?php

class Comparison extends CI_Controller {
    
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
    
     public function day_and_total_sale_comp_form() {
        $this->load->view('manager/comparison/day_and_total_sale_comp_form');
    }

    public function day_and_total_sale_comp_result() {
        $this->load->view('manager/comparison/day_and_total_sale_comp_result');
    }

    public function day_and_total_sale_comp_excel() {
        $file = 'Day_Wise_Total_Sale.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/comparison/day_and_total_sale_comp_result');
    }
    
     public function day_and_item_group_comp_form() {
        $this->load->view('manager/comparison/day_and_item_group_comp_form');
    }

    public function day_and_item_group_comp_result() {
        $this->load->view('manager/comparison/day_and_item_group_comp_result');
    }

    public function day_and_item_group_comp_excel() {
        $file = 'Day_and_Item_Group_Wise_Comparison.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/comparison/day_and_item_group_comp_result');
    }
    
     public function day_and_item_specific_comp_form() {
        $this->load->view('manager/comparison/day_and_item_specific_comp_form');
    }

    public function day_and_item_specific_comp_result() {
        $this->load->view('manager/comparison/day_and_item_specific_comp_result');
    }

    public function day_and_item_specific_comp_excel() {
        $file = 'Day_and_Item_Wise_Comparison.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/comparison/day_and_item_specific_comp_result');
    }
    
    public function hour_and_total_sale_comp_form() {
        $this->load->view('manager/comparison/hour_and_total_sale_comp_form');
    }

    public function hour_and_total_sale_comp_result() {
        $this->load->view('manager/comparison/hour_and_total_sale_comp_result');
    }

    public function hour_and_total_sale_comp_excel() {
        $file = 'Hour_Wise_Total_Sale.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/comparison/hour_and_total_sale_comp_result');
    }
    
    public function hour_and_item_group_comp_form() {
        $this->load->view('manager/comparison/hour_and_item_group_comp_form');
    }

    public function hour_and_item_group_comp_result() {
        $this->load->view('manager/comparison/hour_and_item_group_comp_result');
    }

    public function hour_and_item_group_comp_excel() {
        $file = 'Day_and_Item_Group_Wise_Comparison.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/comparison/hour_and_item_group_comp_result');
    }
    
    public function hour_and_item_specific_comp_form() {
        $this->load->view('manager/comparison/hour_and_item_specific_comp_form');
    }

    public function hour_and_item_specific_comp_result() {
        $this->load->view('manager/comparison/hour_and_item_specific_comp_result');
    }

    public function hour_and_item_specific_comp_excel() {
        $file = 'Hour_and_Item_Wise_Comparison.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file");
        $this->load->view('manager/comparison/hour_and_item_specific_comp_result');
    }
}
