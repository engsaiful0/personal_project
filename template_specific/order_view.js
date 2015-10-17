// This 'script' section is for 'item_specific' navigation

function item_specific_show(item_group_id) { // show 'items' when user click on 'item_group'
//                document.getElementById('item_specific').innerHTML = item_group;
    item_specific_max(item_group_id);
    item_specific_click = 0;
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("item_specific").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../sale/order/item_specific_show_ajax", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("item_group_id=" + item_group_id);
}

function item_specific_max(item_group_id) { // determine 'total_number_of_items' so that when user click on 'last_navigation' button nothing go forward
//                document.getElementById('item_specific').innerHTML = item_group;
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("max_item_specific").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../sale/order/item_specific_max_ajax", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("item_group_id=" + item_group_id);
}

function item_specific_click_add(item_group_id) { // increment value of 'item_specific_click' when user click on 'next' button 
    if (typeof item_specific_click === 'undefined') {
        item_specific_click = 0; // count started from 'zero'. 'zero' means page one.
    } else {
        max_item_specific = document.getElementById('max_item_specific').innerHTML;
        if (item_specific_click == max_item_specific) {
            // Do not increment 'click_count' because there are no more 'item_group_navigation'
        } else {
            item_specific_click = item_specific_click + 1;
        }
        next_item_specific(item_specific_click, item_group_id);
    }

//                document.getElementById('quantity').innerHTML = click_count;
}

function item_specific_click_subtract(item_group_id) {
    if (typeof item_specific_click === 'undefined') {
        item_specific_click = 0; // count started from 'zero'. 'zero' means page one.
    } else {
        item_specific_click = item_specific_click - 1;
        next_item_specific(item_specific_click, item_group_id);
    }

//                document.getElementById('quantity').innerHTML = item_specific_click;
}

function next_item_specific(item_specific_click, item_group_id) {
//                item_group_and_item_id = document.getElementById('item_group_resend').innerHTML;
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("item_specific").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../sale/order/next_item_specific_ajax", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("item_specific_click=" + item_specific_click + "&item_group_id=" + item_group_id);
}


//This 'script' section is for 'item_group' navigation

function item_group_click_add() {
    if (typeof item_group_click === 'undefined') {
        item_group_click = 0; // count started from 'zero'. 'zero' means page one.
    } else {
        max_item_group = document.getElementById('max_item_group').innerHTML;
        if (item_group_click == max_item_group) {
            // Do not increment 'click_count' because there are no more item_group
        } else {
            item_group_click = item_group_click + 1;
        }
        next_item_group(item_group_click);
    }

//                document.getElementById('quantity').innerHTML = click_count;
}

function item_group_click_subtract() {
    if (typeof item_group_click === 'undefined') {
        item_group_click = 0; // count started from 'zero'. 'zero' means page one.
    } else {
        item_group_click = item_group_click - 1;
        next_item_group(item_group_click);
    }

//                document.getElementById('quantity').innerHTML = item_group_click;
}

function next_item_group(item_group_click) {
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("item_group").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../sale/order/next_item_group_ajax", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("item_group_click=" + item_group_click);
}








// This script section is for 'bill_info' generation
function bill_info(group_and_specific_id) {

    if (typeof (form_submit_counter) == 'undefined') {
        // continue normal function execution
    } else {
        return; //order is saved to database, no further item insertion is allowed.
    }

    // Second modification
    item_and_group_id = group_and_specific_id;
    item_and_group_id_array = item_and_group_id.split("-");
    group_id_receive = item_and_group_id_array[0];
    item_id_receive = item_and_group_id_array[1];
//    $('#javascript_test').html(item_id_receive);
    if ($('#' + item_id_receive + '_quantity').length)
    {
        /* item specific already exists */
        item_quantity_receive = $('#' + item_id_receive + '_quantity').val();
        item_quntity_receive_increase = Number(item_quantity_receive) + 1;
        $('#' + item_id_receive + '_quantity').val(item_quntity_receive_increase);
        extended_price_calculation(item_id_receive);
        bill_serial_no();
        bill_total_cost();
    }
    else
    {
        /* item specific doesn't exist */
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {

//              exist_bill_info = document.getElementById("bill_info").innerHTML;
//              get_bill_info = xmlhttp.responseText;
//              document.getElementById("bill_info").innerHTML = exist_bill_info + get_bill_info;

                $("#bill_info").append(xmlhttp.responseText);

                bill_serial_no();
                bill_total_cost();


            }
        }
        xmlhttp.open("POST", "../sale/order/bill_info_ajax", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("group_and_specific_id=" + group_and_specific_id);
    }
    // End of second modification
}

//This section print 'serial_no'
function bill_serial_no() {
    tr_count = document.getElementById('bill_info').rows.length;
//    document.getElementById('quantity').innerHTML = tr_count;

    var j = 1;
    for (var i = 5; i <= (tr_count - 1); i = i + 3) {
        document.getElementById("bill_info").rows[i].cells[0].innerHTML = j;
//        bill_total_cost(i);
        j++;
    }
}

function bill_total_cost() {
    tr_count_2 = document.getElementById('bill_info').rows.length;

//    document.getElementById('quantity').innerHTML = tr_count;
//document.getElementById('quantity').innerHTML = 'aasdfasdfsdf';

    sub_total = 0;

    for (var k = 6; k <= (tr_count_2 - 1); k = k + 3) {
        input_element_item_price = document.getElementById("bill_info").rows[k].cells[4].innerHTML;
        input_element_item_price_id = $(input_element_item_price).attr('id');
        sub_total_temp = $('#' + input_element_item_price_id).val();
        sub_total_temp_2 = Number(sub_total_temp);
        sub_total = sub_total + sub_total_temp_2;
    }

//    input_element = document.getElementById("bill_info").rows[4].cells[2].innerHTML;
//    input_element_id = $(input_element).attr('id');
//    sub_total_temp = $(input_element_id).val();

//    document.getElementById('quantity_two').innerHTML = sub_total;


    $('#sub_total').val(sub_total);
    $('.sub_total_container').css('display', 'inline');
//    $('#total_payable').val(sub_total);
//    $('.total_payable_container').css('display', 'inline');
    payment_calculate_after();
    vat_calculation();
}

function add_discount_last() {
    discount_last_value_temp = $("#discount_last_enter").val();
    discount_last_value_temp_n = Number(discount_last_value_temp);

    sub_total = $('#sub_total').val();
    sub_total_n = Number(sub_total);

    discount_last_value = (sub_total_n * discount_last_value_temp_n) / 100;


    $('#discount_last').val(discount_last_value);
    discount_last_name = $("#discount_last_enter option:selected").html();
    $('#discount_name_invoice').html(discount_last_name);
    $('#discount_amount_invoice').html(discount_last_value);
    $('.discount_last_container').css('display', 'inline');
    $("#discount_last_hold").dialog("close");
    payment_calculate_after();
    vat_calculation();
}

function add_payment() {
    // Start of Second Modification
    if (!$('input[name="item_name[]"]').length) {
        $('#payment_hold').dialog('close');
        alert('No item added to list.');
        return;
    }

    if (typeof (form_submit_counter) == 'undefined') {
        // continue normal function execution
        payment_amount_value = $('#payment_amount_enter').val();
        $('#payment_amount').val(payment_amount_value);

        payment_method_id_value = $('#payment_method_enter').val();
        $('#payment_method_id').val(payment_method_id_value);
//    payment_method_name = $("#payment_method_enter option:selected").html();
        payment_method_name = $("#payment_method_enter option:selected").text();
        $('#payment_method_name').val(payment_method_name);

        order_type_value = $('#order_type_enter').val();
        $('#order_type').val(order_type_value);

        payment_card_number_value = $('#payment_card_number_enter').val();
        $('#payment_card_number').val(payment_card_number_value);

        card_expire_month_value = $('#card_expire_month_enter').val();
        $('#card_expire_month').val(card_expire_month_value);

        card_expire_year_value = $('#card_expire_year_enter').val();
        $('#card_expire_year').val(card_expire_year_value);

        $('.payment_container').css('display', 'inline');
        $('#payment_hold').dialog('close');

        change_amount_calculation();

        bill_save_fn();
//    send_form_data_to_db();
    } else {
        $('#payment_hold').dialog('close');
        return; //order is saved to database, no further payment modification is allowed.
    }
    // End of Second Modification

}

//function payment_calculate() {
//    sub_total_value = $('#sub_total').val();
//    discount_last_value = $('#discount_last').val();
//    payable = sub_total_value - discount_last_value;
//    $('#payment_amount_enter').val(payable);
//}

function payment_calculate_after() {
    sub_total_value = $('#sub_total').val();
    discount_last_value = $('#discount_last').val();
    payable = sub_total_value - discount_last_value;
    $('#total_payable').val(payable);
}



function vat_calculation() {
    sub_total = $('#sub_total').val();
    $.post("../sale/order/get_vat",
            {
                name: 'abc'
            },
    function (data, status) {
        vat_percentage = data;
        total_vat = (sub_total * vat_percentage) / 100;
        total_vat_decimal = total_vat.toFixed(4);
        $('#vat').val(total_vat_decimal);
        $('.vat_container').css('display', 'inline');

        //total_payable = Number(sub_total) + Number(total_vat);
        total_payable = Number(sub_total);
        $('#total_payable').val(total_payable);
        $('.total_payable_container').css('display', 'inline');
        net_due_calculation();
    });
}

function net_due_calculation() {
    total_payable = $('#total_payable').val();
    discount_last = $('#discount_last').val();
    vat = $('#vat').val();
    //net_due = Number(total_payable) - Number(discount_last);
    net_due = Number(total_payable) + Number(vat) - Number(discount_last);
    net_due_ceil = Math.ceil(net_due);
    $('#net_due').val(net_due_ceil);
    $('#net_due_show').val(net_due_ceil);
    $('#payment_amount_enter').val(net_due_ceil);
    $('.net_due_container').css('display', 'inline');
    $('.invoice_message').css('display', 'inline');
    $('.development_info').css('display', 'inline');
}

function change_amount_calculation() {
    net_due = $('#net_due').val();
    payment_amount = $('#payment_amount').val();
    change_amount = payment_amount - net_due;
    $('#change_amount').val(change_amount);
}

function remove_item_specific(item_specific_id) {
    $('.' + item_specific_id + 'tr').remove();
    bill_serial_no();
    bill_total_cost();
}

function empty_void_instruction_hide() {
//    showid = $('#'+selectid).val();
//    $('#javascript_test').html(showid);

    tr_count_3 = document.getElementById('bill_info').rows.length;


    for (var k = 5; k <= (tr_count_3 - 1); k = k + 3) {
        input_void = document.getElementById("bill_info").rows[k].cells[2].innerHTML;
        input_void_id = $(input_void).attr('id');
        input_void_value = $('#' + input_void_id).val();
        if (input_void_value == "") {
            $('#' + input_void_id).css('display', 'none');
        }
    }

    for (var k = 7; k <= (tr_count_3 - 1); k = k + 3) {
        input_instruction = document.getElementById("bill_info").rows[k].cells[1].innerHTML;
        input_instruction_id = $(input_instruction).attr('id');
        input_instruction_value = $('#' + input_instruction_id).val();
        if (input_instruction_value == "") {
            $('#' + input_instruction_id).css('display', 'none');
        }
    }
}

function send_form_data_to_db() {
// Collecting data from form [plain input element]
    order_number = $("input[name=order_number]").val();
    sub_total = $("input[name=sub_total]").val();
    discount_last = $("input[name=discount_last]").val();
    payment_method_id = $("input[name=payment_method_id]").val();
    payment_amount = $("input[name=payment_amount]").val();
    order_type = $("input[name=order_type]").val();
    order_time = $("input[name=order_time]").val();
    cash_register_id = $("input[name=cash_register_id]").val();
    total_payable = $("input[name=total_payable]").val();
    user_id = $("input[name=user_id]").val();
    vat = $("input[name=vat]").val();
    net_due = $("input[name=net_due]").val();
    change_amount = $("input[name=change_amount]").val();
    payment_card_number = $("input[name=payment_card_number]").val();
    card_expire_month = $("input[name=card_expire_month]").val();
    card_expire_year = $("input[name=card_expire_year]").val();



// Collecting data from form [array input element]
    var item_id = [];
    $("input[name='item_id[]']").each(function () {
        item_id.push($(this).val());
    });

    var item_group_id = [];
    $("input[name='item_group_id[]']").each(function () {
        item_group_id.push($(this).val());
    });

    var instruction_id = [];
    $("select[name='instruction_id[]']").each(function () {
        instruction_id.push($(this).val());
    });

    var item_name = [];
    $("input[name='item_name[]']").each(function () {
        item_name.push($(this).val());
    });

    var item_quantity = [];
    $("input[name='item_quantity[]']").each(function () {
        item_quantity.push($(this).val());
    });

    var sales_price = [];
    $("input[name='sales_price[]']").each(function () {
        sales_price.push($(this).val());
    });

    var discount_amount = [];
    $("input[name='discount_amount[]']").each(function () {
        discount_amount.push($(this).val());
    });

    var extended_price = [];
    $("input[name='extended_price[]']").each(function () {
        extended_price.push($(this).val());
    });


//    alert(item_name);
// Send form data to controller->model
    $.post("../sale/order/save_order",
            {
                // Sending plain input element
                order_number: order_number,
                sub_total: sub_total,
                discount_last: discount_last,
                payment_method_id: payment_method_id,
                payment_amount: payment_amount,
                order_type: order_type,
                order_time: order_time,
                cash_register_id: cash_register_id,
                total_payable: total_payable,
                user_id: user_id,
                vat: vat,
                net_due: net_due,
                change_amount: change_amount,
                payment_card_number: payment_card_number,
                card_expire_month: card_expire_month,
                card_expire_year: card_expire_year,
                // Sending array input element
                item_id: item_id,
                item_group_id: item_group_id,
                instruction_id: instruction_id,
                item_name: item_name,
                item_quantity: item_quantity,
                sales_price: sales_price,
                discount_amount: discount_amount,
                extended_price: extended_price
            },
    function (data, status) {
//        alert("Data: " + data + "\nStatus: " + status);
    });
}



