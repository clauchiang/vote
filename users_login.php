<?php
include_once "./api/function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>毛爪子問卷中心 |會員登入</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body oncontextmenu="return false">

<!-- <body> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.18/dist/sweetalert2.all.min.js"></script>

    <header class="header">
        <?php
        include_once "./layout/front_nav_login.html";
        ?>
    </header>

    <div class="content">

        <?php

        //判斷是否登入 避免已經登入還需要重複輸入帳號密碼
        if (isset($_SESSION['user'])) {
            to("./index.php");
        } else {

            //判斷要載入哪個網頁
            if (isset($_GET['do'])) {
                $file = 'member/' . $_GET['do'] . '.php';
            }

            if (isset($file) && file_exists($file)) {
                include $file;
            } else {
                include_once "./member/login.php";
            }

            //註冊成功提示
            if (!empty($_GET['register'])) {

        ?>
                <script>
                    Swal.fire({
                        title: '註冊成功',
                        icon: 'success',
                        confirmButtonColor: '#34568B'
                    })
                </script>

            <?php
            }
            ?>

            <?php

            //密碼重設
            if (!empty($_GET['reset'])) {

            ?>
                <script>
                    Swal.fire({
                        title: '密碼重設成功',
                        text: '請重新登入',
                        icon: 'success',
                        confirmButtonColor: '#34568B'
                    })
                </script>

        <?php
            }
        }
        ?>
    </div>

    <footer class="footer">
        <?php
        include_once "./layout/footer.html";
        ?>
    </footer>

</body>

</html>