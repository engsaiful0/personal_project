<?php

class Test extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function index() {
//        echo 'alsdkjflksadf';
        $this->load->view('sale/cash_transfer_print');
    }
}

