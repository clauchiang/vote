<style>
    .btn {
        margin: 10px 20px;
    }
</style>

<?php

if ($_SESSION['lv'] != "1") {

    echo "<h2>權限不足，請回到上一頁</h2>";
    echo "<a href='back.php'><button class='btn'>回上一頁</button></a>";
} else {

    $admin = find("vote_admins", $_GET['id']);

?>
    <div class="delBox">

        <div class="confirm">

            <h2>確定要刪除管理者「<?= $admin['name']; ?>」嗎?</h2>

            <div class="btns">
                <button class="btn" id="delBtn" onclick="location.href='./api/admin_del.php?id=<?= $_GET['id']; ?>'">確定刪除</button>
                <button class="btn" onclick="location.href='back.php?do=admin_all'">取消</button>
            </div>

        </div>
    </div>
<?php
}
?>