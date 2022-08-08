<?php

//刪除選項
include_once "function.php";

$table=$_GET['table'];

$id=$_GET['id'];

$subject=$_GET['subject_id'];

del($table, $id);

to("../back.php?do=vote_edit&id={$subject}");

?>