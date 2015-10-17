<!doctype html>
<html>
    <head>
        <title>A&W Restaurant Sale Section</title>
        <style>
            #container {
                margin: 0 auto;
                width: 1000px;
                background-color: #EEEEEE;
                text-align: center;
                padding: 5px;
            }
            #header h2{
                padding: 0px;
                margin: 0px;
            }
            #navigation {
/*                margin: 0 auto;*/
            }
            #navigation button {
                width: 400px;
                height: 200px;
                background-color: #cccccc;
                font-size: 30px;
                margin-bottom: 5px;
            }
        </style>
    </head>

    <body>
        <div id="container">
            <div id="header">
                <h2>A & W Restaurant</h2>
                <h4>54 Gulshan Avenue <br /> Dhaka-1212, Bangladesh</h4>
            </div>
            <div id="navigation">
            <a href="<?php echo site_url('sale/order'); ?>"><button type="button">Order</button></a>
            <a href="<?php echo site_url('sale/entertainment'); ?>"><button type="button">Entertainment</button></a>
            <a href="<?php echo site_url('sale/order_report'); ?>"><button type="button">View</button></a>
            <a href="<?php echo site_url('sale/customer'); ?>"> <button type="button">Customer</button> </a>
            <a href="<?php echo site_url('sale/cash_transfer'); ?>"><button type="button">Cash Transfer</button></a>
            <a href="<?php echo site_url('login/logout'); ?>"><button type="button">Log Off</button></a>
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
    </body>
</html>

