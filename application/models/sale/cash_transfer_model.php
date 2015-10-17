<?php

class Cash_transfer_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function cash_transfer_check_db() {
        $user_name = $_POST['to_user_name'];
        $password = $_POST['to_user_password'];
        $this->db->where('user_name', $user_name);
        $this->db->where('password', $password);
        $result_user  = $this->db->get('user');
        return $result_user;
    }


    public function cash_transfer_insert_db($to_user_id) {
//        echo '<pre>';
//        var_dump($_POST);
//        echo '</pre>';
        $transfer_date_temp = $_POST['transfer_date'];
        $transfer_date_temp_2 = date_create($transfer_date_temp);
        $transfer_date_temp_3 = date_format($transfer_date_temp_2, 'Y-m-d');
        
        $cash_transfer_insert_array = array(
            'transfer_number' => $_POST['transfer_number'],
            'transfer_date' => $transfer_date_temp_3,
            'transfer_amount' => $_POST['transfer_amount'],
            'notes' => $_POST['notes'],
            'from_register_no' => $_POST['from_register_no'],
            'cash_balance' => $_POST['cash_balance'],
            'current_user_id' => $_POST['current_user_id'],
            'to_register_no' => $_POST['to_register_no'],
            'to_user_id' => $to_user_id
        );
        $this->db->insert('cash_transfer', $cash_transfer_insert_array);
        
        $cash_register_id = $this->session->userdata('cash_register_id');
        $user_id = $this->session->userdata('user_id');
        $order_data_array = array(
            'cash_transfer_status' => 'transferred'
        );
        $this->db->where('cash_register_id',$cash_register_id);
        $this->db->where('user_id',$user_id);
        $this->db->update('order',$order_data_array);
    }
}

