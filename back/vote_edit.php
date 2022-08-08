<style>
    .opts {
        display: flex;
        justify-content: left;
        align-items: center;
    }

    input {
        border: none;
        padding: 10px;
        margin: 10px;
        font-size: 20px;
    }

    select {
        border: none;
        padding: 10px;
        margin: 15px 10px;
    }

    #selector {
        display: flex;
        align-items: center;
    }

    #selector>input {
        width: 25px;
        height: 25px;
        margin-left: 0px;
        margin-right: 10px;
    }

    #selector>label{
        margin-right: 20px;
    }

    .add-btn {
        font-size: 30px;
        border: none;
        background-color: whitesmoke;
        cursor: pointer;
    }

    .btn {
        margin-top: 50px;
        margin-left: 360px;
    }

    .types,
    .start,
    .end,
    #selector {
        padding: 10px 0;
    }
</style>

<h1>編輯投票</h1>

<?php

$id = $_GET['id'];
$subj = find('vote_subjects', $id);

$opts = all('vote_options', ['subject_id' => $id]);

?>

<form action="./api/vote_edit.php" method="post">

    <div class="voteList">

        <div>
            <label for="subject">投票主題</label>
            <input type="text" name="subject" id="subject" value="<?= $subj['subject']; ?>">
            <button type="button" class="add-btn" onclick="addFun()"> + </button>
            <input type="hidden" name="subject_id" value="<?= $subj['id']; ?>">
        </div>

        <div class="types">
            主題分類:
            <select name="type" id="type">

                <?php
                $types = all("vote_types");
                foreach ($types as $type) {

                    if ($subj['type_id'] == $type['id']) {
                ?>
                        <option value="<?= $type['id'] ?>" selected>
                            <?= $type['name']; ?>
                        </option>
                    <?php
                    } else {
                    ?>
                        <option value="<?= $type['id'] ?>">
                            <?= $type['name']; ?>
                        </option>
                <?php
                    }
                }
                ?>

            </select>
        </div>

        <div class="start">
            <label for="start">開始時間:</label>
            <?= $subj['start']; ?>
        </div>

        <div class="end">
            <label for="end">結束時間:</label>
            <input type="date" name="end" id="end" value="<?= $subj['end']; ?>">
        </div>


        <div id="selector">
            <input type="radio" name="multiple" value="0" <?= ($subj['multiple'] == 0) ? 'checked' : ''; ?>>
            <label>單選</label>
            <input type="radio" name="multiple" value="1" <?= ($subj['multiple'] == 1) ? 'checked' : ''; ?>>
            <label>複選</label>
        </div>

        <div id="options">
            <?php
            foreach ($opts as $opt) {
            ?>
                <div class="opts">
                    <label>選項: </label>
                    <input type="text" name="option[<?= $opt['id']; ?>]" value="<?= $opt['option']; ?>">
                    <div class="del" onclick="location.href='?do=opt_del&table=vote_options&id=<?= $opt['id']; ?>&subject_id=<?= $opt['subject_id']; ?>'">X</div>
                </div>
            <?php
            };
            ?>
        </div>

        <button type="submit" value="修改" class="btn">修改</button>

    </div>

</form>

<script>
    //增加選項
    function addFun() {

        //grand parent
        let options = document.getElementById('options')

        //parent
        let opts = document.createElement('div');
        opts.setAttribute('class', 'opts');

        //opts下的label
        let lab = document.createElement('label');
        let labW = document.createTextNode('選項: ');
        lab.appendChild(labW);

        //opts下的input
        let inp = document.createElement('input')
        inp.setAttribute('type', 'text')
        inp.setAttribute('name', 'option[]')

        //opts下的del
        let del = document.createElement('div')
        del.setAttribute('onclick', 'delFun(this)')
        del.setAttribute('class', 'del')
        //刪除用的x
        let delX = document.createTextNode('X')
        del.appendChild(delX)

        //在opts下增加label input div
        opts.appendChild(lab);
        opts.appendChild(inp);
        opts.appendChild(del);

        //在options增加整個opts
        options.appendChild(opts)

    }

    //刪除選項
    function delFun(element) {
        element.parentNode.parentNode.removeChild(element.parentNode)
    }
</script>