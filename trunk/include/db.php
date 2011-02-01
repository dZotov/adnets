<?php

mysql_connect(DB_HOST, DB_LOGIN, DB_PASS);
mysql_select_db(DB_DEVICE);

if (mysql_errno()) {
    throw new exception('Не удалось подключиться к MySQL: ' . mysql_error());
}

mysql_query('SET NAMES cp1251');

function query($sql) {
    global $DB_QUERY;
    $DB_QUERY++;

    if (get_get('debug')) {
        echo $DB_QUERY . ". " . $sql . "<br />";
    }

    return query_important($sql);
}

function query_important($sql) {
    $res = mysql_query($sql);
    if ($res == false) {
        if (DEBUG) {
            echo '<b>' . htmlspecialchars(mysql_error()) . "</b><br /><tt>" . htmlspecialchars($sql) . '</tt>';
        } else {
            echo '<br>Приносим извинения на нашем сайте произошла ошибка ' . date('Y-m-d H:i:s');
        }
        exit();
    }
    else
        return $res;
}

function one_result($SQL) {
    $res = query($SQL);
    if (!$res)
        return NULL;

    $row = mysql_fetch_row($res);

    return $row[0];
}

?>