<?php

include_once "./api/function.php";


//找出使用者id
$accId = $_SESSION['id'];

//非會員無法進入
if (empty($accId)) {
    to("./index.php");
} else {

    //找出投票紀錄
    $sql = "SELECT DISTINCT `subject_id` FROM `vote_logs` WHERE `user_id`='$accId'";

    $logs = pdo()->query($sql)->fetchAll();

    $types = all('vote_types');
?>

    <h2 class="listTitle">參與過的投票</h2>

    <div class="list">

        <?php
        foreach ($logs as $log) {

            //找出主題id
            $sujId = $log['subject_id'];

            //找出該主題的所有資料
            $subjectSql = "SELECT * FROM `vote_subjects` WHERE `id`='$sujId'";

            $subjects = pdo()->query($subjectSql)->fetchAll();

            foreach ($subjects as $subject) {

                //隱藏顯示投票
                if ($subject['hidden'] == 0) {

                    //找出分類
                    foreach ($types as $type) {
                        if ($subject['type_id'] == $type['id']) {
        ?>

                            <div class="flipCard">
                                <div class="cardInner">
                                    <div class="cardFront">
                                        <h3>主題: <?= $subject['subject']; ?></h3>
                                        <p>分類: <?= $type['name']; ?></p>
                                        <p>結束時間: <?= $subject['end']; ?></p>

                                        <?php
                                        if ($type['name'] == '美食') {
                                            echo  "<img src='./img/food.png' alt='food'>";
                                        } elseif ($type['name'] == '動物') {
                                            echo  "<img src='./img/animal.png' alt='animal'>";
                                        } elseif ($type['name'] == '娛樂') {
                                            echo  "<img src='./img/fun.png' alt='fun'>";
                                        } elseif ($type['name'] == '交通') {
                                            echo  "<img src='./img/transportation.png' alt='transportation'>";
                                        } elseif ($type['name'] == '天氣') {
                                            echo  "<img src='./img/weather.png' alt='weather'>";
                                        } elseif ($type['name'] == '星座命理') {
                                            echo  "<img src='./img/fortune.png' alt='fortune'>";
                                        } elseif ($type['name'] == '運動') {
                                            echo  "<img src='./img/sport.png' alt='sport'>";
                                        } else {
                                            echo  "<img src='./img/other.png' alt='other'>";
                                        }
                                        ?>

                                        <p>投票人數: <?= $subject['total']; ?></p>
                                    </div>
                                    <div class="cardBack">
                                        <div>
                                            <a href="?do=vote_result&id=<?= $subject['id']; ?>"><button class="listBtn">查看結果</button></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
    <?php

                        }
                    }
                }
            }
        }
    }
    ?>
    </div>