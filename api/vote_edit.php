<?php

//編輯投票
include_once "function.php";

$subjectId = $_POST['subject_id'];
$newSubject = $_POST['subject'];

$subject = find('vote_subjects', $subjectId);

$subject['subject'] = $newSubject;
$subject['type_id']=$_POST['type'];
$subject['multiple'] = $_POST['multiple'];
// $subject['start']=$_POST['start'];
$subject['end'] = $_POST['end'];


save('vote_subjects', $subject);

$opts = all("vote_options", ['subject_id' => $subjectId]);

foreach ($_POST['option'] as $key => $opt) {

    $exist = false;

    foreach ($opts as $ot) {
        if ($ot['id'] == $key) {
            $exist = true;
            break;
        }
    }
    if ($exist) {
        $ot['option'] = $opt;
        save("vote_options", $ot);
    } else {
        $addOption = [
            'option' => $opt,
            'subject_id' => $subjectId
        ];
        save("vote_options", $addOption);
    };
};

to('../back.php?do=vote_all');
?>