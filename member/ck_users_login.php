<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php

include_once "../api/function.php";

$acc = $_POST['acc'];
$pw = $_POST['pw'];

$sql = "SELECT count(*) FROM `vote_users` WHERE `acc`='$acc' && `pw`='$pw'";
$ckAcc = pdo()->query($sql)->fetchColumn();

if ($ckAcc) {
    
    $ckUser = ['acc' => $acc];
    $userData=all('vote_users', $ckUser);

    $_SESSION['user']=$acc;
    $_SESSION['id']=$userData[0]['id'];
    to("../index.php");

} else {

    $error = "<i class='fa-solid fa-triangle-exclamation'></i> 帳號或密碼錯誤，請重新輸入";

    to("../users_login.php?do=login&error=$error");
}

?>