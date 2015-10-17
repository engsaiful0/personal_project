<?php $this->load->view('manager/common/header_manager'); ?>
  
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
  
<?php $this->load->view('manager/common/footer_manager'); ?>

