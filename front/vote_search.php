<?php

include_once "./api/function.php";

if (empty($_GET['search'])) {

    $error = 'error';
    to("?empty=$error");
} else {
    $search = $_GET['search'];
    $searchSubj = '%' . $search . '%';

    $sql = "SELECT * FROM `vote_subjects` WHERE `subject` LIKE '$searchSubj' ";
    $find = pdo()->query($sql)->fetchAll();
    $types = all('vote_types');

    echo "<h2 class='listTitle'>「" . $search . "」的搜尋結果</h2>";

    //是否有該主題的投票
    if (!empty($find)) {

        foreach ($find as $subject) {

            //隱藏顯示投票
            if ($subject['hidden'] == 1) {

                //隱藏的投票也是顯示查無相關主題
                echo "<p class='note'>查無相關主題投票，請重新輸入</p>";
            } else {

                //找出分類
                foreach ($types as $type) {

                    if ($subject['type_id'] == $type['id']) {

?>
                        <div class="list">
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
                        </div>
<?php
                    }
                }
            }
        }
    } else {
        echo "<p class='note'>查無相關主題投票，請重新輸入</p>";
    }
}
?>