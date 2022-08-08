<?php

//帳號重複警告
if (!empty($_GET['repeat'])) {

?>
    <script>
        Swal.fire({
            title: '帳號重複',
            text: '請重新輸入',
            icon: 'error',
            confirmButtonColor: '#34568B'
        })
    </script>

<?php
}
?>
<div class="mainReg">
    <h1>會員註冊</h1>
    <form action="./api/user_register.php" method="post">

        <div class="text">

            <!-- 帳號 -->
            <p>
                <label for="acc" id="accLabel"><i class="fa-solid fa-user"></i>&nbsp; 帳號</label>
            </p>
            <p>
                <input type="text" name="acc" id="acc" placeholder="請輸入帳號" required>
            </p>

            <!-- 密碼 -->
            <p>
                <label for="pw" id="pwLabel"><i class="fa-solid fa-key"></i>&nbsp; 密碼</label>
                <i id="show"><i class="fa-solid fa-eye-slash"></i></i>
            </p>
            <p>
                <input type="password" name="pw" id="pw" placeholder="請輸入密碼" required>
            </p>

            <!-- 暱稱 -->
            <p>
                <label for="name" id="nameLabel"><i class="fa-solid fa-signature"></i>&nbsp; 暱稱</label>
            </p>
            <p>
                <input type="text" name="name" id="name" placeholder="請輸入暱稱" required>
            </p>

            <!-- 電子信箱 -->
            <p>
                <label for="email" id="emailLabel"><i class="fa-solid fa-envelope"></i>&nbsp; 電子信箱</label>
            </p>
            <p>
                <input type="email" name="email" id="email" placeholder="請輸入電子信箱" required>
            </p>

            <!-- 密碼提示 -->
            <p>
                <label for="pw_note" id="pw_noteLabel"><i class="fa-brands fa-apple"></i>&nbsp; 密碼提示 </label>
                (在忘記密碼時提供給系統驗證帳號之使用)
            </p>
            <p>
                <input type="text" name="pw_note" id="pw_note" placeholder="請輸入您愛吃的水果" required>
            </p>
        </div>

        <div class="buttons">
            <input type="submit" value="註冊" class="button">
            <input type="reset" value="重置" class="button">
        </div>

    </form>
</div>
<script src="./js/pw.js"></script>