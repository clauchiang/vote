<?php

$opt = find("vote_options", $_GET['id']);

?>
<div class="delBox">

    <div class="confirm">

        <h2>確定要刪除選項「<?= $opt['option']; ?>」嗎?</h2>

        <div class='btns'>
            <button class="btn" id="delBtn" onclick="location.href='./api/opt_del.php?table=vote_options&id=<?= $_GET['id']; ?>&subject_id=<?= $_GET['subject_id']; ?>'">刪除</button>
            <button class="btn" onclick="location.href='back.php?do=vote_edit&id=<?= $_GET['subject_id']; ?>'">取消</button>
        </div>

    </div>

</div>