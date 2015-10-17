<!DOCTYPE html>
<html>
    <head>
        <title>Entertainment</title>


        <!--Popup Plugin Start-->
        <!--<link rel="stylesheet" href="<?php // echo base_url('template_common/bootstrap.min.css');                     ?>">--> 
        <!--<link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css" />-->
        <!--<link rel="stylesheet" href="http://weloveiconfonts.com/api/?family=fontawesome">-->
         <!--<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>-->
         <!--<script src="<?php // echo base_url('template_common/jquery-1.8.2.min.js');                              ?>"></script>-->
         <!--<script src="<?php // echo base_url('template_plugin/jquery.popupoverlay.js');                              ?>"></script>--> 

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

            /*Only print the bill section*/
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
    <body onload="payment_amount_enter_keyboard();
            payment_card_number_keyboard()">

        <iframe onload="item_group_click_add()" style="display: none;"></iframe>
        <iframe onload="item_specific_click_add()" style="display: none;"></iframe>

        <div class="container">
            <div class="menu">
<!--                <p>menu</p> -->
                <?php
//                for ($i = 1; $i <= 4; $i++)
//                    echo "<button>$i</button>";
                ?>
                <a href="<?php echo site_url('sale/entertainment'); ?>"> <button>New</button> </a>
                <!--<button id="payment_dialog">Payment</button>-->
                <button id="staff_dialog">Staff</button>
                <!--<button id="discount_last_dialog">Discount</button>-->
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
                    <span id="cash_register_id_hold">
                        <input type="text" name="cash_register_id" id="cash_register_id" value="<?php echo $this->session->userdata('cash_register_id'); ?>" hidden />
                        <input type="text" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" hidden />
                    </span>
                    <span id="show_duplicate" style="display: none;">Duplicate Copy</span> 
                    <table id="bill_info" class="bill_info">
                        <tr>
                            <td colspan="5" style="text-align: center;">A & W Restaurant</td>
                        </tr>
                        <tr>
                            <?php
                            // set the default timezone to use. Available since PHP 5.1
                            date_default_timezone_set('Asia/Dhaka');
                            ?>
                            <td>Date</td>
                            <td colspan="4"><input type="text" name="order_time" id="order_time" value="<?php echo date("d-M-Y h:i A"); ?>" readonly /></td>
                        </tr>
                        <tr>
                            <?php
                            $last_entertainment_id = $this->db->select_max('entertainment_id')->get('entertainment')->result()[0]->entertainment_id;
                            $next_entertainment_id = $last_entertainment_id + 1;
                            ?>
                            <td>SP:</td>
                            <td><?php echo $this->session->userdata('user_name'); ?></td>
                            <td>&nbsp;</td>
                            <td>Order No:</td>
                            <td>
                                <input type="text" name="order_number" id="order_number" value="<?php echo 'AWE-' . $next_entertainment_id; ?>" style="width: 100px;" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>SL#</td>
                            <td>Item&nbsp;Description</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="first_line_border"></td>
                            <td class="first_line_border">Unit Price</td>
                            <td class="first_line_border">Discount</td>
                            <td class="first_line_border">Qty.</td>
                            <td class="first_line_border">Total</td>
                        </tr>

                    </table>

                    <table id="bill_calculated">
                        <tr>
                            <td class="second_line_border" style="width: 100%;"></td>
                            <td class="second_line_border" style="width: 100%;"></td>
                        </tr>
                        <tr>
                           <td id="staff_container" style="display: none;">
                               Staff: <span id="staff_name_display"></span>
                           </td>
                           <td><input type="text" name="staff_id" id="staff_id" hidden /></td>
                        </tr>
                    </table>
                    
                    <table id="bill_additional" style="display: none;">

                        <tr>
                   <!--<span id="sub_total_container" style="display: none;">-->
                            <td colspan="4" class="sub_total_container" style="display: none;">Sub Total:</td>
                            <td class="sub_total_container" style="display: none;"><input name="sub_total" id="sub_total" /></td>
                            <!--</span>-->
                        </tr>
                        
                        <tr>
                        <!--<span id="discount_last_container" style="display: none;">-->
                            <td colspan="4" class="discount_last_container" style="display: none;">Discount:</td>
                            <td class="discount_last_container" style="display: none;"><input type="text" name="discount_last" id="discount_last" /></td>
                            <!--</span>-->
                        </tr>
                        <tr>
                            <td colspan="4" class="total_payable_container" style="display: none;">Total Payable</td>
                            <td class="total_payable_container" style="display: none;"><input type="text" name="total_payable" id="total_payable" /></td>
                        </tr>
                        <tr>
                            <?php
                            $this->db->select('percentage');
                            $this->db->where('id', '1');
                            $this->db->where('status', 'active');
                            $query_vat = $this->db->get('tax');
                            if ($query_vat->num_rows()) {
                                $vat_percentage = $query_vat->result()[0]->percentage;
                            } else {
                                $vat_percentage = 0;
                            }
                            ?>
                            <td colspan="4" class="vat_container" style="display: none;">+VAT(<?php echo $vat_percentage; ?>%)</td>
                            <td class="vat_container" style="display: none;"><input type="text" name="vat" id="vat" /></td>
                        </tr>
                        <tr>
                            <td  colspan="4" class="net_due_container" style="display: none;">Net Due</td>
                            <td class="net_due_container" style="display: none;"><input type="text" name="net_due" id="net_due" /></td>
                        </tr>
                        <tr>
                            <td class="payment_container" style="display: none;">Paid:</td>
                            <td class="payment_container" style="display: none;"><input type="text" name="payment_amount" id="payment_amount" /></td>
                        </tr>
                        <tr>
                            <td class="payment_container" style="display: none;">Change</td>
                            <td class="payment_container" style="display: none;"><input type="text" name="change_amount" id="change_amount" /></td>
                        </tr>
                        <tr>
                            <td class="payment_container" style="display: none;">Payment Mode:</td>
                        </tr>
                        <tr>
                            <td class="payment_container" style="display: none;"><input type="text" name="payment_method" id="payment_method" /></td>
                            <td class="payment_container" style="display: none;"><input type="text" name="net_due_show" id="net_due_show" /></td>
                        </tr>
                        <tr>
                            <td class="payment_container" style="display: none;">Order Type:</td>
                            <td class="payment_container" style="display: none;"><input type="text" name="order_type" id="order_type" /></td>
                        </tr>
                        <tr>
                            <td class="payment_container" style="display: none;">Card No.</td>
                            <td class="payment_container" style="display: none;"><input type="text" name="payment_card_number" id="payment_card_number" /></td>
                        </tr>
                        <tr>
                            <td class="payment_container" style="display: none;">Expire Date</td>
                            <td class="payment_container" style="display: none;"><input type="text" name="card_expire_month" id="card_expire_month" /></td> 
                            <td class="payment_container" style="display: none;"><input type="text" name="card_expire_year" id="card_expire_year" /></td>
                        </tr>
                        
                        <tr>
                            <td class="discount_last_container" style="display: none;">Discount Name:</td>
                            <td class="discount_last_container" style="display: none;"><span id="discount_name_invoice"></span></td>
                        </tr>
                        <tr>
                            <td class="discount_last_container" style="display: none;">You have saved <span id="discount_amount_invoice"></span></td>
                        </tr>
                        
                        <tr>
                            <td class="invoice_message" style="display: none;">
                            <?php
               $invoice_message = $this->db->where('id','1')->get('invoice_message')->result()[0]->message;
               echo $invoice_message;
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="development_info" style="display: none;">Developed By</td>
                            <td class="development_info" style="display: none;">
                                Zaman IT
                            </td>
                        </tr>

<!--                        <span id="payment_container" style="display: none;">       
</span>-->
                    </table>
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

            <div id="scrolling_message">
                <?php
                $this->load->view('sale/scrolling_message');
                ?>
            </div>
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
        
        
        <div id="discount_last_hold" title="Discount" style="background-color: white; color: black; display: none;">
            <div style="background-color: white;">
                Discount: 
                <select id="discount_last_enter">
                    <?php
                    $this->db->where('status', 'active');
                    $query_special_discount = $this->db->get('special_discount');
                    foreach ($query_special_discount->result() as $row_special_discount) {
                        echo '<option value="' . $row_special_discount->discount_amount . '">' . $row_special_discount->description . '</option>';
                    }
                    ?>
                </select>
                <span id="discount_last_hold_button_container">
                    <button onclick="add_discount_last()">Enter</button>
                </span>
            </div>
            <!--            
            Discount: <input type="text" id="discount_last_enter"> <br />
            -->

        </div>

        <div id="payment_hold" title="Payment Method" style="background-color: white; color: black; display: none;">

            <table> 
                <tr>
                    <td>Order Type:</td>
                    <td colspan="2">
                        <select class="form-control" id="order_type_enter">
                            <option value="Dine In">Dine In</option>
                            <option value="Take Out">Take Out</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Payment Method:</td>
                    <td colspan="2">
                        <select class="form-control" id="payment_method_enter">
                            <option value="Cash">Cash</option>
                            <option value="Master Card">Master Card</option>
                            <option value="A&W Privilege Card">A&W Privilege Card</option>
                            <option value="Q-Cash">Q-Cash</option>
                            <option value="Vanik Card">Vanik Card</option>
                            <option value="Visa Card">Visa Card</option>
                            <option value="Gift Voucher">Gift Voucher</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Card No.</td>
                    <td colspan="2"><input type="text" id="payment_card_number_enter" /></td>
                </tr>
                <tr>
                    <td>Expire Date</td>
                    <td>
                        <select id="card_expire_month_enter">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </td>
                    <td>
                        <select id="card_expire_year_enter">
                            <?php
                            for($year=2015; $year<=2020; $year++) {
                                echo '<option value="'.$year.'">'.$year.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Payment Amount:</td>
                    <td colspan="2"><input type="text" class="form-control" id="payment_amount_enter"></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <span id="payment_hold_button_container">
                            <button onclick="add_payment()">Enter</button>
                        </span>
                    </td>
                </tr>
            </table>
        </div>





<!--        <div id="javascript_test">
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
<?php // $this->load->view('sale/order_keyboard');    ?>
        </div>-->

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
                        empty_void_instruction_hide();
                        form_submit_counter = 1;
//                        document.getElementById('bill_save').submit();
                        send_form_data_to_db();
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

            $("#discount_last_dialog").click(function () {
                $("#discount_last_hold").dialog({
                    minWidth: 500,
                    minHeight: 500
                });
            });
        </script>

        <script>
//            function discount_enter_keyboard() {
//                $('#discount_last_enter')
//                        .keyboard({
//                            openOn: true,
//                            stayOpen: true,
//                            layout: 'num'
//                        })
//                        .addTyping();
//            }

            function payment_amount_enter_keyboard() {
                $('#payment_amount_enter')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'num'
                        })
                        .addTyping();
            }

            function payment_card_number_keyboard() {
                $('#payment_card_number_enter')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'num'
                        })
                        .addTyping();
            }
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
