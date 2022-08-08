<h2>編輯分類</h2>
<?php

$id = $_GET['id'];

$sql = "SELECT * FROM `vote_types` WHERE id='$id'";
$type = pdo()->query($sql)->fetch();

?>
<form action="./api/type_edit.php" method="post">

    <table class="dataList">

        <!-- 分類名稱 -->
        <tr>
            <td>
                分類名稱
            </td>
            <td>
                <input type="text" name="name" value="<?= $type['name']; ?>" required>
            </td>
        </tr>

    </table>

    <div class="editBtn">
        <input type="hidden" name="id" value="<?= $type['id']; ?>">
        <input type="submit" value="送出" class="btn">
        <input type="reset" value="重置" class="btn">
    </div>

</form>