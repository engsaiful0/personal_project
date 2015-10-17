<tr class="<?php echo $item_specific_id.'tr'; ?>">
    <td></td>

    <td colspan="3"> 
        <input type="text" name="item_id[]" value="<?php echo $item_specific_id; ?>" hidden />
        <input type="text" name="item_group_id[]" value="<?php echo $item_group_id; ?>" hidden />
        <input type="text" id="<?php echo $item_specific_id . '_itemname' ?>" name="item_name[]" value="<?php echo $result_item->description; ?>" style="width: 330px;" readonly> 
    </td>
    
    <td>
        <select onchange="remove_item_specific(this.value)" id="<?php echo $item_specific_id.'void'; ?>">
            <option value="">Void</option>
            <option value="<?php echo $item_specific_id; ?>">Void It</option>
        </select>
    </td>

</tr>




<tr class="<?php echo $item_specific_id.'tr'; ?>">
    <td></td>

    <td><input type="text" id="<?php echo $item_specific_id . '_salesprice' ?>" name="sales_price[]" value="<?php echo $result_item->sales_price; ?>" oninput="extended_price_calculation(this.id)" style="width: 100px;" readonly /></td>

    <td><input type="text" id="<?php echo $item_specific_id . '_discountamount' ?>" name="discount_amount[]" value="<?php echo (($discount_amount == 0) ? '' : $discount_amount); ?>" oninput="extended_price_calculation(this.id)" style="width: 100px;" readonly /></td>

    <td> 
        <input type="text" id="<?php echo $item_specific_id . '_quantity' ?>" name="item_quantity[]" value="1" onclick="<?php echo 'fn_' . $item_specific_id . '_quantity' . '()'; ?>" onchange="extended_price_calculation(this.id)" style="width: 120px;">

<!--<input type="text" id="<?php // echo $item_specific_id;    ?>" class="ui-keyboard-input ui-widget-content ui-corner-all" aria-haspopup="true" role="textbox">-->

        <iframe onload="<?php echo 'fn_' . $item_specific_id . '_quantity' . '()'; ?>" style="display: none;"></iframe> 

    </td>

    <?php
    $extended_price = (1 * $result_item->sales_price) - $discount_amount;
    ?>

    <td><input type="text" id="<?php echo $item_specific_id . '_extendedprice' ?>" name="extended_price[]" value="<?php echo $extended_price; ?>" style="width: 100px;" readonly /></td>
</tr>




<?php
$query_instruction = $this->db->get('instruction');
?>
<tr class="<?php echo $item_specific_id.'tr'; ?>">
    <td></td>
    <td colspan="4">
        <select name="instruction_id[]" style="background-color: black; width: 330px;color: white; border: none;" id="<?php echo $item_specific_id.'instruction';  ?>">
            <option value="">Instruction</option>
            <?php
            foreach ($query_instruction->result() as $row_instruction) {
                echo '<option value="'.$row_instruction->id.'">'.$row_instruction->description.'</option>';
            }
            ?>
        </select>
    </td>

</tr>

<!--//        <script>';
//        echo '$("#'.$item_specific_id.'")
//	.keyboard({
//		openOn : true,
//		stayOpen : true,
//		layout : "num"
//	})
//	.addTyping();';
//        echo '</script>'-->

<!--<tr>
    <td colspan="6"><input id="100" type="text" hidden="hidden"></td>
<script>
    function <?php // echo 'fn_'.$item_specific_id.'()';     ?> {
    $("#<?php // echo $item_specific_id     ?>")
            .keyboard({
                openOn: true,
                stayOpen: true,
                layout: "num"
            })
            .addTyping();
    }
</script>
</tr>-->
  <!--onclick="<?php // echo 'fn_'.$item_specific_id.'()';     ?>"-->
