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
    'delete_status !=' => 'deleted'
);
$this->db->select('cash_register_id');
$this->db->distinct('cash_register_id');
$this->db->where($filter_array);
$query_cash_register_id_order = $this->db->get('order');
if ($query_cash_register_id_order->num_rows() == 0) {
    echo 'No Result Found';
    exit();
}
foreach ($query_cash_register_id_order->result() as $row_cash_register_id_order) {
    $cash_register_id_array[] = $row_cash_register_id_order->cash_register_id;
}

$grand_net_amount = 0;
//echo '<pre>';
//var_dump($cash_register_id_array);
//echo '</pre>' . 'tttttttttt';
?>

<table class="two">
     <tr>
        <td colspan="5" style="text-align: center;"><h3>Payment Type Wise Sale Report</h3></td>
    </tr>
    <tr>
        <td rowspan="2" colspan="3" style="text-align: center;">A&W Restaurant <br />54 Gulshan Avenue, Dhaka-1212,Bangladesh</td>
        <td>From Date</td>
        <td><?php echo $this->input->post('from_date'); ?></td>
    </tr>
    <tr>
        <td>To Date</td>
        <td><?php echo $this->input->post('to_date'); ?></td>
    </tr>
    <tr>
        <td>Payment Name</td>
        <td>Paid Amount</td>
        <td>Bank Charge Rate</td>
        <td>Bank Charge Amount</td>
        <td>Net Amount</td>
    </tr>
    <?php
    foreach ($cash_register_id_array as $cash_register_id_specific) {
//        Get "cash_register_name" from "cash_register" table
        $cash_register_name = $this->db->select('cash_register_name')->where('cash_register_id', $cash_register_id_specific)->get('cash_register')->result()[0]->cash_register_name;
        echo '<tr><td>Cash Register</td><td colspan="4">' . $cash_register_name . '</td></tr>';
        // Get distinct "payment_method_id" from "order" table
        $query_payment_method_id_order = $this->db->select('payment_method_id')->distinct('payment_method_id')->where('cash_register_id', $cash_register_id_specific)->where($filter_array)->get('order');
        foreach ($query_payment_method_id_order->result() as $row_payment_method_id_order) {
            $payment_method_id_array[] = $row_payment_method_id_order->payment_method_id;
        }

        // Show "payment_method_id" wise information from "order" table and "payment_method" table
        foreach ($payment_method_id_array as $payment_method_id_specific) {
            // Get "payment_method_name" from "payment_method" table
            $payment_method_name = $this->db->select('description')->where('id', $payment_method_id_specific)->get('payment_method')->result()[0]->description;
            // Get payment method "bank_charge" (rate) from "payment_method" table
            $bank_charge_rate = $this->db->select('bank_charge')->where('id', $payment_method_id_specific)->get('payment_method')->result()[0]->bank_charge;
            // Get sum(net_due) based on "specific cash_register_id" and "specific payment_method_id"
            $sum_of_net_due = $this->db->select_sum('net_due')->where('payment_method_id', $payment_method_id_specific)->where('cash_register_id', $cash_register_id_specific)->where($filter_array)->get('order')->result()[0]->net_due;
            $bank_charge_amount = ($sum_of_net_due * $bank_charge_rate) / 100;
            $net_amount = $sum_of_net_due - $bank_charge_amount;
            $grand_net_amount = $grand_net_amount + $net_amount;
            echo '<tr>'
            . '<td>' . $payment_method_name . '</td>'
            . '<td>' . round($sum_of_net_due,2) . '</td>'
            . '<td>' . round($bank_charge_rate,2) . '%</td>'
            . '<td>' . round($bank_charge_amount,2) . '</td>'
            . '<td>'.round($net_amount,2).'</td>'
            . '</tr>';
        }

        // Unset Arrays
        unset($payment_method_id_array);
    }
    ?>
    <tr>
        <td colspan="4" style="text-align: right;">Grand Total:</td>
        <td><?php echo round($grand_net_amount,2); ?></td>
    </tr>
</table>

