<style>
    table.one {
        /*margin: 0 auto 20px;*/
    }
    table.two {
        /*margin: 0 auto;*/
        border-collapse: collapse;
    }
    table.two th, table.two tr, table.two td {
        border: 1px solid black;
        padding: 5px;
    }
    .center {
        text-align: center;
    }
    table.two a {
        color: #5C9487;
    }
    table.two a:hover {
        color: #103192;
    }
</style>
<?php
$from_date = $this->input->post('from_date');
$to_date = $this->input->post('to_date');
//echo $from_date.'and'.$to_date;
?>

<?php
$from_date_tem = date_create($this->input->post('from_date'));
$from_date_tem_2 = date_format($from_date_tem, 'Y-m-d');
$from_date = $from_date_tem_2 . ' ' . '00:00:00';
$to_date_tem = date_create($this->input->post('to_date'));
$to_date_tem_2 = date_format($to_date_tem, 'Y-m-d');
$to_date = $to_date_tem_2 . ' ' . '24:00:00';

$filter_array = array(
    'order_time >=' => $from_date,
    'order_time <=' => $to_date,
    'delete_status =' => 'deleted'
);

$this->db->where($filter_array);
$query_order = $this->db->get('order');
if ($query_order->num_rows() == 0) {
    echo 'No Result Found';
    exit();
}

//echo '<pre>';
//var_dump($cash_register_id_array);
//echo '</pre>' . 'tttttttttt';
?>

<table class="two">
    <tr>
        <td colspan="15" style="text-align: center;"><h3>Deleted Order Report</h3></td>
    </tr>
    <tr>
        <td rowspan="2" colspan="13" style="text-align: center;">A&W Restaurant <br />54 Gulshan Avenue, Dhaka-1212,Bangladesh</td>
        <td>From Date</td>
        <td><?php echo $this->input->post('from_date'); ?></td>
    </tr>
    <tr>
        <td>To Date</td>
        <td><?php echo $this->input->post('to_date'); ?></td>
    </tr>

    <tr>
        <td>Order Number</td>
        <td>Sub Total</td>
        <td>Special Discount</td> <!--Discount Last-->
        <td>Payment Method</td> <!--Payment Method Id-->
        <td>Payment Amount</td>
        <td>Order Type</td>
        <td>Order Time</td>
        <td>Cash Register</td> <!--Cash Register Id-->
        <td>User Name</td> <!--User Id-->
        <td>VAT</td>
        <td>Net Due</td>
        <td>Change Amount</td>
        <td>Payment Card Number</td>
        <td>Card Expire Month</td>
        <td>Card Expire Year</td>
    </tr>
    <?php foreach ($query_order->result() as $row_order) { ?>

    <tr>
        <td><?php echo $row_order->order_number; ?></td>
        <td><?php echo round($row_order->sub_total,2); ?></td>
        <td><?php echo round($row_order->discount_last,2); ?></td>
        <td><?php echo $this->db->select('description')->where('id',$row_order->payment_method_id)->get('payment_method')->result()[0]->description; ?></td>
        <td><?php echo round($row_order->payment_amount,2); ?></td>
        <td><?php echo $row_order->order_type; ?></td>
        <td>
            <?php 
            $order_time = date_create($row_order->order_time);
            echo date_format($order_time, 'd-m-Y h:i A');
            ?>
        </td>
        <td><?php echo $this->db->select('cash_register_name')->where('cash_register_id',$row_order->cash_register_id)->get('cash_register')->result()[0]->cash_register_name; ?></td>
        <td><?php echo $this->db->select('user_name')->where('id',$row_order->user_id)->get('user')->result()[0]->user_name; ?></td>
        <td><?php echo round($row_order->vat,2); ?></td>
        <td><?php echo round($row_order->net_due,2); ?></td>
        <td><?php echo round($row_order->change_amount,2); ?></td>
        <td><?php echo $row_order->payment_card_number; ?></td>
        <td><?php echo $row_order->card_expire_month; ?></td>
        <td><?php echo $row_order->card_expire_year; ?></td>
    </tr>
    
    <?php
    $query_order_detail = $this->db->where('order_id',$row_order->order_id)->get('order_detail');
    foreach ($query_order_detail->result() as $row_order_detail) {
        echo '<tr>'
        . '<td colspan="3">'.$row_order_detail->item_name.'</td>'
                . '<td colspan="2">'.$row_order_detail->item_quantity.' Piece'.'</td>'
                . '</tr>';
        
    }
    ?>
    <?php } ?>
  
</table>

