<?php

//投票功能
include_once "function.php";
$acc = $_SESSION['user'];
$sql = "SELECT * FROM `vote_admins` WHERE `acc`='$acc'";

$admin = pdo()->query($sql)->fetch();

//使管理者無法投票
if (!empty($admin)) {

    $error = "vote";
    to("../index.php?error=$error");
} else {

    if (isset($_POST['opt'])) {

        //判斷單複選題
        if (is_array($_POST['opt'])) {

            foreach ($_POST['opt'] as $key => $opt) {

                //找出選項資料
                $option = find("vote_options", $opt);
                $option['total']++;

                save("vote_options", $option);

                if ($key == 0) {

                    $subject = find("vote_subjects", $option['subject_id']);
                    $subject['total']++;
                    save("vote_subjects", $subject);
                }

                $log = [
                    'user_id' => $_SESSION['id'],
                    'subject_id' => $subject['id'],
                    'option_id' => $option['id']
                ];

                save("vote_logs", $log);
            }
        } else {

            //找出選項資料
            $option = find("vote_options", $_POST['opt']);
            $option['total']++;

            save("vote_options", $option);

            //找出主題資料
            $subject = find("vote_subjects", $option['subject_id']);
            $subject['total']++;
            save("vote_subjects", $subject);

            $log = [
                'user_id' => $_SESSION['id'],
                'subject_id' => $subject['id'],
                'option_id' => $option['id']
            ];

            save("vote_logs", $log);
        }

        to("../index.php?do=vote_result&id={$subject['id']}&success=voted");

    } else {

        to("../not_found/index.php");
    }
}
