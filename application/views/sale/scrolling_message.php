<style>
    #scroll_design {
        font-size: 30px;
        font-weight: bold;
    } 
</style>
<?php

$scrolling_message = '';
$query_message = $this->db->select('message')->get('scrolling_message');
foreach ($query_message->result() as $row_message) {
    $scrolling_message .= $row_message->message;
    for($space_count=1; $space_count<=10; $space_count++) {
        $scrolling_message .= '&nbsp;';
    }
}
?>

<marquee id="scroll_design"><?php echo $scrolling_message; ?></marquee>

