<h2>忘記密碼</h2>

<table class="listTable">

    <form action="./api/user_forgot.php" method="post">

    
        <tr>
            <td>
                帳號
            </td>
            <td>
                <input type="text" id="accF" name="acc" required placeholder="請輸入帳號">
            </td>
        </tr>
        <tr>
            <td>
                密碼提示(您愛吃的水果)
            </td>
            <td>
                <input type="text" id="pw_noteF" name="pw_note" required placeholder="請輸入您當初設定的答案">
            </td>
            <td>
            <input type="submit" value="送出" class="btn">
            </td>
        </tr>

    </form>

</table>


<?php
if (!empty($_GET['acc'])) {
?>
    <script>
        Swal.fire({
            title: '查無此帳號',
            icon: 'error',
            confirmButtonColor: '#34568B'
        })
    </script>
<?php

} elseif (!empty($_GET['note'])) {
?>
    <script>
        Swal.fire({
            title: '密碼提示錯誤',
            text: '請輸入您當初設定的答案，以供系統驗證',
            icon: 'error',
            confirmButtonColor: '#34568B'
        })
    </script>
<?php
}
?>
<div class="btns">
    <a href="index.php"><button class="btn">回首頁</button></a>
    <a href="users_login.php"><button class="btn">重新登入</button></a>
</div>