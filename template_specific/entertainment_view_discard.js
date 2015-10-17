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
    xmlhttp.open("POST", "../sale/entertainment/item_specific_show_ajax", true);
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
    xmlhttp.open("POST", "../sale/entertainment/item_specific_max_ajax", true);
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
    xmlhttp.open("POST", "../sale/entertainment/next_item_specific_ajax", true);
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
    xmlhttp.open("POST", "../sale/entertainment/next_item_group_ajax", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("item_group_click=" + item_group_click);
}








// This script section is for 'bill_info' generation
function bill_info(group_and_specific_id) {


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
    xmlhttp.open("POST", "../sale/entertainment/bill_info_ajax", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("group_and_specific_id=" + group_and_specific_id);
}

//This section print 'serial_no'
function bill_serial_no() {
    tr_count = document.getElementById('bill_info').rows.length;
//    document.getElementById('quantity').innerHTML = tr_count;

    var j = 1;
    for (var i = 3; i <= (tr_count - 1); i = i + 2) {
        document.getElementById("bill_info").rows[i].cells[0].innerHTML = j;
//        bill_total_cost(i);
        j++;
    }
}

function bill_total_cost() {
    tr_count_2 = document.getElementById('bill_info').rows.length;

//    document.getElementById('quantity').innerHTML = tr_count;
//document.getElementById('quantity').innerHTML = 'aasdfasdfsdf';

    total_price = 0;

    for (var k = 4; k <= (tr_count_2 - 1); k = k + 2) {
        input_element = document.getElementById("bill_info").rows[k].cells[2].innerHTML;
        input_element_id = $(input_element).attr('id');
        total_price_temp = $('#' + input_element_id).val();
        total_price_temp_2 = Number(total_price_temp);
        total_price = total_price + total_price_temp_2;
    }

//    input_element = document.getElementById("bill_info").rows[4].cells[2].innerHTML;
//    input_element_id = $(input_element).attr('id');
//    total_price_temp = $(input_element_id).val();

//    document.getElementById('quantity_two').innerHTML = total_price;

    $('#total_price').val(total_price);
    $('#total_price_container').css('display', 'inline');
//    payment_calculate_after();
}




function add_staff() {
    staff_value = $("#staff_enter").val();
    staff_info_split = staff_value.split('@#$');
    staff_id_value = staff_info_split[0];
    staff_name = staff_info_split[1];
    
    $('#staff_id').val(staff_id_value);
    $('#staff_name_display').html(staff_name);
    $('#staff_container').css('display', 'inline');
    $("#staff_hold").dialog("close");
}



//function add_discount_last() {
//    discount_last_value = $("#discount_last_enter").val();
//    $('#discount_last').val(discount_last_value);
//    $('#discount_last_container').css('display', 'inline');
//    $("#discount_last_hold").dialog("close");
//    payment_calculate_after();
//}

//function add_payment() {
//    order_type_value = $('#order_type_enter').val();
//    $('#order_type').val(order_type_value);
//
//    payment_method_value = $('#payment_method_enter').val();
//    $('#payment_method').val(payment_method_value);
//
//    payment_amount_value = $('#payment_amount_enter').val();
//    $('#payment_amount').val(payment_amount_value);
//
//    $('#payment_container').css('display', 'inline');
//    $('#payment_hold').dialog('close');
//}

//function payment_calculate() {
//    total_price_value = $('#total_price').val();
//    discount_last_value = $('#discount_last').val();
//    payable = total_price_value - discount_last_value;
//    $('#payment_amount_enter').val(payable);
//}

//function payment_calculate_after() {
//    total_price_value = $('#total_price').val();
//    discount_last_value = $('#discount_last').val();
//    payable = total_price_value - discount_last_value;
//    $('#payment_amount').val(payable);
//}







