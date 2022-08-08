<?php
include_once "./api/function.php"
?>

<div>
    <div class="order">
        <?php

        if (isset($_GET['type']) && $_GET['type'] == 'asc') {
        ?>
            <div>依熱門度排序<a href='?do=vote_now&order=total&type=desc'> ▲ </a></div>
        <?php
        } else {
        ?>
            <div>依熱門度排序<a href='?do=vote_now&order=total&type=asc'> ▼ </a></div>
        <?php
        }
        ?>
        <?php

        if (isset($_GET['type']) && $_GET['type'] == 'asc') {
        ?>
            <div>依時間排序<a href='?do=vote_now&order=end&type=desc'> ▲ </a></div>
        <?php
        } else {
        ?>
            <div>依時間排序<a href='?do=vote_now&order=end&type=asc'> ▼ </a></div>
        <?php
        }
        ?>
    </div>

    <h2 class="listTitle">進行中的投票</h2>

    <?php

    $orderStr = '';

    if (isset($_GET['order'])) {
        $_SESSION['order']['col'] = $_GET['order'];
        $_SESSION['order']['type'] = $_GET['type'];

        if ($_GET['order'] == 'remain') {
            $orderStr = " ORDER BY DATEDIFF(`end`,now()) {$_SESSION['order']['type']}";
        } else {
            $orderStr = " ORDER BY `{$_SESSION['order']['col']}` {$_SESSION['order']['type']}";
        }
    }

    $subjects = all('vote_subjects', $orderStr);
    $types = all('vote_types');

    ?>
    <div class="list">
        <?php
        foreach ($subjects as $subject) {

            //判斷投票是否結束
            $today = strtotime("now");
            $end = strtotime($subject['end']);
            if (($end - $today) > 0) {

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
                                            <a href="?do=vote&id=<?= $subject['id']; ?>"><button class="listBtn">來去投票</button></a>
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
        ?>
    </div>
</div>