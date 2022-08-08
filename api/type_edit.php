<?php

//編輯分類
include_once "function.php";

$sql = "UPDATE `vote_types` SET `name`='{$_POST['name']}' WHERE `id`='{$_POST['id']}'";

pdo()->exec($sql);

to("../back.php?do=type_add");

?>