<?php
if ($this->session->userdata('admin_logged_in')) {
    $this->load->view('admin/common/header_admin');
} else {
    $this->load->view('manager/common/header_manager');
}
?>

<?php
foreach ($css_files as $file) {
    echo '<link type="text/css" rel="stylesheet" href="' . $file . '" />';
}

foreach ($js_files as $file) {
    echo '<script src="' . $file . '"></script>';
}
?>

<div>
    <?php echo $output; ?>
</div>

<?php
if ($this->session->userdata('admin_logged_in')) {
    $this->load->view('admin/common/footer_admin');
} else {
    $this->load->view('manager/common/footer_manager');
}
?>

