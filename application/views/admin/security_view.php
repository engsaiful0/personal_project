<?php $this->load->view('admin/common/header_admin'); ?>

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

<?php $this->load->view('admin/common/footer_admin'); ?>

