<?php

//新增管理者
include_once "function.php";

$acc = $_POST['acc'];

$ckSql = "SELECT * FROM `vote_admins` WHERE `acc` ='$acc' ";
$ckAcc = pdo()->query($ckSql)->fetchAll();

//檢查帳號是否有重複
if (!empty($ckAcc)) {

    $repeat = "error";
    to("../back.php?do=admin_add&repeat=$repeat");

} else {

    $sql = "INSERT INTO `vote_admins` (`acc`, 
                                `pw`, 
                                `name`, 
                                `lv`
                                ) values(
                                    '{$_POST['acc']}', 
                                    '{$_POST['pw']}', 
                                    '{$_POST['name']}', 
                                    '{$_POST['lv']}')";


    pdo()->exec($sql);
    to("../back.php?do=admin_all");  
}
?>