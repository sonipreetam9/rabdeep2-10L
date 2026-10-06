<?php

include 'config.php';
session_start();

if (!isset($_SESSION['superid'])) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-width="fullwidth" data-menu-styles="light" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Premium Admin &amp; Dashboard Template">
    <meta name="Author" content="">
    <meta name="keywords" content="">
    <title>Rabdeep MotorsAdmin</title>
    <link rel="icon" href="../images/logo/logo.png" type="image/x-icon">
    <link id="style" href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/icon-fonts/icons.css" rel="stylesheet">
    <link href="assets/libs/node-waves/waves.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/simplebar/simplebar.min.css">
    <link rel="stylesheet" href="assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="assets/libs/%40simonwep/pickr/themes/nano.min.css">
    <link rel="stylesheet" href="assets/libs/%40tarekraafat/autocomplete.js/css/autoComplete.css">
    <link rel="stylesheet" href="assets/libs/choices.js/public/assets/styles/choices.min.css">
    <script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="assets/js/main.js"></script>
    <link rel="stylesheet" href="assets/libs/gridjs/theme/mermaid.min.css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

    <style>
        .alert {
            position: relative;
            padding: 12px 18px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            margin-top: 10px;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
        }

        .fade-out {
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
    </style>

</head>

<body>

    <div id="loader">
        <img src="assets/images/media/loader.svg" alt="">
    </div>
    <!-- END LOADER -->

    <!-- PAGE -->
    <div class="page">

        <header class="app-header sticky" id="header">
            <div class="main-header-container container-fluid">
                <div class="header-content-left">
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="dashboard.php" class="header-logo">
                                <img src="assets/images/logo.png" alt="logo" class="desktop-logo">
                                <img src="assets/images/logo.png" alt="logo" class="toggle-logo">
                                <img src="assets/images/logo.png" alt="logo" class="desktop-dark">
                                <img src="assets/images/logo.png" alt="logo" class="toggle-dark">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link" data-bs-toggle="sidebar"
                            href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon menu-btn" width="32"
                                height="32" fill="#000000" viewBox="0 0 256 256">
                                <path
                                    d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                                </path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon menu-btn-close" width="32"
                                height="32" fill="#000000" viewBox="0 0 256 256">
                                <path
                                    d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <ul class="header-content-right">
                    <li class="header-element header-theme-mode">
                        <a href="javascript:void(0);" class="header-link layout-setting">
                            <span class="light-layout">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <path d="M108.11,28.11A96.09,96.09,0,0,0,227.89,147.89,96,96,0,1,1,108.11,28.11Z"
                                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="16" />
                                </svg>
                            </span>
                            <span class="dark-layout">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <line x1="128" y1="40" x2="128" y2="32" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <circle cx="128" cy="128" r="56" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <line x1="64" y1="64" x2="56" y2="56" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <line x1="64" y1="192" x2="56" y2="200" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <line x1="192" y1="64" x2="200" y2="56" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <line x1="192" y1="192" x2="200" y2="200" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <line x1="40" y1="128" x2="32" y2="128" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <line x1="128" y1="216" x2="128" y2="224" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <line x1="216" y1="128" x2="224" y2="128" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                </svg>
                            </span>
                        </a>
                    </li>

                    <!-- Start::header-element -->
                    <li class="header-element dropdown">
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="me-xl-2 me-0">
                                    <img src="assets/images/faces/2.jpg" alt="img"
                                        class="avatar avatar-sm avatar-rounded">
                                </div>
                                <div class="d-xl-block d-none lh-1">
                                    <span class="fw-medium lh-1">Admin</span>
                                </div>
                            </div>
                        </a>
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                            aria-labelledby="mainHeaderProfile">
                            <li>
                                <div class="py-2 px-3 text-center"> <span class="fw-semibold"> Admin </span>
                                </div>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="dashboard.php"><i
                                        class="ti ti-user text-primary me-2 fs-16"></i>Dashboard</a>
                            </li>
                            <li class="py-2 px-3"><a class="btn btn-primary btn-sm w-100" href="logout.php">Log
                                    Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>

        <?php

        include 'pageside.php';

        ?>