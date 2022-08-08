<?php
include_once "../api/function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>毛爪子問卷中心 |後台登入</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<!-- <body oncontextmenu="return false"> -->

<body>

    <header class="header">
        <?php
        include_once "../layout/back_nav.html";
        ?>
    </header>

    <div class="content">

        <?php

        //判斷是否登入 避免已經登入還需要重複輸入帳號密碼
        if (isset($_SESSION['user'])) {
            to("../back.php");
        } else {
        ?>
            <div class="main">
                <h1>管理者登入</h1>

                <div class="error">
                    <?php

                    if (!empty($_GET['error'])) {
                        echo "<h4>{$_GET['error']}</h4>";
                    }

                    ?>
                </div>

                <form action="./ck_admins_login.php" method="post">

                    <div class="text">
                        <p>
                            <label for="acc" id="accLabel"><i class="fa-solid fa-user"></i>&nbsp; 帳號</label>
                        </p>
                        <p>
                            <input type="text" name="acc" id="acc" placeholder="請輸入管理者帳號" required>
                        </p>

                        <p>
                            <label for="pw" id="pwLabel"><i class="fa-solid fa-key"></i>&nbsp; 密碼</label>
                            <i id="show"><i class="fa-solid fa-eye-slash"></i></i>
                        </p>
                        <p>
                            <input type="password" name="pw" id="pw" placeholder="請輸入管理者密碼" required>
                        </p>
                    </div>
                    <div class="buttons">
                        <input type="submit" value="登入" class="button">
                        <input type="reset" value="重置" class="button">
                    </div>

                </form>
            </div>
    </div>
<?php
        }
?>

<footer class="footer">
    <?php
    include_once "../layout/footer.html";
    ?>
</footer>

<script src="../js/pw.js"></script>
</body>

</html>