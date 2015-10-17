<!DOCTYPE html>
<html>
    <head>
        <title>Cash Transfer</title>


        <!--Jquery ui calendar load start-->
        <link rel="stylesheet" href="<?php echo base_url('template_common/jquery-ui.css'); ?>">
        <script src="<?php echo base_url('template_common/jquery-1.10.2.js'); ?>"></script>
        <script src="<?php echo base_url('template_common/jquery-ui.js'); ?>"></script>
        <!--Jquery ui calendar load end-->




        <!--Jquery Plugin Keyboard Add Start-->
        <!-- jQuery (required) & jQuery UI + theme (optional) -->
        <link href="<?php echo base_url() . 'template_keyboard/'; ?>docs/css/jquery-ui.min.css" rel="stylesheet">
        <script src="<?php echo base_url() . 'template_keyboard/'; ?>docs/js/jquery.min.js"></script>
        <script src="<?php echo base_url() . 'template_keyboard/'; ?>docs/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() . 'template_keyboard/'; ?>docs/js/jquery-migrate-1.2.1.min.js"></script>

        <!-- keyboard widget css & script (required) -->
        <link href="<?php echo base_url() . 'template_keyboard/'; ?>css/keyboard.css" rel="stylesheet">
        <script src="<?php echo base_url() . 'template_keyboard/'; ?>js/jquery.keyboard.js"></script>

        <!-- keyboard extensions (optional) -->
        <script src="<?php echo base_url() . 'template_keyboard/'; ?>js/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url() . 'template_keyboard/'; ?>js/jquery.keyboard.extension-typing.js"></script>
        <script src="<?php echo base_url() . 'template_keyboard/'; ?>js/jquery.keyboard.extension-autocomplete.js"></script>

        <!-- demo only -->
        <link rel="<?php echo base_url() . 'template_keyboard/'; ?>stylesheet" href="docs/css/bootstrap.min.css">
        <link href="<?php echo base_url() . 'template_keyboard/'; ?>docs/css/demo.css" rel="stylesheet">
        <link href="<?php echo base_url() . 'template_keyboard/'; ?>docs/css/tipsy.css" rel="stylesheet">
        <link href="<?php echo base_url() . 'template_keyboard/'; ?>docs/css/prettify.css" rel="stylesheet">
        <script src="<?php echo base_url() . 'template_keyboard/'; ?>docs/js/demo.js"></script>
        <script src="<?php echo base_url() . 'template_keyboard/'; ?>docs/js/jquery.tipsy.min.js"></script>
        <script src="<?php echo base_url() . 'template_keyboard/'; ?>docs/js/prettify.js"></script> <!-- syntax highlighting -->
        <!--Jquery Plugin Keyboard Add End-->

<!--       <script>
    jq13 = jQuery.noConflict(true);
</script>-->

        <!--Online library load-->
        <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
 <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
 <!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
        <!--End of online library load-->





<!--        <script>
jq131 = jQuery.noConflict(true);
</script>-->

<!--        <script type="text/javascript">
   jQuery.noConflict(true);
</script>-->




        <style>
            /*Overall page style*/
            body {
                background-color: white;
                color: black;
            }
            #container {
                margin: 0 auto;
                width: 1000px;
                height: 680px;
                background-color: #EEEEEE;
                padding: 25px;
            }
            #button_container {
                margin-bottom: 50px;
            }
            #button_container button {
                width: 120px;
                height: 80px;
                background-color: #DDDDDD;
                font-size: 15px;
            }
            #cash_transfer_info_hold {
                float: left;
                width: 500px;
                height: 500px;
            }
            #cash_register {
                float: right;
                width: 500px;
                height: 500px;
            }
            #footer {
                text-align: center;
            }
            #footer a {
                color: blue;
                text-decoration: underline;
            }

            /*Table and Input style*/
            #current_user_id {
                width: 260px;
                height: 40px;
                background-color: #262626;
                color: white;
                -webkit-appearance: none;
                -moz-appearance: none;
                border-radius: 5px;
            }
            td {
                padding-bottom: 10px;
            }
            input {
                height: 30px;
            }
        </style>
    </head>
    <body onload="cash_balance_keyboard();
            transfer_number_keyboard();
            transfer_amount_keyboard();
            notes_keyboard();
            to_user_name_keyboard();
            to_user_password_keyboard();
          ">


        <!-- Javascript function load on 'iframe' does not working on Google Chrome -->    
        <!--        <iframe onload="from_register_no_keyboard();
                cash_balance_keyboard();
                to_register_no_keyboard()" style="display: none;"></iframe>
        
        <iframe onload="transfer_number_keyboard();
                transfer_amount_keyboard();
                notes_keyboard();
                calendar_show();" style="display: none;"></iframe>-->

        <!--<iframe onload="password_clear()"></iframe>-->

        <?php
        $query_cash_register = $this->db->get('cash_register');
        ?>
        <?php
        $cash_register_id = $this->session->userdata('cash_register_id');
        $user_id = $this->session->userdata('user_id');
        $filter_array = array(
            'delete_status !=' => 'deleted',
            'cash_transfer_status !=' => 'transferred',
            'cash_register_id' => $cash_register_id,
            'user_id' => $user_id
        );
        $this->db->where($filter_array);
        $query_order_amount = $this->db->get('order');
        $grand_net_due = 0;
        foreach($query_order_amount->result() as $row_order_amount) {
            $grand_net_due = $grand_net_due + $row_order_amount->net_due;
        }
        ?>

        <div id="container">

            <div id="button_container">
                <a href="<?php echo site_url('sale/cash_transfer'); ?>"> <button>New</button> </a>
                <button onclick="cash_transfer_submit()">Done</button>
                <a href="<?php echo site_url('sale/home'); ?>"><button>Exit</button></a>
            </div>



            <form action="<?php echo site_url('sale/cash_transfer/cash_transfer_check'); ?>" method="post" id="cash_transfer_form">
                <div id="cash_transfer_info_hold">
                    <fieldset>
                        <legend>Cash Transfer Info</legend>
                        <table>
                            <tr>
                                <td>Transfer No.</td>
                                <td> <input type="text" name="transfer_number" id="transfer_number" /> </td>
                            </tr>
                            <tr>
                                <td>Transfer Date </td>
                                <td> <input type="text" name="transfer_date" id="transfer_date" value="<?php echo date('d-m-Y'); ?>" /> </td>
                            </tr>
                            <tr>
                                <td>Transfer Amount </td>
                                <td> <input type="text" name="transfer_amount" id="transfer_amount" value="<?php echo $grand_net_due; ?>" /> </td>
                            </tr>
                            <tr>
                                <td>Notes </td>
                                <td> 
                                    <!--<input type="text" name="notes" id="notes" />--> 
                                    <textarea name="notes" id="notes" rows="4" cols="50"></textarea>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>

                <div id="cash_register">

                    <fieldset>
                        <legend>From Cash Register</legend>
                        <table>
                            <tr>
                                <td>Register Name.</td>
                                <td> 
                                    <?php
    $cash_register_id_current = $this->session->userdata('cash_register_id'); 
    $this->db->where('cash_register_id', $cash_register_id_current);
    $this->db->select('cash_register_name');
    $cash_register_name_current = $this->db->get('cash_register')->result()[0]->cash_register_name;
                                    ?>
<!--                                    <input type="text" name="from_register_no" id="from_register_no" value="<?php // echo $cash_register_name_current; ?>" /> -->
                                    <select name="from_register_no" id="from_register_no">
                                        <option value="<?php echo $cash_register_id_current ?>"><?php echo $cash_register_name_current; ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Cash Balance </td>
                                <td> <input type="text" name="cash_balance" id="cash_balance" value="<?php echo $grand_net_due; ?>" /> </td>
                            </tr>
                            <tr>
                                <td>Current User </td>
                                <td> 
                                    <!--<input type="text" name="current_user_id" id="current_user_id" value="<?php // echo $this->session->userdata('user_name');         ?>"/>--> 
                                    <select name="current_user_id" id="current_user_id">
                                        <option value="<?php echo $this->session->userdata('user_id'); ?>"> <?php echo $this->session->userdata('user_name'); ?> </option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <br />
                    <fieldset>
                        <legend>To Cash Register</legend>
                        <table>
                            <tr>
                                <td>Register Name. </td>
                                <td> 
                                    <!--<input type="text" name="to_register_no" id="to_register_no" />--> 
                                    <select name="to_register_no" id="to_register_no">
                                        <?php
                                        foreach ($query_cash_register->result() as $row_cash_register) {
                                            if ($row_cash_register->cash_register_id == $cash_register_id_current) {
                                                continue;
                                            }
                                            echo '<option value="' . $row_cash_register->cash_register_id . '">' . $row_cash_register->cash_register_name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td> 
                            </tr>
                            <?php
//                        $result_user = $this->db->get('user');
                            ?>
                            <tr>
                                <td>Logon Name </td>
                                <td> 
                                    <!--<input type="text" name="to_user_name" id="to_user_name" onclick="password_clear()" />-->
                                    <input type="text" name="to_user_name" id="to_user_name" />
                                    <!--<select name="to_user_id" id="to_user_id">-->
                                    <?php
//                                    foreach ($result_user->result() as $row_user) {
//                                        echo '<option value="' . $row_user->id . '">' . $row_user->user_name . '</option>';
//                                    }
                                    ?>
                                    <!--</select>-->

                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="to_user_password" id="to_user_password" /></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>

            </form>   

            <div id="show_error">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </div>

            <div id="scrolling_message">
                <?php
                $this->load->view('sale/scrolling_message');
                ?>
            </div>
            
            <div id="footer">
                <p>Developed by <a href="http://zaman-it.com/" target="_blank">Zaman IT</a></p>
            </div>

        </div>




        <script>
//            function from_register_no_keyboard() {
//                $('#from_register_no')
//                        .keyboard({
//                            openOn: true,
//                            stayOpen: true,
//                            layout: 'num'
//                        })
//                        .addTyping();
//            }

            function cash_balance_keyboard() {
                $('#cash_balance')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'num'
                        })
                        .addTyping();
            }

//            function to_register_no_keyboard() {
//                $('#to_register_no')
//                        .keyboard({
//                            openOn: true,
//                            stayOpen: true,
//                            layout: 'num'
//                        })
//                        .addTyping();
//            }

            function transfer_number_keyboard() {
                $('#transfer_number')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'num'
                        })
                        .addTyping();
            }

            function transfer_amount_keyboard() {
                $('#transfer_amount')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'num'
                        })
                        .addTyping();
            }

            function notes_keyboard() {
                //                $.noConflict();
                $('#notes')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'qwerty'
                        })
                        .addTyping();
            }

            function to_user_name_keyboard() {
                $('#to_user_name')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'qwerty'
                        })
                        .addTyping();
            }

            function to_user_password_keyboard() {
                $('#to_user_password')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'qwerty'
                        })
                        .addTyping();
            }


//            function calendar_show() {
//                $.noConflict();
//                $(function () {
//                    $("#transfer_date").datepicker({
//                        dateFormat: "dd-mm-yy"
//                    });
//                });
//            }

            function cash_transfer_submit() {
                document.getElementById('cash_transfer_form').submit();
            }

//            function password_clear() {
//                $('#to_user_password').val('');
//            }
        </script>

    </body>
</html>

