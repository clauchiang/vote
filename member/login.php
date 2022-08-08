<div class="main">
    <h1>會員登入</h1>

    <div class="error">
        <?php

        if (!empty($_GET['error'])) {
            echo "<h4>{$_GET['error']}</h4>";
        }

        ?>
    </div>

    <form action="./member/ck_users_login.php" method="post">

        <div class="text">
            <p>
                <label for="acc" id="accLabel"><i class="fa-solid fa-user"></i>&nbsp; 帳號</label>
            </p>
            <p>
                <input type="text" name="acc" id="acc" placeholder="請輸入帳號" required>
            </p>

            <p>
                <label for="pw" id="pwLabel"><i class="fa-solid fa-key"></i>&nbsp; 密碼</label>
                <i id="show"><i class="fa-solid fa-eye-slash"></i></i>
            </p>
            <p>
                <input type="password" name="pw" id="pw" placeholder="請輸入密碼" required>
            </p>
        </div>

        <div class="buttons">
            <input type="submit" value="登入" class="button">
            <input type="reset" value="重置" class="button">
        </div>

        <div class="register">
            <a href="?do=register">尚未註冊?</a>
            <a href="?do=forgot">忘記密碼?</a>
        </div>

    </form>
</div>
<script src="./js/pw.js"></script>