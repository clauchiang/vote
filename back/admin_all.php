<style>
    .btn {
        margin: 10px 20px;
    }

    tr:hover:not(:nth-child(1)) {
        background-color: #EDF1FF;
        box-shadow: 0 0 3px 2px #798EA4;
    }

    tr,
    td {
        border: 1px dotted #282D3C;
    }

    tr:nth-child(1) {
        font-weight: bold;
    }
</style>

<?php
if ($_SESSION['lv'] != "1") {

    echo "<h2>權限不足，請回到上一頁</h2>";
    echo "<a href='back.php'><button class='btn'>回上一頁</button></a>";
} else {

?>

    <div>
        <h2>管理者名冊</h2>
        <table class="dataList">
            <tr>
                <td>帳號</td>
                <td>名稱</td>
                <td>權限</td>
                <td></td>
            </tr>

        <?php

        $admins = all('vote_admins');

        foreach ($admins as $admin) {

            echo "<tr'>";

            echo "<td>{$admin['acc']}</td>";

            echo "<td>{$admin['name']}</td>";

            echo "<td>{$admin['lv']}</td>";

            //功能鍵
            echo "<td>";
            echo "<a href='?do=admin_edit&id={$admin['id']}'>";
            echo "<button  class='btn'>編輯</button>";
            echo "</a>";

            //避免主要管理者自己刪除自己的帳號
            if ($admin['lv'] != 1) {

                echo "<a href='?do=admin_del&id={$admin['id']}'>";
                echo "<button  class='btn'>刪除</button>";
                echo "</a>";
            }

            echo "</td>";

            echo "</tr>";
        }
    }

        ?>
        </table>
    </div>