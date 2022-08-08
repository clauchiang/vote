<?php

//刪除分類
include_once "function.php";

$id=$_GET['id'];

$sql="DELETE FROM `vote_types` WHERE `id`='$id'";

pdo()->exec($sql);

to('../back.php?do=type_add');

?>