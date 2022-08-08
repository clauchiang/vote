<style>
    .opts {
        display: flex;
        justify-content: left;
        padding: 10px 0;
    }

    input {
        border: none;
        padding: 10px;
        margin: 0 15px;
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

    #selector>label {
        margin-right: 20px;
    }


    .add-btn {
        font-size: 30px;
        border: none;
        background-color: whitesmoke;
        padding-left: 5px;
        cursor: pointer;
    }

    .btn {
        margin-top: 50px;
        margin-left: 360px;
    }

    .types,
    #start,
    #end,
    #selector {
        padding: 10px 0;
    }
</style>

<h1>新增投票</h1>

<form action="./api/vote_add.php" method="post">

    <div class="voteList">
        <div>
            <label for="subject">投票主題:</label>
            <input type="text" name="subject" id="subject">
        </div>

        <div id="options">

            <div class="types">
                主題分類:
                <select name="type" id="type">
                    <?php
                    $types = all("vote_types");
                    foreach ($types as $type) {
                    ?>
                        <option value="<?= $type['id']; ?>">
                            <?= $type['name']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div id="start">
                <label>開始時間: </label>
                <input type="date" name="start">
            </div>

            <div id="end">
                <label>結束時間: </label>
                <input type="date" name="end">
            </div>

            <div id="selector">
                <input type="radio" name="multiple" value="0" checked>
                <label>單選</label>
                <input type="radio" name="multiple" value="1">
                <label>複選</label>
            </div>

            <div class="opts">
                <label>選項: </label>
                <input type="text" name="option[]">
                <!-- <div style="color:rgb(0, 0, 0, 0); width:30px; height:30px;">X</div> -->
                <button type="button" class="add-btn" onclick="addFun()"> + </button>
            </div>

        </div>

        <input type="submit" value="新增" class="btn">

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

        //在opts下增加input div
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