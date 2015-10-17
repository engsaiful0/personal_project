<?php

class Order_report_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function order_report_dine_in_db() {
        $order_type = 'Dine In';
        $from_date_tem = date_create($this->input->post('from_date'));
        $from_date_tem_2 = date_format($from_date_tem, 'Y-m-d');
        $from_date = $from_date_tem_2 . ' ' . '00:00:00';
        $to_date_tem = date_create($this->input->post('to_date'));
        $to_date_tem_2 = date_format($to_date_tem, 'Y-m-d');
        $to_date = $to_date_tem_2 . ' ' . '24:00:00';
        $cash_register_id = $this->session->userdata('cash_register_id');
        $user_id = $this->session->userdata('user_id');

        $filter_array = array(
            'delete_status !=' => 'deleted',
            'cash_register_id' => $cash_register_id,
            'user_id' => $user_id,
            'order_type' => $order_type,
            'order_time >=' => $from_date,
            'order_time <=' => $to_date
        );
        $this->db->where($filter_array);
        $query_order_report = $this->db->get('order');

        return $query_order_report;
    }

    public function order_report_take_out_db() {
        $order_type = 'Take Out';
        $from_date_tem = date_create($this->input->post('from_date'));
        $from_date_tem_2 = date_format($from_date_tem, 'Y-m-d');
        $from_date = $from_date_tem_2 . ' ' . '00:00:00';
        $to_date_tem = date_create($this->input->post('to_date'));
        $to_date_tem_2 = date_format($to_date_tem, 'Y-m-d');
        $to_date = $to_date_tem_2 . ' ' . '24:00:00';
        $cash_register_id = $this->session->userdata('cash_register_id');
        $user_id = $this->session->userdata('user_id');

        $filter_array = array(
            'delete_status !=' => 'deleted',
            'cash_register_id' => $cash_register_id,
            'user_id' => $user_id,
            'order_type' => $order_type,
            'order_time >=' => $from_date,
            'order_time <=' => $to_date
        );
        $this->db->where($filter_array);
        $query_order_report = $this->db->get('order');

        return $query_order_report;
    }

    public function order_report_entertainment_db() {
        $from_date_tem = date_create($this->input->post('from_date'));
        $from_date_tem_2 = date_format($from_date_tem, 'Y-m-d');
        $from_date = $from_date_tem_2 . ' ' . '00:00:00';
        $to_date_tem = date_create($this->input->post('to_date'));
        $to_date_tem_2 = date_format($to_date_tem, 'Y-m-d');
        $to_date = $to_date_tem_2 . ' ' . '24:00:00';
        $cash_register_id = $this->session->userdata('cash_register_id');
        $user_id = $this->session->userdata('user_id');

        $filter_array = array(
            'delete_status !=' => 'deleted',
            'cash_register_id' => $cash_register_id,
            'user_id' => $user_id,
            'order_time >=' => $from_date,
            'order_time <=' => $to_date
        );
        $this->db->where($filter_array);
        $query_order_report = $this->db->get('entertainment');

        return $query_order_report;
    }

    public function order_report_by_order_number_db() {
        $order_number = $this->input->post('order_number');
        $cash_register_id = $this->session->userdata('cash_register_id');
        $user_id = $this->session->userdata('user_id');
        $filter_array = array(
            'delete_status !=' => 'deleted',
            'cash_register_id' => $cash_register_id,
            'user_id' => $user_id,
            'order_number' => $order_number
        );
        $this->db->where($filter_array);
        $query_order_report = $this->db->get('order');
        return $query_order_report;
    }

    public function entertainment_report_by_order_number_db() {
        $order_number = $this->input->post('order_number');
        $cash_register_id = $this->session->userdata('cash_register_id');
        $user_id = $this->session->userdata('user_id');
        $filter_array = array(
            'delete_status !=' => 'deleted',
            'cash_register_id' => $cash_register_id,
            'user_id' => $user_id,
            'order_number' => $order_number
        );
        $this->db->where($filter_array);
        $query_order_report = $this->db->get('entertainment');
        return $query_order_report;
    }

}
