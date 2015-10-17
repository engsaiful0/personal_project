<?php

class Entertainment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');

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
        $this->load->view('sale/entertainment_view');
    }

    public function next_item_group_ajax() {
        $item_group_click = $this->input->post('item_group_click');
        $this->db->where('status', 'active');
        $query_item_group = $this->db->get('item_group');
        $array_item_group = $query_item_group->result();
        $count_item_group = count($array_item_group);

        if ($item_group_click == 0) { // $click_count==0 means 'first_page'
            for ($i = 0; $i <= 7; $i++) {
                if ($i == 7) {
                    echo '<button onclick="item_group_click_add()">' . '>>' . '</button>';
                } else {
                    echo '<button onclick="item_specific_show(this.value)" value="' . $array_item_group[$i]->id . '">' . $array_item_group[$i]->description . '</button>';
                }
            }
            exit(); // if 'first_page' then do not display 'previous_button'
        }

        $begin = 7 + (($item_group_click - 1) * 6);

        for ($i = $begin; $i <= ($begin + 7); $i++) {
            if ($i == ($begin + 6)) {
                echo '<button onclick="item_group_click_subtract()">' . '<<' . '</button>';
            } elseif ($i == ($begin + 7)) {
                echo '<button onclick="item_group_click_add()">' . '>>' . '</button>';
            } else {
                if ($i < $count_item_group) {
                    echo '<button onclick="item_specific_show(this.value)" value="' . $array_item_group[$i]->id . '">' . $array_item_group[$i]->description . '</button>';
                }
            }
        }
    }

    public function next_item_specific_ajax() {
        $item_specific_click = $this->input->post('item_specific_click');
        $item_group_id = $this->input->post('item_group_id');

        $this->db->select('id,description');
        $this->db->where('item_group_id', $item_group_id);
        $query_item_specific = $this->db->get('item');
        $array_item_specific = $query_item_specific->result();
        $count_item_specific = count($array_item_specific);

        if ($item_specific_click == 0) { // $click_count==0 means 'first_page'
            for ($i = 0; $i <= 11; $i++) {
                if ($i == 11) {
                    echo '<button onclick="item_specific_click_add(this.value)" value="' . $item_group_id . '">' . '>>' . '</button>';
                } else {
                    echo '<button value="' . $item_group_id . '-' . $array_item_specific[$i]->id . '" onclick="bill_info(this.value)">' . $array_item_specific[$i]->description . '</button>';
                }
            }
            exit(); // if 'first_page' then do not display 'previous_button'
        }

        $begin = 11 + (($item_specific_click - 1) * 10);

        for ($i = $begin; $i <= ($begin + 11); $i++) {
            if ($i == ($begin + 10)) {
                echo '<button onclick="item_specific_click_subtract(this.value)" value="' . $item_group_id . '">' . '<<' . '</button>';
            } elseif ($i == ($begin + 11)) {
                echo '<button onclick="item_specific_click_add(this.value)" value="' . $item_group_id . '">' . '>>' . '</button>';
            } else {
                if ($i < $count_item_specific) {
                    echo '<button value="' . $item_group_id . '-' . $array_item_specific[$i]->id . '" onclick="bill_info(this.value)">' . $array_item_specific[$i]->description . '</button>';
                }
            }
        }
    }

    public function item_specific_show_ajax() {


        $item_group_id = $this->input->post('item_group_id');
        $this->db->select('id, description');
        $this->db->where('item_group_id', $item_group_id);
        $query_item_specific = $this->db->get('item');
        $array_item_specific = $query_item_specific->result();
        $count_item_specific = count($array_item_specific);

        if ($count_item_specific > 0) {
//            for ($i = 0; $i <= 11; $i++) {
            for ($i = 0; $i < $count_item_specific; $i++) {
                if ($i == 11) {
                    echo '<button onclick="item_specific_click_add(this.value)" value="' . $item_group_id . '">' . '>>' . '</button>';
                     exit(); // Added later during create report
                } else {
                    echo '<button value="' . $item_group_id . '-' . $array_item_specific[$i]->id . '" onclick="bill_info(this.value)">' . $array_item_specific[$i]->description . '</button>';
                }
            }

//            echo '<span id="item_group_resend" style="display: none;">' . $item_group_id . '</span>';
        }
    }

    public function item_specific_max_ajax() {

        $item_group_id = $this->input->post('item_group_id');
        $this->db->select('id,description');
        $this->db->where('item_group_id', $item_group_id);
        $query_item_specific = $this->db->get('item');
        $array_item_specific = $query_item_specific->result();
        $count_item_specific = count($array_item_specific);

        $max_item_specific = (int) ($count_item_specific / 10 );
        echo $max_item_specific;
    }

    public function bill_info_ajax() {
        $group_and_specific_id = $this->input->post('group_and_specific_id');
        $group_and_specific_id_array = explode('-', $group_and_specific_id);
        list($item_group_id, $item_specific_id) = $group_and_specific_id_array;

        // Get 'item_information' from 'item' table
        $this->db->select('description,sales_price,promotional_discount_id');
        $this->db->where('id', $item_specific_id);
        $result_item = $this->db->get('item')->result()[0];

        // Get 'discount_amount' from 'special_discount' table
        $this->db->select('discount_amount');
        $this->db->where('id', $result_item->promotional_discount_id);
        $this->db->where('status', 'active');
        $result_discount = $this->db->get('promotional_discount');
        $result_discount_count = $result_discount->num_rows();
        if ($result_discount_count) {
            $discount_amount = $result_discount->result()[0]->discount_amount;
        } else {
            $discount_amount = 0;
        }

        $data['result_item'] = $result_item;
        $data['discount_amount'] = $discount_amount;
        $data['item_specific_id'] = $item_specific_id;
        $data['item_group_id'] = $item_group_id;
        echo $this->load->view('sale/entertainment_bill_info_ajax', $data, TRUE);
    }

    public function get_vat() {
        $this->db->select('percentage');
        $this->db->where('id', '1');
        $this->db->where('status', 'active');
        $query_vat = $this->db->get('tax');
        if ($query_vat->num_rows()) {
            echo $query_vat->result()[0]->percentage;
        } else {
            echo 0;
        }
    }

    public function save_order() {
        $this->load->model('sale/entertainment_model', 'entertainment_model'); /* @var $this->order_model Order */
        $this->entertainment_model->save_order_db();
        echo 'Thank You.';
    }

}
