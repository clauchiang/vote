<h2>投票分類</h2>

<table class="dataList">

    <tr>
        <td>
            分類名稱
        </td>
        <td>

        </td>
    </tr>

    <?php
    $types = all('vote_types');
    foreach ($types as $type) {
    ?>

        <tr>
            <td>
                <?= $type['name']; ?>
            </td>
            <td>
                <a href="?do=type_edit&id=<?= $type['id']; ?>"><button class="btn">編輯</button></a>
                <a href="./api/type_del.php?id=<?= $type['id']; ?>"><button class="btn">刪除</button></a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<form action="./api/type_add.php" method="post">
    <table class="dataList">
        <h2>新增分類:</h2>
        <tr>
            <td>
                <input type="text" name="name" id="nameType">
                <input class="btn" type="submit" value="送出">
            </td>
        </tr>

    </table>
</form>