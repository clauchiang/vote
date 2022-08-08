<style>
    .voteBox {
        width: 1200px;
        margin: 0 auto;
        margin-bottom: 10px;
    }

    .listTitle{
        padding-top: 50px;
    }

    .voteBox>h2,
    h4 {
        margin: 20px 10px;
    }

    .voteResult {
        max-width: 1200px;
        margin-bottom: 60px;
        margin-top: 60px;
    }

    .voteResult,
    tr,
    td {
        border: none;
        border-collapse: collapse;
        padding: 0;
    }

    .percent {
        width: 850px;
        display: flex;
        align-items: center;
        border: none;
        padding: 10px 0;
    }

    .percent>* {
        margin-right: 10px;
    }

    .op {
        width: 200px;
        padding: 10px 0;
        padding-left: 10px;
    }

    .num {
        width: 150px;
        padding: 10px 0;
        padding-left: 10px;
    }

    .per {
        width: 650px;
    }

    tr:nth-child(1) {
        font-weight: bold;
    }

    #crown {
        margin-left: 20px;
        color: goldenrod;
        font-size: 20px;
        animation: blink 1.5s step-end infinite;
    }

    @keyframes blink {

        from,
        to {
            color: transparent
        }

        50% {
            color: goldenrod
        }

        ;
    }
</style>

<?php

include_once "./api/function.php";

$subject = find("vote_subjects", $_GET['id']);

$opts = all("vote_options", ['subject_id' => $_GET['id']]);

//總票數(複選用)
$totals = 0;

?>
<div class="voteBox">

    <h2 class="listTitle"><?= $subject['subject']; ?></h2>

    <h4>總投票人數:<?= $subject['total']; ?></h4>

    <table class="voteResult">

        <tr>
            <td class="op">選項</td>
            <td class="num">票數</td>
            <td class="per">比例</td>
        </tr>

        <?php

        foreach ($opts as $opt) {

            //計算投票數而不是人數
            $totals = $totals + $opt['total'];
        }

        $start =$subject['start'];
        $end =$subject['end'];

        echo "<h4>總票數:" . $totals . "</h4>";
        echo "<h4>投票期間: $start ~ $end</h4>";

        foreach ($opts as $opt) {

            $total = ($subject['total'] == 0) ? 1 : $subject['total'];
            $totals = (($totals + $opt['total']) == 0) ? 1 : $totals;

            //判斷是否為多選題
            if ($subject['multiple'] == 1) {

        ?>
                <tr>
                    <td class="op"><?= $opt['option']; ?></td>
                    <td class="num"><?= $opt['total']; ?></td>

                    <?php
                    $percent = round((($opt['total'] / $totals) * 100), 1);

                    if ($percent > 30) {
                    ?>
                        <td class="percent">
                            <div style="display:inline-block;height:24px;background:#CD212A;width:<?= 7 * $percent; ?>px;"></div>
                            <?= $percent; ?> %
                            <i class="fa-solid fa-crown" id="crown"></i>
                        </td>
                    <?php
                    } else {
                    ?>
                        <td class="percent">
                            <div style="display:inline-block;height:24px;background:#34568B;width:<?= 7 * $percent; ?>px;"></div>
                            <?= $percent; ?> %
                        </td>
                </tr>
            <?php
                    }
                } else {
            ?>
            <tr>
                <td class="op"><?= $opt['option']; ?></td>
                <td class="num"><?= $opt['total']; ?></td>

                <?php

                    $percent = round((($opt['total'] / $total) * 100), 1);

                    if ($percent > 30) {
                ?>
                    <td class="percent">
                        <div style="display:inline-block;height:24px;background:#CD212A;width:<?= 7 * $percent; ?>px;"></div>
                        <?= $percent; ?> %
                        <i class="fa-solid fa-crown" id="crown"></i>
                    </td>
                <?php
                    } else {
                ?>

                    <td class="percent">
                        <div style="display:inline-block;height:24px;background:#34568B;width:<?= 7 * $percent; ?>px;"></div>
                        <?= $percent; ?> %
                    </td>
            </tr>
<?php
                    }
                }
            }

?>
    </table>

    <button class="btn" onclick="location.href='index.php'">回首頁</button>

</div>