<style>
    tr:hover:not(:nth-child(1)) {
        background-color: #EDF1FF;
        box-shadow: 0 0 3px 2px #798EA4;
    }

    tr,
    td {
        border: 1px dotted #282D3C;
    }

    tr:nth-child(1){
        font-weight: bold;
    }
    
</style>

<div>

    <h2>進行中的投票</h2>

    <table class="dataList">

        <tr>
            <td>投票主題</td>
            <td>主題分類</td>
            <td>單/複選</td>
            <td>投票期間</td>
            <td>投票人數</td>
            <td>隱藏/顯示主題</td>
            <td></td>
        </tr>

        <?php

        $subjects = all('vote_subjects');
        foreach ($subjects as $subject) {

            //判斷投票是否結束
            $today = strtotime("now");
            $end = strtotime($subject['end']);

            if (($end - $today) > 0) {

                $remain = floor(($end - $today) / (60 * 60 * 24));

                //投票主題
                echo "<tr>";

                echo "<td>{$subject['subject']}</td>";

                //主題分類
                $types = all('vote_types');
                foreach ($types as $type) {
                    if ($subject['type_id'] == $type['id']) {

                        echo "<td>{$type['name']}</td>";
                    }
                }

                //單複選題
                if ($subject['multiple'] == 0) {

                    echo "<td class='text-center'>單選</td>";
                } else {

                    echo "<td class='text-center'>複選</td>";
                }

                //投票期間
                echo "<td class='text-center'>";
                echo $subject['start'] . "~" . $subject['end'];
                echo "</td>";

                //投票人數
                echo "<td class='text-center'>{$subject['total']}</td>";

                //功能鍵
                echo "<td>";
                //預設為顯示(0)
                if ($subject['hidden'] == 0) {
        ?>
                    <a href='./api/vote_hidden.php?id=<?= $subject['id']; ?>'><button class="hidden">
                            <!--要做的動作是隱藏-->
                            <span class="new">隱藏 </span>

                            <!--目前的狀態是顯示-->
                            <span class="old">顯示</span>
                        </button></a>
                <?php
                } else {
                ?>
                    <a href='./api/vote_hidden.php?id=<?= $subject['id']; ?>'><button class="hidden">
                            <!--要做的動作是顯示-->
                            <span class="new">顯示</span>

                            <!--目前的狀態是隱藏-->
                            <span class="old">隱藏</span>
                        </button></a>
        <?php
                }
                echo "</td>";

                echo "<td>";
                echo "<div class='voteBtn'>";
                echo "<a href='?do=vote_edit&id={$subject['id']}'>";
                echo "<button  class='btn'>編輯</button></a>";

                echo "<a href='?do=vote_del&id={$subject['id']}'>";
                echo "<button  class='btn'>刪除</button></a>";
                echo "</div>";

                echo "</td>";

                echo "</tr>";
            }
        }
        ?>

    </table>

</div>