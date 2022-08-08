<?php

//修改會員資料
include_once "function.php";

$sql = "UPDATE `vote_users`
        SET `pw`='{$_POST['pw']}',
            `name`='{$_POST['name']}',
            `email`='{$_POST['email']}',
            `pw_note`='{$_POST['pw_note']}'
        WHERE `id`='{$_POST['id']}'";

pdo()->exec($sql);

to("../index.php?do=user_data");

?>