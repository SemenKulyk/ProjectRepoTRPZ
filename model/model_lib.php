<?php
/* ===== Выполнить SELECT-запрос и вернуть массив с данными ===== */
function runQuerySelect($query){
    $res = mysql_query($query);
    $arr = array();
    while ($row = mysql_fetch_assoc($res)){ $arr[] = $row; }
    return $arr;
}
/* ===== Выполнить SELECT-запрос и вернуть массив с данными ===== */

/* ===== Выполнить INSERT-запрос ===== */
function runQueryInsert($query){
    mysql_query($query);
    if(mysql_affected_rows()>0){
        $_SESSION['message'] = "<div class='alert alert-info'>Запись добавлена.</div>";
    }else{
        $_SESSION['message'] = "<div class='alert alert-danger'>Ошибка при добавлении записи.</div>";
    };
    return mysql_insert_id();
}
/* ===== Выполнить INSERT-запрос ===== */

/* ===== Выполнить UPDATE-запрос ===== */
function runQueryUpdate($query){
    mysql_query($query);
    if(mysql_affected_rows()>0){
        $_SESSION['message'] = "<div class='alert alert-info'>Запись изменена.</div>";
    }else{
        $_SESSION['message'] = "<div class='alert alert-danger'>Ошибка при изменении записи.</div>";
    }
}
/* ===== Выполнить UPDATE-запрос ===== */

/* ===== Универсальный SELECT ===== */
function select_table($table){
    $query = "SELECT * FROM $table";
    return runQuerySelect($query);
}
/* ===== Универсальный SELECT ===== */

/* ===== Универсальный SELECT с получением 1 записи ===== */
function select_table_one($table, $field_id, $filed_val){
    $query = "SELECT * FROM $table WHERE $field_id = '$filed_val'";
    return runQuerySelect($query);
}
/* ===== Универсальный SELECT с получением 1 записи ===== */

/* ===== Универсальный DELETE ===== */
function delete_table($table, $field, $id){
    $query = "DELETE FROM $table WHERE $field = $id";
    mysql_query($query);
    if(mysql_affected_rows()>0){
        $_SESSION['message'] = "<div class='alert alert-info'>Запись успешно удалена.</div>";
    }else{
        $_SESSION['message'] = "<div class='alert alert-danger'>Ошибка при удалении записи.</div>";
    }
}
/* ===== Универсальный DELETE ===== */

