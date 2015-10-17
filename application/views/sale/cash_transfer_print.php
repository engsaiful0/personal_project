<!doctype html>
<html>
    <head>
        <title>Cash Transfer Report</title>
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
            #cash_transfer_report {
                width: 100%;
            }
            #footer {
                text-align: center;
            }
            #footer a {
                color: blue;
                text-decoration: underline;
            }

            /*Report table style*/
            table.two {
                border-collapse: collapse;
                width: 80%;
            }
            table.two td {
                width: 25%;
            }
            table.two th, table.two tr, table.two td {
                border: 1px solid black;
                padding: 5px;
            }
            td.center {
                text-align: center;
            }

            /*Only print the Cash Transfer Report section*/
            @media print {
                body * {
                    visibility: hidden;
                }
                #cash_transfer_report, #cash_transfer_report * {
                    visibility: visible;
                    overflow: visible;
                }
                #cash_transfer_report {
                    position: absolute;
                    left: 0;
                    top: 0;
                }
            }
        </style>
    </head>
    <body>
        <div id="container">
            <div id="button_container">
                <a href="<?php echo site_url('sale/cash_transfer'); ?>"> <button>Back</button></a>
                <button onclick="window.print()">Print</button>
                <a href="<?php echo site_url('sale/home'); ?>"><button>Exit</button></a>
            </div>
            <div id="cash_transfer_report">
                <?php
                $cash_transfer_id_max = $this->db->select_max('id')->get('cash_transfer')->result()[0]->id;
                $result_cash_transfer = $this->db->where('id', $cash_transfer_id_max)->get('cash_transfer')->result()[0];
                ?>
                <table class="two">
                    <tr><td colspan="4" class="center">Cash Transfer Report</td></tr>
                    <tr>
                        <td>Transfer No.</td>
                        <td><?php echo $result_cash_transfer->transfer_number; ?></td>
                        <td>From Register Name</td>
                        <td>
                            <?php 
  echo $this->db->select('cash_register_name')->where('cash_register_id',$result_cash_transfer->from_register_no)->get('cash_register')->result()[0]->cash_register_name; 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Transfer Date</td>
                        <td>
                            <?php 
                            $transfer_date = date_create($result_cash_transfer->transfer_date);
                            echo date_format($transfer_date, 'd-m-Y');
                            ?>
                        </td>
                        <td>Cash Balance</td>
                        <td><?php echo $result_cash_transfer->cash_balance; ?></td>
                    </tr>
                    <tr>
                        <td>Transfer Amount</td>
                        <td><?php echo $result_cash_transfer->transfer_amount; ?></td>
                        <td>Current User</td>
                        <td>
                            <?php
    echo $this->db->select('user_name')->where('id',$result_cash_transfer->current_user_id)->get('user')->result()[0]->user_name; 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Notes</td>
                        <td><?php echo $result_cash_transfer->notes; ?></td>
                        <td>To Register Name</td>
                        <td>
                            <?php 
    echo $this->db->select('cash_register_name')->where('cash_register_id',$result_cash_transfer->to_register_no)->get('cash_register')->result()[0]->cash_register_name; 
                            ?>
                        </td>
                    </tr>
                </table>
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

