<style>
    .btn{
        margin: 10px 20px;
    }
</style>

<?php
    if ($_SESSION['lv'] != "1") {

        echo "<h2>權限不足，請回到上一頁</h2>";
        echo "<a href='back.php'><button class='btn'>回上一頁</button></a>";
    } else {

    ?>
     <div class="main">

         <h1>新增管理者</h1>
         <form action="./api/admin_add.php" method="post">

             <div class="text">

                 <!-- 帳號 -->
                 <p>
                     <label for="acc" id="accLabel"><i class="fa-solid fa-user"></i>&nbsp; 帳號</label>
                 </p>
                 <p>
                     <input type="text" name="acc" id="acc" placeholder="請輸入帳號" required>
                 </p>

                 <!-- 密碼 -->
                 <p>
                     <label for="pw" id="pwLabel"><i class="fa-solid fa-key"></i>&nbsp; 密碼</label>
                     <i id="show"><i class="fa-solid fa-eye-slash"></i></i>
                 </p>
                 <p>
                     <input type="password" name="pw" id="pw" placeholder="請輸入密碼" required>
                 </p>

                 <!-- 名稱 -->
                 <p>
                     <label for="name" id="nameLabel"><i class="fa-solid fa-address-card"></i>&nbsp; 名稱</label>
                 </p>
                 <p>
                     <input type="text" name="name" id="name" placeholder="請輸入名稱" required>
                 </p>

                 <!-- 權限 -->
                 <p>
                     <label for="lv" id="lvLabel"><i class="fa-solid fa-unlock-keyhole"></i>&nbsp; 權限</label>
                 </p>
                 <p>
                     <input type="number" name="lv" id="lv" required min="0" placeholder="最高權限為1">
                 </p>

             </div>

             <div class="buttons">
                 <input type="submit" value="送出" class="button">
                 <input type="reset" value="重置" class="button">
             </div>

         </form>
     <?php

    }
        ?>
     </div>
     <script src="./js/pw.js"></script>