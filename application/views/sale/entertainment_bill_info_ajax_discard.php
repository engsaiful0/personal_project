<tr>
    <td></td>
    
    <td colspan="2"> <input type="text" id="<?php echo $item_specific_id.'_itemname' ?>" name="item_name[]" value="<?php echo $result_item->description; ?>" style="width: 120px;" readonly> </td>
    
    <td colspan="2"> 
        <input type="text" id="<?php echo $item_specific_id.'_quantity' ?>" name="item_quantity[]" value="1" onclick="<?php echo 'fn_' . $item_specific_id . '_quantity' . '()'; ?>" onchange="extended_price_calculation(this.id)" style="width: 120px;">

<!--<input type="text" id="<?php // echo $item_specific_id; ?>" class="ui-keyboard-input ui-widget-content ui-corner-all" aria-haspopup="true" role="textbox">-->
        
<iframe onload="<?php echo 'fn_' . $item_specific_id . '_quantity' . '()'; ?>" style="display: none;"></iframe> 


    </td>
    
</tr>


<tr>
    
    <td><input type="text" id="<?php echo $item_specific_id.'_salesprice' ?>" name="sales_price[]" value="<?php echo $result_item->sales_price; ?>" oninput="extended_price_calculation(this.id)" style="width: 100px;" /></td>
    
    <td><input type="text" id="<?php echo $item_specific_id.'_discountamount' ?>" name="discount_amount[]" value="<?php echo $discount_amount; ?>" oninput="extended_price_calculation(this.id)" style="width: 100px;" /></td>
    
    <?php
    $extended_price = (1 * $result_item->sales_price) - $discount_amount;
    ?>
    
    <td><input type="text" id="<?php echo $item_specific_id.'_extendedprice' ?>" name="extended_price[]" value="<?php echo $extended_price; ?>" style="width: 100px;" /></td>
    
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
    function <?php // echo 'fn_'.$item_specific_id.'()';  ?> {
    $("#<?php // echo $item_specific_id  ?>")
            .keyboard({
                openOn: true,
                stayOpen: true,
                layout: "num"
            })
            .addTyping();
    }
</script>
</tr>-->
  <!--onclick="<?php // echo 'fn_'.$item_specific_id.'()';  ?>"-->
