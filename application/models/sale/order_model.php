<?php

class Order_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function save_order_db() {
//       echo '<pre>';
//       var_dump($_POST);
//       echo '</pre>';
        $order_time_2 = date_create($_POST['order_time']);
        $order_time_3 = date_format($order_time_2, 'Y-m-d H:i:s');
        
        $order_insert = array(
            'order_number' => $_POST['order_number'],
            'sub_total' => $_POST['sub_total'],
            'discount_last' => $_POST['discount_last'],
            'payment_method_id' => $_POST['payment_method_id'],
            'payment_amount' => $_POST['payment_amount'],
            'order_type' => $_POST['order_type'],
            'order_time' => $order_time_3,
            'cash_register_id' => $_POST['cash_register_id'],
            'total_payable' => $_POST['total_payable'],
            'user_id' => $_POST['user_id'],
            'vat' => $_POST['vat'],
            'net_due' => $_POST['net_due'],
            'change_amount' => $_POST['change_amount'],
            'payment_card_number' => $_POST['payment_card_number'],
            'card_expire_month' => $_POST['card_expire_month'],
            'card_expire_year' => $_POST['card_expire_year'],
        );
        $this->db->insert('order', $order_insert);
        
        $this->db->select_max('order_id');
        $last_order_id = $this->db->get('order')->result()[0]->order_id;
        
//       echo '<span style="color: red;">'.count($_POST['item_name']).'</span>';
        $order_detail_count = count($_POST['item_name']);
        for($i=0; $i < $order_detail_count; $i++) {
            $order_detail_insert = array(
                'item_id' => $_POST['item_id'][$i],
                'item_group_id' => $_POST['item_group_id'][$i],
                'instruction_id' => $_POST['instruction_id'][$i],
                'item_name' => $_POST['item_name'][$i],
                'item_quantity' => $_POST['item_quantity'][$i],
                'sales_price' => $_POST['sales_price'][$i],
                'discount_amount' => $_POST['discount_amount'][$i],
                'extended_price' => $_POST['extended_price'][$i],
                'order_id' => $last_order_id
            );
            $this->db->insert('order_detail', $order_detail_insert);
        }
        
    }
}

