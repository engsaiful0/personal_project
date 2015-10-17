<table id="report_table_one">
    <caption style="font-weight: bold;">Entertainment Order Report</caption>
    <tr>
        <th>Order Number</th>
        <th>Date</th>
        <th>Time</th>
        <th>Staff Name</th>
        <th>Total Amount</th>
        <th>Delete</th>
    </tr>
    <?php $grand_total = 0; ?>
    <?php foreach ($query_order_report->result() as $row_order_report) { ?>
        <?php
        date_default_timezone_set('Asia/Dhaka');
        $order_time = date_create($row_order_report->order_time);
        $staff_id = $row_order_report->staff_id;

        $staff_name = $this->db->select('name')->where('id', $staff_id)->get('staff')->result()[0]->name;
        ?>
        <tr>
            <td><?php echo $row_order_report->order_number; ?></td>
            <td><?php echo date_format($order_time, 'd-m-Y'); ?></td>
            <td><?php echo date_format($order_time, 'h:i A'); ?></td>
            <td><?php echo $staff_name; ?></td>
            <td><?php echo $row_order_report->sub_total; ?></td>
            <td>
                <?php
//                date_default_timezone_set('Asia/Dhaka');
                $today = date_create();
                $interval = date_diff($order_time, $today);
                $interval_comp = strtotime($interval->format('%R%a days'));
                $comparison_date = strtotime('+1 day');
                if ($interval_comp >= $comparison_date) {
                    // Do not show Delete button
                } else {
                ?>
                <a href="<?php echo site_url('sale/order_report/add_delete_status').'/'.$row_order_report->entertainment_id.'/entertainment'; ?>"><button>Delete</button></a>
                <?php
                }
                ?>
            </td>
        </tr>
    <?php 
    $grand_total = $grand_total + $row_order_report->sub_total;
    } ?>
    <?php
    $report_row_count = $query_order_report->num_rows();
    if ($report_row_count == 0) {
        echo '<tr><td colspan="6">No Result Found</td></tr>';
    } else {
       echo '<tr>'
        . '<td colspan="4">'
               . 'Grand Total'
               . '</td>'
               . '<td>'
               . $grand_total
               . '</td>'
               . '<td></td>'
               . '</tr>'; 
        echo '<tr>'
        . '<td>'
        . 'Total Entertainment'
        . '</td>'
        . '<td colspan="5">'
        . $report_row_count
        . '</td>'
        . '</tr>';
    }
    ?>
</table>


