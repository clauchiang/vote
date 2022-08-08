<?php

//新增分類
include_once "function.php";

$name=$_POST['name'];

$sql="SELECT * FROM `vote_types` WHERE `name`='$name'";

$type=pdo()->query($sql)->fetch();

if(!empty($type)){

    $error = "error";

    to("../back.php?do=type_add&error=$error");

}else{

    save('vote_types',['name'=>$_POST['name']]);
    
    to("../back.php?do=type_add");
}

?>
