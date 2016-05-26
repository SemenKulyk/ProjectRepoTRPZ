<?php
/* ====Распечатка массива==== */
function print_arr($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
/* ====Распечатка массива==== */

/* ====Всплывающее окно для отладки кода==== */
function show_alert($val){
    echo "<script>alert('".$val."')</script>";
}
/* ====Всплывающее окно для отладки кода==== */

/* ====Фильтрация входящих данных==== */
function clear($var){
    // mysql_real_escape_string — Экранирует специальные символы в строках для использования в выражениях SQL
    // strip_tags — Удаляет HTML и PHP-теги из строки
    // trim — Удаляет пробелы (или другие символы) из начала и конца строки
    $var = mysql_real_escape_string(strip_tags(trim($var)));
    return $var;
}
/* ====Фильтрация входящих данных==== */

/* ====Редирект ==== */
function redirect(){
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    header("Location: $redirect");
    exit;
}
/* ====Редирект ==== */
?>
