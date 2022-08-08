<?php
//隱藏投票主題
include_once "function.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `vote_subjects` WHERE `id` ='$id' ";
$subject = pdo()->query($sql)->fetch();

//hidden 預設為顯示
if ($subject['hidden'] == 0) {

    $hiddenSql = "UPDATE `vote_subjects` SET `hidden` = '1' WHERE `id` = '$id' ";

    pdo()->exec($hiddenSql);
} else {

    $hiddenSql = "UPDATE `vote_subjects` SET `hidden` = '0' WHERE `id` = '$id' ";

    pdo()->exec($hiddenSql);
}

to("../back.php?do=vote_all");
?>
