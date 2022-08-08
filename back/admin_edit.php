<style>
    /* 資料更改輸入區 */
    #acc,
    #pw,
    #name,
    #lv {
        border: 1px solid lightslategray;
        border-radius: 5px;
    }
</style>

<?php
if ($_SESSION['lv'] != "1") {

    echo "<h2>權限不足，請回到上一頁</h2>";
    echo "<a href='back.php'><button>Go back</button></a>";
} else {

?>
    <h2>編輯管理者資料</h2>

    <?php

    $sql = "SELECT * FROM `vote_admins` WHERE id='{$_GET['id']}'";
    $admin = pdo()->query($sql)->fetch();

    ?>

    <form action="./api/admin_edit.php" method="post">

        <table class="dataList">

            <!-- 帳號 -->
            <tr>
                <td>
                    <label for="acc" id="accLabel"><i class="fa-solid fa-user"></i>&nbsp; 帳號</label>
                </td>
                <td>
                    <?= $admin['acc']; ?>
                </td>
            </tr>

            <!-- 密碼 -->
            <tr>
                <td>
                    <label for="pw" id="pwLabel"><i class="fa-solid fa-key"></i>&nbsp; 密碼</label>
                    <i id="show"><i class="fa-solid fa-eye-slash"></i></i>
                </td>
                <td>
                    <input type="password" name="pw" id="pw" value="<?= $admin['pw']; ?>" required>
                </td>
            </tr>

            <!-- 名稱 -->
            <tr>
                <td>
                    <label for="name" id="nameLabel"><i class="fa-solid fa-address-card"></i>&nbsp; 名稱</label>
                </td>
                <td>
                    <input type="text" name="name" id="name" value="<?= $admin['name']; ?>" required>
                </td>
            </tr>

            <!-- 權限 -->
            <tr>
                <td>
                    <label for="lv" id="lvLabel"><i class="fa-solid fa-unlock-keyhole"></i>&nbsp; 權限</label>
                </td>
                <td>
                    <input type="number" name="lv" id="lv" min="0" value="<?= $admin['lv']; ?>" required>
                </td>
            </tr>

        </table>

        <div class="editBtn">
            <input type="hidden" name="id" value="<?= $admin['id']; ?>">
            <input type="submit" value="送出" class="btn">
            <input type="reset" value="重置" class="btn">
        </div>

    </form>
<?php
}
?>
<script src="./js/pw.js"></script>