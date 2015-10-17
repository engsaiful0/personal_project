<?php

class Customer_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function customer_insert_with_image($image_name) {
        $customer_insert_array_2 = array(
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'email' => $_POST['email'],
            'image' => $image_name
        );
        $insert_result_2 = $this->db->insert('customer', $customer_insert_array_2);
        return $insert_result_2;
    }
    
    public function customer_insert_without_image() {
        $customer_insert_array = array(
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'email' => $_POST['email']
        );
        $insert_result = $this->db->insert('customer', $customer_insert_array);
        return $insert_result;
    }
    
    public function customer_search_db() {
//        var_dump($_POST);
        if ($_POST['name_search'] == "") {
           $name_search = 'not_exist_~!@#$%^&*()-=_+{}[]|?<>,._is_blank';
        } else {
            $name_search = $_POST['name_search'];
        }
        
        if ($_POST['phone_search'] == "") {
            $phone_search = 'not_exist_~!@#$%^&*()-=_+{}[]|?<>,._is_blank';
        } else {
            $phone_search = $_POST['phone_search'];
        }
        
        if ($_POST['email_search'] == "") {
            $email_search = 'not_exist_~!@#$%^&*()-=_+{}[]|?<>,._is_blank';
        } else {
            $email_search = $_POST['email_search'];
        }
        
        
        $this->db->like('name', $name_search);
        $this->db->or_like('phone', $phone_search);
        $this->db->or_like('email', $email_search);
        $query_customer_search = $this->db->get('customer');
        return $query_customer_search; 
    }
}

