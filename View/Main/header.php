<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?> | <?php echo APP_NAME;?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=ASSETS?>/css/bootstrap.css">

    <link rel="stylesheet" href="<?=ASSETS?>/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?=ASSETS?>/vendors/fontawesome/all.min.css">
    <link href="<?=ASSETS?>/vendors/fileuploader/filepond.css" rel="stylesheet">
    <link href="<?=ASSETS?>/vendors/fileuploader/filepond-plugin-image-preview.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=ASSETS?>/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=ASSETS?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=ASSETS?>/vendors/choices.js/choices.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>/vendors/DataTables/datatables.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>/css/app.css">
    <link rel="shortcut icon" href="<?=ASSETS?>/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <h2>DSSI</h2>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?php echo $active === 1 ? 'active' : '';?> ">
                            <a href="<?php echo APP_URL.'/home';?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                     
                        <li class="sidebar-item <?php echo $active === 3 ? 'active' : '';?> ">
                            <a href="<?php echo APP_URL.'/results';?>" class='sidebar-link'>
                                <i class="bi bi-file"></i>
                                <span>Results</span>
                            </a>
                        </li>

                       

                        <li class="sidebar-item  has-sub <?php echo $active === 5 ? 'active' : '';?> ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>Account</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item <?php echo $active === 5 ? 'active' : '';?> ">
                                    <a href="<?php echo APP_URL.'/account';?>">Profile</a>
                                </li>
                                <li class="submenu-item ">
                                <a href="<?php echo APP_URL.'/logout';?>">Logout</a>
                                </li>
                                
                            </ul>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        
        <div class="overlay d-none">
        <span class="loader21"></span>
        </div>