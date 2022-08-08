<link rel="stylesheet" href="./css/vote.css">

<?php

include_once "./api/function.php";

//非會員無法投票
if (empty($_SESSION['id'])) {

    $error = "vote";
    to("./index.php?userError=$error");

    //檢查是否重複投票
} else {
    $subject = find("vote_subjects", $_GET['id']);

    $opts = all('vote_options', ['subject_id' => $_GET['id']]);

    //計算投票時間是否結束
    $today = strtotime("now");
    $end = strtotime($subject['end']);

    //取出user_id
    $ckUser = $_SESSION['id'];

    //找出該user_id參與過的投票        
    $sqlLog = "SELECT * FROM `vote_logs` WHERE `user_id` ='$ckUser' AND `subject_id` ";
    $userLog = pdo()->query($sqlLog)->fetchAll();
    for ($i = 0; $i < count($userLog); $i++) {

        $voted = $userLog[$i]['subject_id'];
        $id = $userLog[$i]['user_id'];
        if ($ckUser == $id && $voted == $subject['id']) {
            $votedError = "error";
            to("./index.php?voted=$votedError");
        }
    }

    //檢查投票時間
    if (($end - $today) < 0) {

        echo "<h2 class='listTitle'>主題「 " . $subject['subject'] . "」的投票已結束</h2>";

        echo "<div class='btns'>";
        echo "<a href='./index.php'><button class='btn'>回首頁</button></a>";
        echo "<a href='?do=vote_result&id=" . $subject['id'] . "'><button class='btn'>查看結果</button></a>";
        echo "</div>";
    } else {

        if ($subject['multiple'] == 0) {
?>
            <h1 class="listTitle"><?= $subject['subject']; ?></h1>
        <?php
        } else {
        ?>
            <h1 class="listTitle"><?= $subject['subject']; ?> (可複選)</h1>
        <?php
        }
        ?>

        <form action="./api/vote.php" method="POST">

            <?php
            foreach ($opts as $opt) {
            ?>

                <div class="voteList">
                    <?php
                    if ($subject['multiple'] == 0) {
                    ?>
                        <input type="radio" name="opt" value="<?= $opt['id']; ?>">
                    <?php
                    } else {
                    ?>
                        <input type="checkbox" name="opt[]" value="<?= $opt['id']; ?>">
                    <?php
                    }
                    ?>
                    <?= $opt['option']; ?>
                </div>
            <?php
            }
            ?>

            <div class="btnS">
                <button type="submit" value="投票" class="btn">投票</button>
                <button type="reset" value="重置" class="btn">重置</button>
                <button type="button" value="取消投票" onclick="location.href='index.php'" class="btn">取消投票</button>
            </div>

        </form>
<?php
    }
}
?>