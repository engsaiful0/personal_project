<table id="report_table_one">
    <caption style="font-weight: bold;"><?php echo $table_caption; ?></caption>
    <tr>
        <th>Order Number</th>
        <th>Date</th>
        <th>Time</th>
        <th>Total Amount</th>
        <th>Delete</th>
    </tr>
    <?php $grand_total = 0; ?>
    <?php foreach ($query_order_report->result() as $row_order_report) { ?>
        <?php
        date_default_timezone_set('Asia/Dhaka');
        $order_time = date_create($row_order_report->order_time);
        ?>
        <tr>
            <td><?php echo $row_order_report->order_number; ?></td>
            <td><?php echo date_format($order_time, 'd-m-Y'); ?></td>
            <td><?php echo date_format($order_time, 'h:i A'); ?></td>
            <td><?php echo $row_order_report->net_due; ?></td>
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
                <a href="<?php echo site_url('sale/order_report/add_delete_status').'/'.$row_order_report->order_id.'/order'; ?>"><button>Delete</button></a>
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
        $grand_total = $grand_total + $row_order_report->net_due;
    }
    ?>

    <?php
    $report_row_count = $query_order_report->num_rows();
    if ($report_row_count == 0) {
        echo '<tr><td colspan="5">No Result Found</td></tr>';
    } else {
        echo '<tr>'
        . '<td colspan="3">'
        . 'Grand Total'
        . '</td>'
        . '<td>'
        . $grand_total
        . '</td>'
                . '<td></td>'
        . '</tr>';
        echo '<tr>'
        . '<td>'
        . 'Total ' . $order_type_show
        . '</td>'
        . '<td colspan="4">'
        . $report_row_count
        . '</td>'
        . '</tr>';
    }
    ?>
</table>


