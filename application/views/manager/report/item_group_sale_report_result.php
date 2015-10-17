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
//var_dump($order_id_array);
//echo '</pre>';
?>

<table class="two">
    <tr>
        <td colspan="5" style="text-align: center;"><h3>Item Group Wise Sale Report</h3></td>
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
        <td>Item Description</td>
        <td>Quantity</td>
        <td>Volume</td>
        <td>% Of Total</td>
        <td>Promotional Discount</td>
    </tr>

    <?php
    // Get distinct "item_group_id" from "order_detail" table
    $query_item_group_id = $this->db->select('item_group_id')->distinct('item_group_id')->where_in('order_id', $order_id_array)->get('order_detail');

    // Get grand total of discount_last(special_discount) from order table
        $special_discount_grand_total = $this->db->select_sum('discount_last')->where_in('order_id',$order_id_array)->get('order')->result()[0]->discount_last;
    
    // Get grand total of item_quantity,extended_price from order_detail table
    $item_quantity_grand_total = 0;
    $extended_price_grand_total = 0;
    $promotional_discount_grand_total = 0;
    foreach ($query_item_group_id->result() as $row_item_group_id_temp) {
        // Get grand total of item_quantity from order_detail table
        $item_quantity_sum_temp = $this->db->select_sum('item_quantity')->where('item_group_id', $row_item_group_id_temp->item_group_id)->where_in('order_id', $order_id_array)->get('order_detail')->result()[0]->item_quantity;
        $item_quantity_grand_total = $item_quantity_grand_total + $item_quantity_sum_temp;
        // Get grand total of extended_price from order_detail table
        $extended_price_sum_temp = $this->db->select_sum('extended_price')->where('item_group_id', $row_item_group_id_temp->item_group_id)->where_in('order_id', $order_id_array)->get('order_detail')->result()[0]->extended_price;
        $extended_price_grand_total = $extended_price_grand_total + $extended_price_sum_temp;
        
        // Get grand total of discount_amount(promotional_discount) from order_detail table
        $discount_amount_sum_temp = $this->db->select_sum('discount_amount')->where('item_group_id', $row_item_group_id_temp->item_group_id)->where_in('order_id', $order_id_array)->get('order_detail')->result()[0]->discount_amount;
        $promotional_discount_grand_total = $promotional_discount_grand_total + $discount_amount_sum_temp;
    }

    // Show every item_group record as table row
    foreach ($query_item_group_id->result() as $row_item_group_id) {
        // Get item_group_description from item_group table
        $item_group_description = $this->db->select('description')->where('id', $row_item_group_id->item_group_id)->get('item_group')->result()[0]->description;

        // Get total item_quantity from order_detail table
        $item_quantity_sum = $this->db->select_sum('item_quantity')->where('item_group_id', $row_item_group_id->item_group_id)->where_in('order_id', $order_id_array)->get('order_detail')->result()[0]->item_quantity;

        // Get total extended_price from order_detail table
        $extended_price_sum = $this->db->select_sum('extended_price')->where('item_group_id', $row_item_group_id->item_group_id)->where_in('order_id', $order_id_array)->get('order_detail')->result()[0]->extended_price;
        $percent_of_total_temp = (100 * $item_quantity_sum) / $item_quantity_grand_total;
        $percent_of_total = round($percent_of_total_temp, 2);

        // Get total discount_amount from order_detail table
        $discount_amount_sum = $this->db->select_sum('discount_amount')->where('item_group_id', $row_item_group_id->item_group_id)->where_in('order_id', $order_id_array)->get('order_detail')->result()[0]->discount_amount;
        echo '<tr>';
        echo '<td>' . $item_group_description . '</td>';
        echo '<td>' . $item_quantity_sum . '</td>';
        echo '<td>' . round($extended_price_sum,2) . '</td>';
        echo '<td>' . round($percent_of_total,2) . '</td>';
        echo '<td>' . round($discount_amount_sum,2) . '</td>';
        echo '</tr>';
    }
    ?>
    <tr>
        <td>Total</td>
        <td><?php echo round($item_quantity_grand_total,2); ?></td>
        <td><?php echo round($extended_price_grand_total,2); ?></td>
        <td>100%</td>
        <td></td>
    </tr>
    <?php
    $tax_grand_total_temp = ($extended_price_grand_total * 15) / 100;
    $tax_grand_total = round($tax_grand_total_temp, 2);
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>(+)Sales Volume</td>
        <td><?php echo round($extended_price_grand_total,2); ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>(+)Tax Total(15%)</td>
        <td><?php echo $tax_grand_total; ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>(-)Promotional Discount Amount</td>
        <td><?php echo round($promotional_discount_grand_total,2); ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>(-)Special Discount Amount</td>
        <td><?php echo round($special_discount_grand_total,2); ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Grand Total</td>
        <td><?php echo round(($extended_price_grand_total + $tax_grand_total - $promotional_discount_grand_total - $special_discount_grand_total),2); ?></td>
    </tr>
</table>

