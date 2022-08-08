<?php

//修改管理者資料
include_once "function.php";

$sql = "UPDATE `vote_admins`
        SET `pw`='{$_POST['pw']}',
            `name`='{$_POST['name']}',
            `lv`='{$_POST['lv']}'
        WHERE `id`='{$_POST['id']}'";

pdo()->exec($sql);

to("../back.php?do=admin_all");

?>