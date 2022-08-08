<?php

//重設密碼
include_once "function.php";

$id = $_SESSION['resetId'];
$pw = $_POST['pw'];

$oldSql = "SELECT * FROM vote_users WHERE `id`='$id' ";
$user = pdo()->query($oldSql)->fetch();

if ($user['pw'] == $pw) {

    $error = "<i class='fa-solid fa-triangle-exclamation'></i> 舊密碼與新密碼相同";

    to("../users_login.php?do=reset&wrong=$error");
} else {

    $sql = "UPDATE `vote_users` SET `pw`='$pw' WHERE `id`='$id'";

    pdo()->exec($sql);
    unset($_SESSION['resetId']);
    to("../users_login.php?reset=ok");
}
?>