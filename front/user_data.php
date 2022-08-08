<?php
//非會員無法進入會員中心

$acc = $_SESSION['user'];
$sql = "SELECT * FROM `vote_users` WHERE `acc`='$acc'";

$user = pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);

if (empty($user)) {
    to("./index.php");
} else {

?>
    <div class="edit">
        <h2>會員資料</h2>
        <button class="btn" onclick="location.href='./index.php?do=user_edit'"> 編輯會員資料 </button>
    </div>

    <table class="userData">
        <tr>
            <td>帳號: </td>
            <td><?= $user['acc']; ?></td>
        </tr>
        <tr>
            <td>密碼: </td>
            <td>*******</td>
        </tr>
        <tr>
            <td>暱稱: </td>
            <td><?= $user['name']; ?></td>
        </tr>
        <tr>
            <td>電子信箱: </td>
            <td> <?= $user['email']; ?></td>
        </tr>
        <tr>
            <td>密碼提示(愛吃的水果): </td>
            <td> <?= $user['pw_note']; ?></td>
        </tr>
    </table>
<?php
}
?>