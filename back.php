<?php
include_once "./api/function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>毛爪子問卷中心 |後台管理系統</title>
    <link rel="icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/back.css">
    <link rel="stylesheet" href="./css/hiddenBtn.css">
    <link rel="stylesheet" href="./css/topBtn.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.18/dist/sweetalert2.all.min.js"></script>
    <script src="./js/top.js"></script>

    <?php

    // 判斷是否為管理者帳號 若不是跳轉至首頁
    $acc = $_SESSION['user'];
    $sql = "SELECT * FROM `vote_admins` WHERE `acc`='$acc'";

    $admin = pdo()->query($sql)->fetch();

    if (empty($admin)) {
        to("./index.php");
    } else {

    ?>

        <button onclick="topFun()" id="topBtn"><i class="fa-solid fa-angle-up" title="Top"></i></button>
        <button onclick="bottomFun()" id="bottomBtn"><i class="fa-solid fa-angle-down" title="Down"></i></i></button>

        <header class="header">

            <?php
            // 判斷是否為主要管理者
            if ($_SESSION['lv'] == "1") {
                include_once "./layout/back_nav_main.html";
            } else {
                include_once "./layout/back_nav_other.html";
            }
            ?>
        </header>

        <div class="banner" onclick="location.href='back.php'">
            <?php
            include_once "./layout/back_banner.html";
            ?>
        </div>

        <div class="content">
            <?php

            //重複警告
            if (!empty($_GET['error'])) {

            ?>
                <script>
                    Swal.fire({
                        title: '分類名稱已重複',
                        text: '請重新輸入',
                        icon: 'error',
                        confirmButtonColor: '#34568B'
                    })
                </script>
            <?php
            }
            //帳號重複警告
            if (!empty($_GET['repeat'])) {
            ?>
                <script>
                    Swal.fire({
                        title: '帳號已重複',
                        text: '請重新輸入',
                        icon: 'error',
                        confirmButtonColor: '#34568B'
                    })
                </script>
            <?php
            }
            if (!empty($_GET['time'])) {
            ?>
                <script>
                    Swal.fire({
                        title: '時間設定錯誤',
                        icon: 'error',
                        confirmButtonColor: '#34568B'
                    })
                </script>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['do'])) {
                $file = "./back/" . $_GET['do'] . ".php";
            }
            if (isset($file) && file_exists($file)) {
                include $file;
            } else {

                echo "<div class='welcome'>歡迎登入 " ;
                echo "<a href='?do=admin_data' class='adminWel'>" .$_SESSION['name'] ."</a>";
                echo "</div>";
            }
            ?>

        </div>

        <footer class="footer">
            <?php
            include_once "./layout/footer.html";
            ?>
        </footer>

    <?php
    }
    ?>

</body>

</html>