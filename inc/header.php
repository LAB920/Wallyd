<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <title><?= $title . $title_tag ?></title>
</head>
<body>  

    <!-- Wrapper -->
    <div class="app-wrapper">

        <!-- Status bar -->
        <header>
            <!-- Logo -->
            <div class="logo">
                <img src="img/logo-white.png" alt="logo">
            </div>

            <!-- Show profile container when logged in-->
            <?php if (isset($_SESSION['username'])) : ?>
                <div class="profile" id="my-profile">
                    <!-- Avatar -->
                    <div class="avatar">
                        <img src="img/undraw_profile_pic_ic5t.png" alt="avatar">
                    </div>

                    <!-- Profile information -->
                    <div class="info">
                        <span class="user"><?= $_SESSION['username'] ?></span>
                        <span class="company"><?= $_SESSION['company'] ?></span>
                    </div>
                </div>
            <?php endif ?>
        </header>
            
        <!-- Menu -->
        <nav id="menu-bar">
            <!-- Hamburger icon -->
            <div id="hamburger-container" class="header-item">
                <button id="hamburger-button" class="hamburger hamburger--squeeze" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>

            <!-- Menu items -->
            <div class="menu-list" id="menu-list">
                <?php
                    foreach ($menu_items as $item) {
                        echo "<a href=" . str_replace(' ', '', strtolower($item[0])) . " class=\"menu-item\">";
                        echo '<i class="' . $item[1] . '"></i>';
                        echo $item[0] . '</a>';
                    }
                ?>
            </div>
        </nav>