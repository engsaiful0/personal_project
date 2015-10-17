<!DOCTYPE html>
<html>
    <head>
        <title>Customer</title>

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
                width: 120px;
                height: 80px;
                background-color: #dddddd;
                font-size: 16px;
            }  
            #customer_entry {
                float: left;
                width: 500px;
                /*height: 500px;*/
            }
            #customer_search {
                float: right;
                width: 500px;
                /*height: 500px;*/
            }
            #message_show {
                clear: both;
            }
            #footer {
                padding-top: 25px;
                text-align: center;
                height: 30px;
            }
            #footer a {
                color: blue;
                text-decoration: underline;
            }
            
            /*Table style*/
            #customer_entry table td {
                padding-bottom: 10px;
            }
            #customer_search table td {
                padding-bottom: 10px;
            }
            
            /*Input box style*/
            input {
                height: 30px;
            }
        </style>
    </head>
    <body onload="name_entry_keyboard();
            phone_entry_keyboard();
            email_entry_keyboard();
            address_entry_keyboard();
            name_search_keyboard();
            phone_search_keyboard();
            email_search_keyboard()">
        <div id="container">
            <div id="navigation">
                <a href="<?php echo site_url('sale/customer'); ?>"><button>New</button></a>
                <button onclick="entry_form_submit()">Entry</button>
                <button onclick="search_form_submit()">Search</button>
                <a href="<?php echo site_url('sale/home'); ?>"><button>Exit</button></a>
            </div>
            <div id="customer_entry">
                <form action="<?php echo site_url('sale/customer/customer_insert'); ?>" method="post" id="customer_entry_form" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Customer Entry</legend>
                        <table>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="name" id="name_entry" /></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input type="text" name="phone" id="phone_entry" /></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" id="email_entry" /></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input type="text" name="address" id="address_entry" /></td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td><input type="file" name="image" id="image" /></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
            <div id="customer_search">
                <form action="<?php echo site_url('sale/customer/customer_search'); ?>" method="post" id="customer_search_form">
                    <fieldset>
                        <legend>Customer Search</legend>
                        <table>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="name_search" id="name_search" /></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input type="text" name="phone_search" id="phone_search" /></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email_search" id="email_search" /></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
            
            <div id="message_show">
                <?php
                if (isset($insert_result)) {
                    if ($insert_result) {
                        echo 'Record saved successfully.';
                    } else {
                        echo 'Record save failed.';
                    }
                }
                
                if (isset($image_error)) {
                    echo $image_error;
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
        function entry_form_submit() {
            document.getElementById('customer_entry_form').submit();
        }
        
        function search_form_submit() {
            document.getElementById('customer_search_form').submit();
        }
        </script>
        <script>
            function name_entry_keyboard() {
                $('#name_entry')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'qwerty'
                        })
                        .addTyping();
            }

            function phone_entry_keyboard() {
                $('#phone_entry')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'num'
                        })
                        .addTyping();
            }

            function email_entry_keyboard() {
                $('#email_entry')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'qwerty'
                        })
                        .addTyping();
            }

            function address_entry_keyboard() {
                $('#address_entry')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'qwerty'
                        })
                        .addTyping();
            }

            function name_search_keyboard() {
                $('#name_search')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'qwerty'
                        })
                        .addTyping();
            }

            function phone_search_keyboard() {
                $('#phone_search')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'num'
                        })
                        .addTyping();
            }

            function email_search_keyboard() {
                $('#email_search')
                        .keyboard({
                            openOn: true,
                            stayOpen: true,
                            layout: 'qwerty'
                        })
                        .addTyping();
            }
        </script>
    </body>
</html>

