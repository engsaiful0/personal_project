<!doctype html>
<html>
    <head>
        <!-- Bootstrap library load start -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'jslib/bootstrap.min.css'; ?>" /> 
        <script src="<?php echo base_url() . 'jslib/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'jslib/jquery.min.js'; ?>"></script>
        <!-- Bootstrap library load end -->

        <!-- Jquery library load start -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'jslib/jquery-ui.css'; ?>" />
        <script src="<?php echo base_url() . 'jslib/jquery-1.10.2.js'; ?>"></script>
        <script src="<?php echo base_url() . 'jslib/jquery-ui.js'; ?>"></script>
        <!-- Jquery library load end -->

        <!-- Main Menu Navigation Bar-->
        <style>
            body {
                width: 960px;
                margin: 0 auto;
            }
            
            ul.admin_menu {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }

            ul.admin_menu li {
                float: left;
            }

            ul.admin_menu a:link, ul.admin_menu a:visited {
                display: block;
                width: 110px;
                font-weight: bold;
                color: #FFFFFF;
                background-color: #98bf21;
                text-align: center;
                padding: 4px;
                text-decoration: none;
                text-transform: uppercase;
            }

            ul.admin_menu a:hover, ul.admin_menu a:active {
                background-color: #7A991A;
            }
            
        </style>

    </head>
    <body>

        <ul class="admin_menu">
            <li><a href="<?php echo site_url().'/admin/entry/teacher_entry'; ?>">Teacher Entry</a></li>
            <li><a href="<?php echo site_url().'/admin/entry/student_entry'; ?>">Student Entry</a></li>
            <li><a href="<?php echo site_url().'/admin/entry/result_entry'; ?>">Result Entry</a></li>
            <li><a href="<?php echo site_url().'/admin/entry/subject_entry'; ?>">Subject Entry</a></li>
            <li><a href="<?php echo site_url().'/admin/update/teacher_update_search'; ?>">Teacher Update</a></li>
            <li><a href="<?php echo site_url().'/admin/update/student_update_search'; ?>">Student Update</a></li>
            <li><a href="<?php echo site_url().'/admin/update/result_update'; ?>">Result Update</a></li>
            <li><a href="<?php echo site_url().'/admin/login/logout'; ?>">Logout</a></li>
            
        </ul>
<br /> <br />




