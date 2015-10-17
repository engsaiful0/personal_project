<!doctype html>
<html>
    <head>
        <title>Customer Search Result</title>
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
                height: 1000px;
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

            /*Table style*/
            #customer_info {
                width: 100%;
                border-collapse: collapse;
            }
            #customer_info td, #customer_info th {
                font-size: 1em;
                border: 1px solid #CCC;
                padding: 3px 7px 2px 7px;
                text-align: center;
            }
            #customer_info tr:nth-child(even) {
                background-color: #F5F5F5;
            }
            #customer_info tr:nth-child(odd) {
                background-color: white;
            }

        </style>
    </head>
    <body>
        <div id="container">
            <div id="navigation">
                <a href="<?php echo site_url('sale/customer'); ?>"><button>Back</button></a>
                <a href="<?php echo site_url('sale/home'); ?>"><button>Exit</button></a>
            </div>
            <div id="search_result">
                <table id="customer_info">
                    <tr>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Image</th>
                    </tr>


                    <?php foreach ($query_customer_search->result() as $row_customer_search) { ?>
                        <tr>
                            <td><?php echo $row_customer_search->name; ?></td>
                            <td><?php echo $row_customer_search->phone; ?></td>
                            <td><?php echo $row_customer_search->email; ?></td>
                            <td><?php echo $row_customer_search->address; ?></td>
                            <td><img src="<?php echo base_url("upload/customer/$row_customer_search->image"); ?>" width="100px" height="100px" /></td>
                        </tr>


                    <?php } ?>

                    <?php
                    $result_customer_search = $query_customer_search->result();
                    $count_result_customer = count($result_customer_search);
                    if ($count_result_customer == 0) {
                        echo '<tr><td colspan="5">No Result Found</td></tr>';
                    }
                    ?>   

                </table>

            </div>
            
            <div id="scrolling_message">
                <?php
                $this->load->view('sale/scrolling_message');
                ?>
            </div>
            
        </div>
    </body>
</html>

