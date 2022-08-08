<?php
//非會員無法進入會員中心
$acc = $_SESSION['user'];
$sql = "SELECT * FROM `vote_users` WHERE `acc`='$acc'";

$user = pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);

if (empty($user)) {
    to("./index.php");
} else {

?>

    <h2 class="edit">編輯會員資料</h2>

    <form action="./api/user_edit.php" method="post">

        <table class="userData">
            <tr>
                <td>帳號</td>
                <td>
                    <?= $user['acc']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pw" id="pwLabel">密碼</label>
                    <i id="show"><i class="fa-solid fa-eye-slash"></i></i>
                </td>
                <td>
                    <input type="password" name="pw" value="<?= $user['pw']; ?>" required id="pw">
                </td>
            </tr>
            <tr>
                <td>暱稱</td>
                <td>
                    <input type="text" name="name" value="<?= $user['name']; ?>" required id="name">
                </td>
            </tr>
            <tr>
                <td>電子信箱</td>
                <td>
                    <input type="email" name="email" value="<?= $user['email']; ?>" required id="email">
                </td>
            </tr>
            <tr>
                <td>密碼提示</td>
                <td>
                    <input type="text" name="pw_note" value="<?= $user['pw_note']; ?>" required id="pw_note">
                </td>
            </tr>

        </table>

        <div class="editBtn">
            <input type="hidden" name="id" value="<?= $user['id']; ?>">
            <input type="submit" value="送出" class="btn">
            <input type="reset" value="重置" class="btn">
        </div>

    </form>
<?php
}
?>
<script src="./js/pw.js"></script>