<?php
if ($this->session->userdata('admin_logged_in')) {
    $this->load->view('admin/common/header_admin');
} else {
    $this->load->view('manager/common/header_manager');
}
?>

<style>
    /*Only print the Report Result section*/
    @media print {
        body * {
            visibility: hidden;
        }
        #report_result, #report_result * {
            visibility: visible;
            overflow: visible;
        }
        #report_result {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>

<iframe onload="from_calendar()" style="display: none;"></iframe>
<iframe onload="to_calendar()" style="display: none;"></iframe>

<form action="<?php echo site_url('manager/comparison/day_and_item_group_comp_excel');?>" method="post" target="_blank">
    <table>
    <tr>
        <td>From Date: </td>
        <td>
            <input type="text" name="from_date" id="from_date" />
        </td>
    </tr>
    <tr>
        <td>To Date: </td>
        <td>
            <input type="text" name="to_date" id="to_date" />
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <button id="report" type="button" class="btn">Report</button>
        </td>
    </tr>
</table>
<div id="report_result">
    
</div>
<button id="excel_export" type="submit" class="btn" value="execl_export" name="excel_export">Export to Excel</button>
</form>

<?php
if ($this->session->userdata('admin_logged_in')) {
    $this->load->view('admin/common/footer_admin');
} else {
    $this->load->view('manager/common/footer_manager');
}
?>

<script>
    function from_calendar() {
//        $.noConflict();
        $(function () {
            $("#from_date").datepicker({
                dateFormat: "dd-mm-yy"
            });
        });
    }

    function to_calendar() {
//                $.noConflict();
        $(function () {
            $("#to_date").datepicker({
                dateFormat: "dd-mm-yy"
            });
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#report").click(function () {
            from_date = $('#from_date').val();
            to_date = $('#to_date').val();
            $.post("<?php echo site_url('manager/comparison/day_and_item_group_comp_result'); ?>",
                    {
                        from_date: from_date,
                        to_date: to_date
                    },
            function (data, status) {
                $('#report_result').html(data);
            });
        });
});
</script>