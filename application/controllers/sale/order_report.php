<?php

class Order_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database();
        $this->load->model('sale/order_report_model', 'order_report_model');
        if (!$this->session->userdata('admin_logged_in')) {
            if (!$this->session->userdata('manager_logged_in')) {
                if (!$this->session->userdata('user_logged_in')) {
                    $url_login = site_url('login');
                    redirect($url_login, 'refresh');
                }
            }
        }
    }

    public function index() {
        $this->load->view('sale/order_report_view');
    }

    public function order_report_dine_in() {
        $data['query_order_report'] = $this->order_report_model->order_report_dine_in_db();
        $data['table_caption'] = 'Dine In Order Report';
        $data['order_type_show'] = 'Dine In';
        $report_get = $this->load->view('sale/order_report_view_ajax', $data, TRUE);
        echo $report_get;
    }

    public function order_report_take_out() {
        $data['query_order_report'] = $this->order_report_model->order_report_take_out_db();
        $data['table_caption'] = 'Take Out Order Report';
        $data['order_type_show'] = 'Take Out';
        $report_get = $this->load->view('sale/order_report_view_ajax', $data, TRUE);
        echo $report_get;
    }

    public function order_report_entertainment() {
        $data['query_order_report'] = $this->order_report_model->order_report_entertainment_db();
        $report_get = $this->load->view('sale/order_report_entertainment_ajax', $data, TRUE);
        echo $report_get;
    }

    public function order_report_by_order_number() {
        $data['query_order_report'] = $this->order_report_model->order_report_by_order_number_db();
        $report_row_count = $data['query_order_report']->num_rows();
        if ($report_row_count > 0) {
            $order_type = $data['query_order_report']->result()[0]->order_type;
            if ($order_type == 'Dine In') {
                $data['table_caption'] = 'Dine In Order Report';
                $data['order_type_show'] = 'Dine In';
            } else {
                $data['table_caption'] = 'Take Out Order Report';
                $data['order_type_show'] = 'Take Out';
            }
        } else {
            $data['table_caption'] = 'Order Report';
        }
        $report_get = $this->load->view('sale/order_report_view_ajax', $data, TRUE);
        echo $report_get;
    }

    public function entertainment_report_by_order_number() {
        $data['query_order_report'] = $this->order_report_model->entertainment_report_by_order_number_db();
        $report_get = $this->load->view('sale/order_report_entertainment_ajax', $data, TRUE);
        echo $report_get;
    }

    public function add_delete_status() {
        $order_id = $this->uri->segment(4);
        $table_name = $this->uri->segment(5);
        if ($table_name == 'order') {
            $data = array(
                'delete_status' => 'deleted'
            );
            $this->db->where('order_id', $order_id);
            $this->db->update('order', $data);
        } else {
            $data_2 = array(
                'delete_status' => 'deleted'
            );
            $this->db->where('entertainment_id', $order_id);
            $this->db->update('entertainment', $data_2);
        }
        $url_order_report = site_url('sale/order_report');
        redirect($url_order_report, 'refresh');
    }

}
