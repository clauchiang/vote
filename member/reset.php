<style>
    #pw {
        width: 300px;
        font-size: 20px;
        border: 1px solid lightslategray;
        border-radius: 5px;
        padding: 5px 10px;
    }
</style>

<?php
if (!empty($_SESSION['resetId'])) {
?>

    <h2>重設密碼</h2>

    <table class="listTable">

        <form action="./api/user_reset.php" method="post">
            <tr>
                <td>
                    <?php
                    if (!empty($_GET['wrong'])) {

                        echo "<h4 class='wrong'>" . $_GET['wrong'] . "</h4>";
                    }
                    ?>

                </td>
            </tr>

            <tr>
                <td>
                    <label for="pw">請輸入新密碼</label>
                    <i id="show"><i class="fa-solid fa-eye-slash"></i></i>
                </td>
                <td>
                    <input type="password" name="pw" required id="pw">
                </td>
                <td>
                    <input type="submit" value="送出" class="btn">
                </td>
            </tr>

        </form>

    </table>

<?php
} else {
    to("index.php");
}
?>

<script src="./js/pw.js"></script>