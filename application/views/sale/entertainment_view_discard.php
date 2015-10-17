<!DOCTYPE html>
<html>
    <head>
        <title>Entertainment</title>


        <!--Popup Plugin Start-->
        <!--<link rel="stylesheet" href="<?php // echo base_url('template_common/bootstrap.min.css');       ?>">--> 
        <!--<link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css" />-->
        <!--<link rel="stylesheet" href="http://weloveiconfonts.com/api/?family=fontawesome">-->
         <!--<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>-->
         <!--<script src="<?php // echo base_url('template_common/jquery-1.8.2.min.js');              ?>"></script>-->
         <!--<script src="<?php // echo base_url('template_plugin/jquery.popupoverlay.js');              ?>"></script>--> 

        <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
        <!--Popup Plugin End-->


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





        <script src="<?php echo base_url('template_specific/entertainment_view.js'); ?>"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('template_specific/entertainment_view.css'); ?>">






        <style>
            /*Input and select style*/
            #staff_enter {
                width: 250px; 
                height: 30px;
                margin-bottom: 15px;
            }
            #staff_enter option {
                width: 250px; 
                height: 30px;
            }
            #staff_hold_button_container {
                display: block;
                padding-top: 20px;
                margin-left: 100px;
            }
            #staff_hold_button_container button {
                width: 90px;
                height: 50px;
            }

            @media print {
                body * {
                    visibility: hidden;
                }
                #bill_print, #bill_print * {
                    visibility: visible;
                    overflow: visible;
                }
                #bill_print {
                    position: absolute;
                    left: 0;
                    top: 0;
                }
            }
        </style>



    </head>
    <body>

        <iframe onload="item_group_click_add()" style="display: none;"></iframe>
        <iframe onload="item_specific_click_add()" style="display: none;"></iframe>

        <div class="container">
            <div class="menu">
<!--                <p>menu</p> -->
                <?php
//                for ($i = 1; $i <= 4; $i++)
//                    echo "<button>$i</button>";
                ?>
                <!--<button id="payment_dialog" onclick="payment_calculate()">Payment</button>-->
                <a href="<?php echo site_url('sale/entertainment'); ?>"> <button>New</button> </a>
                <button id="staff_dialog">Staff</button>
                <!--<button onclick="bill_save_fn(); window.print();">Print</button>-->
                <button onclick="bill_save_fn()">Print</button>
                <a href="<?php echo site_url('sale/home'); ?>"><button>Exit</button></a>
            </div>

            <fieldset id="item_specific_fieldset">
                <legend>Items</legend>
                <div class="item_specific" id="item_specific">
    <!--                <p>item</p>-->
                    <?php
//                for ($i = 1; $i <= 12; $i++)
//                    echo "<button>$i</button>";
//                
                    ?>
                </div>
            </fieldset>

            <div class="bill_print" id="bill_print">

                <form id="bill_save" action="<?php echo site_url('sale/entertainment/save_order'); ?>" method="post" target="_blank">
                    <span id="cash_register_id_hold"><input type="text" name="cash_register_id" id="cash_register_id" value="<?php echo $this->session->userdata('cash_register_id'); ?>" hidden /></span>
                    <span id="show_duplicate" style="display: none;">Duplicate Copy</span> 
                    <table id="bill_info" class="bill_info">
                        <tr>
                            <td colspan="5" style="text-align: center;">A & W Restaurant</td>
                        </tr>
                        <tr>
                            <?php
                            $last_entertainment_id = $this->db->select_max('entertainment_id')->get('entertainment')->result()[0]->entertainment_id;
                            $next_entertainment_id = $last_entertainment_id + 1;
                            ?>
                            <td colspan="3">
                                Order No: <input type="text" name="order_number" id="order_number" value="<?php echo 'AWE-' . $next_entertainment_id; ?>" readonly style="width: 100px;" />
                            </td>
                            <td></td>
                            <td>Date</td>
                            <td><?php echo date("d-M-Y"); ?></td>
                        </tr>
                        <tr>
                            <td>SL</td>
                            <td>Item</td>
                            <td>Qty</td>
                            <td>Rate</td>
                            <td>Disc</td>
                            <td>Extended</td>
                        </tr>


                    </table>
                    <span id="total_price_container" style="display: none;">
                        Total Price: <input name="total_price" id="total_price" /> <br />
                    </span>

                    <span id="staff_container" style="display: none;">
                        Staff: <span id="staff_name_display"></span>
                        <input type="text" name="staff_id" id="staff_id" hidden /> <br />
                    </span>
<!--                    <span id="payment_container" style="display: none;">
                        Order Type:  <input type="text" name="order_type" id="order_type" /> <br />
                        Payment Method:  <input type="text" name="payment_method" id="payment_method" /> <br />
                        Payment Amount:  <input type="text" name="payment_amount" id="payment_amount" />
                    </span>-->

                </form>

            </div>


            <fieldset id="item_group_fieldset">
                <legend>Item Group</legend>
                <div class="item_group" id="item_group">
                    <!--<p>item group</p>-->
                    <?php
                    $this->db->where('status', 'active');
                    $query_item_group = $this->db->get('item_group');
                    $array_item_group = $query_item_group->result();
                    $count_item_group = count($array_item_group);

                    for ($i = 0; $i <= 7; $i++) {
                        if ($i == 7) {
                            echo '<button onclick="item_group_click_add()">' . '>>' . '</button>';
                        } else {
                            echo '<button onclick="item_specific_show(this.value)" value="' . $array_item_group[$i]->id . '">' . $array_item_group[$i]->description . '</button>';
                        }
                    }
                    ?>
                </div>
            </fieldset>

            <span id="max_item_group" style="display: none;"><?php echo (int) ($count_item_group / 6); ?></span>
            <span id="max_item_specific" style="display: none;"></span>

            <!--            <div class="quantity" id="quantity">
                            <p>quantity</p>
                        </div>-->

            <!--            <div class="quantity_two" id="quantity_two">
                            <p>quantity two</p>
                        </div>-->

        </div>


        <div id="staff_hold" title="Staff" style="background-color: white; color: black; display: none;">

            <div style="background-color: white;">
                <!--<div class="form-group form-horizontal">-->
                <!--<label for="discount_last_enter">Discount:</label>-->
                Staff: 
                <select class="form-control" id="staff_enter">
                    <?php
                    $result_staff = $this->db->select('id, name')->get('staff');
                    foreach ($result_staff->result() as $row_staff) {
                        echo '<option value="' . $row_staff->id . '@#$' . $row_staff->name . '">' . $row_staff->name . '</option>';
                    }
                    ?>
                </select>
                <!--<input type="text" id="staff_enter">-->
                <!--</div>-->
                <span id="staff_hold_button_container">
                    <button onclick="add_staff()">Enter</button>
                </span>
            </div>

        </div>

        <!--        <div id="payment_hold" title="Payment Method" style="background-color: white; color: black; display: none;">
                    
        
                    <div class="form-group">
                        <label for="order_type_enter">Select Order Type:</label>
                        <select class="form-control" id="order_type_enter">
                            <option value="dine_in">Dine In</option>
                            <option value="take_out">Take Out</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="payment_method_enter">Select Payment Method:</label>
                        <select class="form-control" id="payment_method_enter">
                            <option value="cash">Cash</option>
                            <option value="master_card">Master Card</option>
                            <option value="a_and_w_privilege_card">A&W PRIVILEGE CARD</option>
                            <option value="q_cash">Q-Cash</option>
                            <option value="vanik_card">Vanik Card</option>
                            <option value="visa_card">Visa Card</option>
                            <option value="gift_voucher">GIFT VOUCHER</option>
                        </select>
                    </div>
                    
                    <div class="form-group form-horizontal">
                        <label for="payment_amount_enter">Payment Amouont:</label>
                        <input type="text" class="form-control" id="payment_amount_enter">
                    </div>
                    <button onclick="add_payment()">Enter</button>
        
                </div>-->





        <!--<div>-->
        <?php // $this->load->view('sale/order_keyboard'); ?>
        <!--</div>-->

        <!--<div>-->
        <!--<div class="block">-->
            <!--<span class="tooltip-tipsy" title="Click, then scroll down to see this code">QWERTY Password</span>-->
<!--            <input id="keyboard" type="text" onmouseover="keyboard()">
        <button id="open">abc</button>-->
        <!--</div>-->
        <!--</div>-->



        <script>
            function bill_save_fn() {
                if (typeof (form_submit_counter) == 'undefined') {
                    order_id_input = document.getElementById('staff_id').value;
                    if (order_id_input == "") {
                        alert('Please Enter Staff Name');
                    } else {
                        form_submit_counter = 1;
                        document.getElementById('bill_save').submit();
                        window.print();
                    }
                } else {
                    $('#show_duplicate').css('display', 'inline');
                    window.print();
                }

            }
        </script>

        <script>

            $("#payment_dialog").click(function () {
                $("#payment_hold").dialog({
                    minWidth: 500,
                    minHeight: 500
                });
            });
        </script>


        <script>

            $("#staff_dialog").click(function () {
                $("#staff_hold").dialog({
                    minWidth: 500,
                    minHeight: 500
                });
            });
        </script>


        <script>
            function extended_price_calculation(received_id) {
//                get all necessary id
                str_array = received_id.split('_');
                auto_id = str_array[0];
                quantity_id = auto_id + '_quantity';
                sales_price_id = auto_id + '_salesprice';
                discount_amount_id = auto_id + '_discountamount';
                extended_price_id = auto_id + '_extendedprice';

//                get input element values
                quantity = document.getElementById(quantity_id).value;
                sales_price = document.getElementById(sales_price_id).value;
                discount_amount = document.getElementById(discount_amount_id).value;
                extended_price = (quantity * sales_price) - discount_amount;

                document.getElementById(extended_price_id).value = extended_price;
                bill_total_cost();
//                document.getElementById('quantity_two').innerHTML = extended_price;
            }
        </script>



        <script>
            //	$(function(){
            //	$('#keyboard').keyboard({ layout: 'qwerty' });
            //	});




            //       $('#keyboard')
            //	.keyboard({
            //		openOn : null,
            //		stayOpen : true,
            //		layout : 'num'
            //	})
            //	.addTyping(); 



//            function keyboard() {
//                $('#keyboard')
//                        .keyboard({
//                            openOn: true,
//                            stayOpen: true,
//                            layout: 'num'
//                        })
//                        .addTyping();
//            }

            //        $('#open').click(function(){
            //	var kb = $('#keyboard').getkeyboard();
            //	// close the keyboard if the keyboard is visible and the button is clicked a second time
            //	if ( kb.isOpen ) {
            //		kb.close();
            //	} else {
            //		kb.reveal();
            //	}
            //});
        </script>



        <?php
        $this->db->select('id');
        $query_item_id = $this->db->get('item');
        ?>


        <script id="script_later">
            <?php
            foreach ($query_item_id->result() as $row_item_id) {
                ?>
                function <?php echo 'fn_' . $row_item_id->id . '_quantity' . '()'; ?> {
                    $("#<?php echo $row_item_id->id . '_quantity' ?>")
                            .keyboard({
                                openOn: true,
                                stayOpen: true,
                                layout: "num"
                            })
                            .addTyping();
                }

            <?php } ?>




        </script>




    </body>
</html>
