<?php

//新增投票
include_once "function.php";

$subject = $_POST['subject'];

$addSubject = [
    'subject' => $subject,
    'type_id' => $_POST['type'],
    'start' => $_POST['start'],
    'end' => $_POST['end'],
    'multiple' => $_POST['multiple']
];

//時間參數
$today = strtotime("now");
$start = strtotime($addSubject['start']);
$end = strtotime($addSubject['end']);

//開始時間晚於結束時間或是結束時間晚於今天
if ($start > $end || $end < $today) {

    to("../back.php?do=vote_add&time=error");

} else {

    save('vote_subjects', $addSubject);

    $id = find('vote_subjects', ['subject' => $subject])['id'];

    if (isset($_POST['option'])) {
        foreach ($_POST['option'] as $opt) {
            if ($opt != "") {
                $addOption = [
                    'option' => $opt,
                    'subject_id' => $id
                ];

                save("vote_options", $addOption);
            }
        }
    }

    to('../back.php?do=vote_all');
}
