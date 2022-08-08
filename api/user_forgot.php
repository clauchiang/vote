<?php

//忘記密碼
include_once "function.php";

$acc = $_POST['acc'];
$pwNote = $_POST['pw_note'];

$sql = "SELECT * FROM `vote_users` WHERE `acc`='$acc'";

$user = pdo()->query($sql)->fetch();

if (empty($user)) {

    to("../users_login.php?do=forgot&acc=empty");
} elseif ($user['pw_note'] != $pwNote) {

    to("../users_login.php?do=forgot&note=wrong");
} else {

    $_SESSION['resetId'] = $user['id'];

    to("../users_login.php?do=reset");
}
?>