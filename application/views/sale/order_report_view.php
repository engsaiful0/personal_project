<!doctype html>
<html>
    <head>
        <title>Order Report</title>
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

        <style>
            /*Overall page style*/
            body {
                background-color: white;
                color: black;
            }
            #container {
                margin: 0 auto;
                margin-top: 10px;
                width: 1000px;
                background-color: #EEEEEE;
                padding: 25px;
            }
            #navigation {
                margin-bottom: 50px;
            }
            #navigation button {
                width: 130px;
                height: 80px;
                background-color: #dddddd;
                font-size: 16px;
            } 
            #report_form {
                margin-bottom: 20px;
            }
            #footer {
                padding-top: 25px;
                text-align: center;
            }
            
            /*Date wise search button style*/
            #date_wise_search_button button {
                width: 130px;
                height: 80px;
                background-color: #dddddd;
                font-size: 16px;
            }
            
            /*order_number wise search button style*/
            #order_number_wise_search_button button {
                width: 130px;
                height: 80px;
                background-color: #dddddd;
                font-size: 16px;
            } 
            
            /*Ajax returned table style*/
            #report_table_one {
                width: 100%;
                border-collapse: collapse;
            }
            #report_table_one, #report_table_one th, #report_table_one td {
                font-size: 1em;
                border: 1px solid #CCC;
                padding: 3px 7px 2px 7px;
                text-align: center;
            }
            #report_table_one tr:nth-child(even) {
                background-color: #F5F5F5;
            }
            #report_table_one tr:nth-child(odd) {
                background-color: white;
            }

            /*Table and input box style*/
            #report_form table td {
                padding-bottom: 10px;
            }
            input {
                width: 250px;
                height: 30px;
            }
        </style>
    </head>
    <body onload="order_number_keyboard();
            from_calendar();
            to_calendar();
          ">
        <div id="container">
            <div id="navigation">
<!--                <button id="dine_in">Dine In</button>
                <button id="take_out">Take Out</button>
                <button id="entertainment">Entertainment</button>-->
                <a href="<?php echo site_url('sale/home'); ?>"><button>Exit</button></a>
            </div>

            <div id="report_form">
                <!--<form  method="post">-->
                <fieldset>
                    <legend>Search By Order No.</legend>
                <table>
                <tr>
                    <td>Order No.</td>
                    <td>
                        <input type="text" name="order_number" id="order_number" />
                    </td>
                    <td id="order_number_wise_search_button">
                        <button id="order_number_bill">Order</button>
                        <button id="order_number_entertainment">Entertainment</button>
                    </td>
                </tr>
                </table>
                </fieldset>
                
                <fieldset>
                    <legend>Search By Date</legend>
                    <table>
                        <tr>
                            <td>From Date</td>
                            <td>
                                <input type="text" name="from_date" id="from_date" />
                            </td>
                            <td rowspan="2" id="date_wise_search_button">
                                <button id="dine_in">Dine In</button>
                                <button id="take_out">Take Out</button>
                                <button id="entertainment">Entertainment</button>
                            </td>
                        </tr>
                        <tr>
                            <td>To Date</td>
                            <td>
                                <input type="text" name="to_date" id="to_date" />
                            </td>
                        </tr> 
                    </table>
                </fieldset>
                <!--</form>-->
            </div>


            <div id="show_report_result">

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
            function order_number_keyboard() {
                $('#order_number')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'qwerty'
                        })
                        .addTyping();
            }
        </script>

        <script>
            function from_calendar() {
                $.noConflict();
                $(function () {
                    $("#from_date").datepicker({
                        dateFormat: "dd-mm-yy"
                    });
                });
            }

            function to_calendar() {
//                $.noConflict();
                $(function () {
                    $("#to_date").datepicker({
                        dateFormat: "dd-mm-yy"
                    });
                });
            }
        </script>

        <script>
         $("#order_number_bill").click(function () {
                order_number_js = $('#order_number').val();
                $.post("<?php echo site_url('sale/order_report/order_report_by_order_number'); ?>",
                        {
                            order_number: order_number_js
                        },
                function (data, status) {
                    $('#show_report_result').html(data);
                });
            });
            
            $("#order_number_entertainment").click(function () {
                order_number_js = $('#order_number').val();
                $.post("<?php echo site_url('sale/order_report/entertainment_report_by_order_number'); ?>",
                        {
                            order_number: order_number_js
                        },
                function (data, status) {
                    $('#show_report_result').html(data);
                });
            });
        </script>
        
        <script>
            $("#dine_in").click(function () {
                from_date_js = $('#from_date').val();
                to_date_js = $('#to_date').val();
                $.post("<?php echo site_url('sale/order_report/order_report_dine_in'); ?>",
                        {
                            from_date: from_date_js,
                            to_date: to_date_js
                        },
                function (data, status) {
                    $('#show_report_result').html(data);
                });
            });


            $("#take_out").click(function () {
                from_date_js = $('#from_date').val();
                to_date_js = $('#to_date').val();
                $.post("<?php echo site_url('sale/order_report/order_report_take_out'); ?>",
                        {
                            from_date: from_date_js,
                            to_date: to_date_js
                        },
                function (data, status) {
                    $('#show_report_result').html(data);
                });
            });


            $("#entertainment").click(function () {
                from_date_js = $('#from_date').val();
                to_date_js = $('#to_date').val();
                $.post("<?php echo site_url('sale/order_report/order_report_entertainment'); ?>",
                        {
                            from_date: from_date_js,
                            to_date: to_date_js
                        },
                function (data, status) {
                    $('#show_report_result').html(data);
                });
            });

        </script>
    </body>
</html>

