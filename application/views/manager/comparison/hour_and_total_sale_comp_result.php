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
//$from_date = $this->input->post('from_date');
//$to_date = $this->input->post('to_date');
//echo $from_date.'and'.$to_date;
?>

<?php
$from_date_tem = date_create($this->input->post('from_date'));
$from_date = date_format($from_date_tem, 'Y-m-d H:i:s');
//$from_date_tem_2 = date_format($from_date_tem, 'Y-m-d');
//$from_date = $from_date_tem_2 . ' ' . '00:00:00';

$to_date_tem = date_create($this->input->post('to_date'));
$to_date = date_format($to_date_tem, 'Y-m-d H:i:s');
//$to_date_tem_2 = date_format($to_date_tem, 'Y-m-d');
//$to_date = $to_date_tem_2 . ' ' . '24:00:00';

$filter_array = array(
    'order_time >=' => $from_date,
    'order_time <=' => $to_date,
    'delete_status !=' => 'deleted'
);
$this->db->select('order_id');
$this->db->where($filter_array);
$query_order_id = $this->db->get('order');
if ($query_order_id->num_rows() == 0) {
    echo 'No Result Found';
    exit();
}
foreach ($query_order_id->result() as $row_order_id) {
    $order_id_array[] = $row_order_id->order_id;
}
//echo '<pre>';
//var_dump($from_date_tem);
//echo '</pre>';
?>




<table class="two">
    <tr>
        <td colspan="5" style="text-align: center;"><h3>Hour Wise Sale Comparison</h3></td>
    </tr>
    <tr>
        <td rowspan="2" colspan="2" style="text-align: center;">A&W Restaurant <br />54 Gulshan Avenue, Dhaka-1212,Bangladesh</td>
        <td>From Date</td>
        <td><?php echo $this->input->post('from_date'); ?></td>
    </tr>
    <tr>
        <td>To Date</td>
        <td><?php echo $this->input->post('to_date'); ?></td>
    </tr>
    <tr>
        <td colspan="2">Day</td>
        <td colspan="2">Total Sales Amount</td>
    </tr>
    <?php
    for ($date_start = $from_date_tem; $date_start <= $to_date_tem; date_modify($date_start, '+1 hour')) {
        $date_from_search = date_format($date_start, 'Y-m-d H:i:s');
        // Order search is for one hour interval. This one hour addition is for time range creation. This addition should back before loop iteration.
        date_modify($date_start, '+1 hour');
        $date_to_search = date_format($date_start, 'Y-m-d H:i:s');
        $filter_search = array(
            'order_time >=' => $date_from_search,
            'order_time <=' => $date_to_search,
            'delete_status !=' => 'deleted'
        );
        $net_due_sum = $this->db->select_sum('net_due')->where($filter_search)->get('order')->result()[0]->net_due;
        if ($net_due_sum == "") {
            $net_due_sum_2 = 0;
        } else {
            $net_due_sum_2 = $net_due_sum;
        }
        // Before loop iteration added one hour time is back. This also show from time to user
        date_modify($date_start, '-1 hour');
        echo '<tr>'
        . '<td colspan="2">' . date_format($date_start, 'd-m-Y h:i:s A') . '</td>'
        . '<td colspan="2">' . round($net_due_sum_2,2) . '</td>'
        . '</tr>';
        
    }
    ?>

</table>

