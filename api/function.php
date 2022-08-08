<?php
session_start();
date_default_timezone_set('Asia/Taipei');

function pdo()
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
    return new PDO($dsn, 'root', '');
}


function all($table, ...$arg)
{
    $pdo = pdo();


    $sql = "SELECT * FROM $table ";


    switch (count($arg)) {
        case 1:


            if (is_array($arg[0]) && !empty($arg[0])) {


                foreach ($arg[0] as $key => $value) {

                    $tmp[] = "`$key`='$value'";
                }

                $sql .= " WHERE " . implode(" AND ", $tmp);
            } else if (empty($arg[0])) {
            } else {

                $sql .= $arg[0];
            }
        break;
        case 2:

            if (!empty($arg[0])) {

                foreach ($arg[0] as $key => $value) {

                    $tmp[] = "`$key`='$value'";
                }
                $sql .= " WHERE " . implode(" AND ", $tmp) . $arg[1];
            } else {
                $sql .= $arg[1];
            }

        break;
    }

    // echo $sql;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function find($table, $arg)
{
    $pdo = pdo();

    $sql = "SELECT * FROM $table WHERE ";
    if (is_array($arg)) {

        foreach ($arg as $key => $value) {

            $tmp[] = "`$key`='$value'";
        }

        $sql .= implode(" AND ", $tmp);
    } else {

        $sql .= " `id`='$arg'";
    }

    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}



function del($table, $arg)
{
    $pdo = pdo();

    $sql = "DELETE FROM $table WHERE ";
    if (is_array($arg)) {

        foreach ($arg as $key => $value) {

            $tmp[] = "`$key`='$value'";
        }

        $sql .= implode(", ", $tmp);
    } else {

        $sql .= " `id`='$arg'";
    }

    return $pdo->exec($sql);
}

function math($table, $math, $col, ...$arg)
{
    $pdo = pdo();

    $sql = "SELECT $math(`$col`) FROM $table ";

    if (!empty($arg[0])) {

        foreach ($arg[0] as $key => $value) {

            $tmp[] = "`$key`='$value'";
        }

        $sql .= " WHERE " . implode(" AND ", $tmp);
    }


    return $pdo->query($sql)->fetchColumn();
}

function  to($url)
{

    header("location:" . $url);
}

function  q($sql)
{
    $pdo = pdo();

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function  save($table, $arg)
{
    $pdo = pdo();
    $sql = '';
    if (isset($arg['id'])) {
        foreach ($arg as $key => $value) {

            if ($key != 'id') {

                $tmp[] = "`$key`='$value'";
            }
        }

        $sql .= "UPDATE $table SET " . implode(", ", $tmp) . " WHERE `id`='{$arg['id']}'";
    } else {

        $cols = implode("`,`", array_keys($arg));
        $values = implode("','", $arg);

        $sql = "INSERT INTO $table (`$cols`) VALUES('$values')";
    }

    return $pdo->exec($sql);
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>