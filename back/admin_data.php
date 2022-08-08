<style>
.dataList,
tr,
td {
    padding: 15px 60px 15px 10px;
}

</style>

<h2>管理者資料</h2>

<?php

$sql = "SELECT * FROM `vote_admins` WHERE acc='{$_SESSION['user']}'";

$admin = pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);

?>
<table class="dataList">
    <tr>
        <td>帳號: </td>
        <td><?= $admin['acc']; ?></td>
    </tr>
    <tr>
        <td>密碼: </td>
        <td>*******</td>
    </tr>
    <tr>
        <td>名稱: </td>
        <td><?= $admin['name']; ?></td>
    </tr>
    <tr>
        <td>權限: </td>
        <td> <?= $admin['lv']; ?></td>
    </tr>
</table>

<?php

if ($admin['lv'] != 1) {
    echo "<p class='dataNote'>如需更改資料請洽主要管理者</p>";
}

?>