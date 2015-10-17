<?php

class Entertainment_model extends CI_Model {
    
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
        
        
        $entertainment_insert = array(
            'order_number' => $_POST['order_number'],
            'sub_total' => $_POST['sub_total'],
            'order_time' => $order_time_3,
            'staff_id' => $_POST['staff_id'],
            'cash_register_id' => $_POST['cash_register_id'],
            'user_id' => $_POST['user_id']
        );
        $this->db->insert('entertainment', $entertainment_insert);
        
        $this->db->select_max('entertainment_id');
        $last_entertainment_id = $this->db->get('entertainment')->result()[0]->entertainment_id;
        

        $entertainment_detail_count = count($_POST['item_name']);
        for($i=0; $i < $entertainment_detail_count; $i++) {
            $entertainment_detail_insert = array(
                'item_id' => $_POST['item_id'][$i],
                'item_group_id' => $_POST['item_group_id'][$i],
                'instruction_id' => $_POST['instruction_id'][$i],
                'item_name' => $_POST['item_name'][$i],
                'item_quantity' => $_POST['item_quantity'][$i],
                'sales_price' => $_POST['sales_price'][$i],
                'discount_amount' => $_POST['discount_amount'][$i],
                'extended_price' => $_POST['extended_price'][$i],
                'entertainment_id' => $last_entertainment_id
            );
            $this->db->insert('entertainment_detail', $entertainment_detail_insert);
        }
        
    }
}

