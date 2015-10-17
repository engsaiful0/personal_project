<!DOCTYPE html>
<html dir="ltr">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="initial-scale=1.0">
        <title>A&W Restaurant</title>
         <!--Jquery ui calendar load start-->
        <link rel="stylesheet" href="<?php echo base_url('template_common/jquery-ui.css'); ?>">
        <script src="<?php echo base_url('template_common/jquery-1.10.2.js'); ?>"></script>
        <script src="<?php echo base_url('template_common/jquery-ui.js'); ?>"></script>
        <!--Jquery ui calendar load end-->
        <script src="<?php echo base_url('template_common/jquery-ui-timepicker-addon.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('template_common/jquery-ui-timepicker-addon.css'); ?>">
        <!-- Start css3menu.com HEAD section -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>template_admin/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
        <!-- End css3menu.com HEAD section -->


    </head>
    <body ontouchstart="" style="background-color:#EBEBEB">
        <!-- Start css3menu.com BODY section -->
        <input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
        <ul id="css3menu1" class="topmenu">
            <li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
            <li class="topfirst"><a href="#" style="height:18px;line-height:18px;"><span>Entry</span></a>
                <ul>
                    <li><a href="<?php echo site_url().'/admin/entry/customer_entry'; ?>">Customer</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/supplier_entry'; ?>">Supplier</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/staff_entry'; ?>">Staff</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/shop_entry'; ?>">Shop</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/extra_item_group_entry'; ?>">Extra Item Group</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/instruction_entry'; ?>">Instruction</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/item_entry'; ?>">Item</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/item_group_entry'; ?>">Item Group</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/branch_entry'; ?>">Branch</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/job_title_entry'; ?>">Job Title</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/measurement_entry'; ?>">Measurement</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/payment_method_entry'; ?>">Payment Method</a></li>
                    <li><a href="<?php echo site_url().'/admin/entry/promotional_discount_entry'; ?>">Promotional Discount</a></li>
               <li><a href="<?php echo site_url().'/admin/entry/scrolling_message_entry'; ?>">Scrolling Message</a></li>
               <li><a href="<?php echo site_url().'/admin/entry/special_discount_entry'; ?>">Special Discount</a></li>
                <li><a href="<?php echo site_url().'/admin/entry/cash_register_entry'; ?>">Cash Register</a></li>
               <li><a href="<?php echo site_url().'/admin/entry/tax_entry'; ?>">Tax</a></li>
               <li><a href="<?php echo site_url().'/admin/entry/invoice_message_entry'; ?>">Invoice Message</a></li>
                </ul></li>
               
                <li class="toplast"><a href="#" style="height:18px;line-height:18px;"><span>Report</span></a>
                <ul>

                    <li><a href="<?php echo site_url() . '/manager/report/order_report'; ?>">Order Report</a></li>
                    <li><a href="<?php echo site_url() . '/manager/report/entertainment_report'; ?>">Entertainment Report</a></li>
                    <li><a href="<?php echo site_url() . '/manager/report/item_wise_sale_report_form'; ?>">Item Wise Sale</a></li>  
                    <li><a href="<?php echo site_url() . '/manager/report/item_group_sale_report_form'; ?>">Item Group Wise Sale</a></li> 
                    <li><a href="<?php echo site_url() . '/manager/report/item_group_and_specific_form'; ?>">Item Group and Specific</a></li> 
                    <li><a href="<?php echo site_url() . '/manager/report/payment_type_sale_report_form'; ?>">Payment Type Wise Sale</a></li>
                    <li><a href="<?php echo site_url() . '/manager/report/user_wise_sale_report_form'; ?>">User Wise Sale</a></li>
                    <li><a href="<?php echo site_url() . '/manager/report/deleted_order_report_form'; ?>">Deleted Order Report</a></li>
                </ul></li>
                
                <li class="toplast"><a href="#" style="height:18px;line-height:18px;"><span>Comparison</span></a>
                <ul>

                    <li><a href="<?php echo site_url() . '/manager/comparison/day_and_total_sale_comp_form'; ?>">Day Wise Total Sale</a></li>
                    <li><a href="<?php echo site_url() . '/manager/comparison/day_and_item_specific_comp_form'; ?>">Day and Item Wise</a></li>
                    <li><a href="<?php echo site_url() . '/manager/comparison/day_and_item_group_comp_form'; ?>">Day and Item Group Wise</a></li>
                    <li><a href="<?php echo site_url() . '/manager/comparison/hour_and_total_sale_comp_form'; ?>">Hour Wise Total Sale</a></li>
                    <li><a href="<?php echo site_url() . '/manager/comparison/hour_and_item_specific_comp_form'; ?>">Hour and Item Wise</a></li>
                    <li><a href="<?php echo site_url() . '/manager/comparison/hour_and_item_group_comp_form'; ?>">Hour and Item Group Wise</a></li>
                </ul></li>
                
            <li class="toplast"><a href="#" style="height:18px;line-height:18px;"><span>Transaction</span></a>
                <ul>
<!--                    <li><a href="#"><span>Item 1 0</span></a>
                        <ul>
                            <li><a href="#">Item 1 0 0</a></li>
                        </ul>
                    </li>-->
                    
                    <li><a href="<?php echo site_url().'/admin/transaction/item_requisition_entry'; ?>">Item Requisition</a></li>
                     <li><a href="<?php echo site_url().'/admin/transaction/item_receiving_entry'; ?>">Item Receiving</a></li>
                     <li><a href="<?php echo site_url().'/admin/transaction/item_dispose_entry'; ?>">Item Dispose</a></li>
                     <li><a href="<?php echo site_url().'/admin/transaction/item_process_entry'; ?>">Item Process</a></li>
                     <li><a href="<?php echo site_url().'/admin/transaction/stock_reconciliation_entry'; ?>">Stock Reconciliation</a></li>
                     <li><a href="<?php echo site_url().'/admin/transaction/cash_reconciliation_entry'; ?>">Cash Reconciliation</a></li>
                    
                </ul></li>
                
                <li class="toplast"><a href="#" style="height:18px;line-height:18px;"><span>Security</span></a>
                <ul>
<!--                    <li><a href="#"><span>Item 1 0</span></a>
                        <ul>
                            <li><a href="#">Item 1 0 0</a></li>
                        </ul>
                    </li>-->
                    
                    <li><a href="<?php echo site_url().'/admin/security/user_setup'; ?>">User Setup</a></li>
                     
                </ul></li>
                
                
                <li class="topfirst"><a href="<?php echo site_url('login/logout'); ?>" style="height:18px;line-height:18px;"><span>Admin Log Out</span></a></li>
                
        </ul>
        <!-- End css3menu.com BODY section -->