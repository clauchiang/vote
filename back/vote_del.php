<?php

$subj = find("vote_subjects", $_GET['id']);

?>
<div class="delBox">

    <div class="confirm">

        <h2>確定要刪除「<?= $subj['subject']; ?>」嗎?</h2>

        <div class='btns'>
            <button class="btn" id="delBtn" onclick="location.href='./api/vote_del.php?table=vote_subjects&id=<?= $_GET['id']; ?>'">刪除</button>
            <button class="btn" onclick="location.href='back.php?do=vote_all'">取消</button>
        </div>

    </div>

</div>