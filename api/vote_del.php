<?php

//刪除投票
include_once "function.php";

$table=$_GET['table'];
$id=$_GET['id'];

if($table == 'vote_subjects'){
    del($table, $id);
    del('vote_options', ['subject_id'=>$id]);
}else{
    del($table,$id);
}

to("../back.php?do=vote_all");

?>