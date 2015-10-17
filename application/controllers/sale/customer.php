<?php

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('sale/customer_model', 'customer_model');
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
        $this->load->view('sale/customer_view');
    }

    public function customer_insert_image_upload() {
        $field_name = "image";
        $this->db->select_max('id');
        $last_customer_id = $this->db->get('customer')->result()[0]->id;

        $last_customer_id_2 = (int) $last_customer_id;
        $customer_id_next = $last_customer_id_2 + 1;
        $config['upload_path'] = './upload/customer/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = "$customer_id_next";
        $config['max_size'] = '1024';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($field_name)) {
            $image_name = $this->upload->data()['file_name'];
            $insert_result_2 = $this->customer_model->customer_insert_with_image($image_name);
            if ($insert_result_2) {
                $success['insert_result'] = $insert_result_2;
                $this->load->view('sale/customer_view', $success);
            }
        } else {
            $error = array('image_error' => $this->upload->display_errors());
            $this->load->view("sale/customer_view", $error);
        }
    }

    public function customer_insert() {
        if ($_FILES['image']['error'] == 4) {     // error code 4 means image not uploaded
            $data['insert_result'] = $this->customer_model->customer_insert_without_image();
            $this->load->view('sale/customer_view', $data);
        } else {
            $this->customer_insert_image_upload();
        }
    }

    public function customer_search() {
//        echo '<pre>';
//        var_dump($_POST);
//        echo '</pre>';
        $data_4['query_customer_search'] = $this->customer_model->customer_search_db();
        $this->load->view('sale/customer_search_view', $data_4);
    }

}
