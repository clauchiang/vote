<?php

//會員註冊
include_once "function.php";

$acc = $_POST['acc'];

$ckSql = "SELECT * FROM `vote_users` WHERE `acc` ='$acc' ";
$ckAcc = pdo()->query($ckSql)->fetchAll();

if (!empty($ckAcc)) {

    $repeat = "error";
    to("../users_login.php?do=register&repeat=$repeat");
} else {


    $sql = "INSERT INTO `vote_users` (`acc`, 
                                      `pw`,
                                      `name`, 
                                      `email`,  
                                      `pw_note`
                                ) values(
                                    '$acc', 
                                    '{$_POST['pw']}', 
                                    '{$_POST['name']}', 
                                    '{$_POST['email']}', 
                                    '{$_POST['pw_note']}')";

    pdo()->exec($sql);

    $info = "ok";

    to("../users_login.php?register=$info");
}

?>