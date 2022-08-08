<?php

//刪除管理者
include_once "function.php";

$id=$_GET['id'];

$sql="DELETE FROM `vote_admins` WHERE `id`='$id'";

pdo()->exec($sql);

to('../back.php');

?>