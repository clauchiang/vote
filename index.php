<?php
include_once "./api/function.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>毛爪子問卷中心</title>
    <link rel="icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/searchBtn.css">
    <link rel="stylesheet" href="./css/topBtn.css">
    <link rel="stylesheet" href="./css/slide.css">

</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="./js/top.js"></script>
    <script src="./js/slide.js"></script>
    <!-- <script src="https://www.gstatic.com/charts/loader.js"></script> -->

    <button onclick="topFun()" id="topBtn"><i class="fa-solid fa-angle-up" title="Top"></i></button>
    <button onclick="bottomFun()" id="bottomBtn"><i class="fa-solid fa-angle-down" title="Down"></i></i></button>

    <header class="header">
        <?php
        if (isset($_SESSION['user'])) {
            include_once "./layout/front_nav.html";
        } else {
            include_once "./layout/front_nav_guest.html";
        }
        ?>
    </header>
    <div class="banner">
        <?php
        if (isset($_SESSION['user'])) {
            include_once "./layout/banner.html";
        } else {
            include_once "./layout/banner_guest.html";
        }
        ?>
    </div>
    <div class="content">

        <?php
        //投票成功
        if (!empty($_GET['success'])) {

        ?>
            <script>
                Swal.fire({
                    title: '投票成功',
                    icon: 'success',
                    confirmButtonColor: '#34568B'
                })
            </script>

        <?php
        }
        ?>

        <?php
        //重複投票警告
        if (!empty($_GET['voted'])) {
        ?>
            <script>
                Swal.fire({
                    title: '該主題已經投過票',
                    text: '請勿重複投票',
                    icon: 'error',
                    confirmButtonColor: '#34568B'
                })
            </script>

        <?php
        }
        ?>

        <?php
        //非會員投票警告
        if (!empty($_GET['userError'])) {
        ?>
            <script>
                Swal.fire({
                    title: '非會員無法投票',
                    text: '請先登入或是註冊一個帳號',
                    icon: 'error',
                    confirmButtonColor: '#34568B'
                })
            </script>

        <?php
        }
        ?>

        <?php
        //搜尋為空
        if (!empty($_GET['empty'])) {
        ?>
            <script>
                Swal.fire({
                    title: '請輸入欲搜尋的主題',
                    icon: 'info',
                    confirmButtonColor: '#34568B'
                })
            </script>

        <?php
        }
        ?>

        <?php

        if (isset($_GET['do'])) {
            $file = './front/' . $_GET['do'] . ".php";
        }
        if (isset($file) && file_exists($file)) {
            include $file;
        } elseif (isset($_GET['search'])) {
            include "./front/vote_search.php";
        } else {
            include "./front/vote_list.php";
        }
        ?>
    </div>

    <footer class="footer">
        <?php
        include_once "./layout/footer.html";
        ?>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
</body>

</html>