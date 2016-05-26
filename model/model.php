<?php
/* ===== Авторизация в системе ===== */
function authorization(){
    $login = clear($_POST['login']);
    $password = md5($_POST['password']);
    $query = "SELECT users_id, fio, users.access_id, access.name as access_name
                FROM users, access
                WHERE users.access_id = access.access_id
                AND login = '$login'
                AND password = '$password'
                LIMIT 1";
    $res = mysql_query($query) or die(mysql_error());
    if(mysql_num_rows($res) == 1){
        // если авторизация успешна
        $row = mysql_fetch_row($res);
        $_SESSION['auth']['users_id'] = $row[0];
        $_SESSION['auth']['fio'] = $row[1];
        $_SESSION['auth']['access_id'] = $row[2];
        $_SESSION['auth']['access_name'] = $row[3];

        if(($_SESSION['auth']['access_id'] == 1) or ($_SESSION['auth']['access_id'] == 2) or ($_SESSION['auth']['access_id'] == 3)){
            // если авторизорвался пользователь
            header('location: ?view=visits_add');
        }
    } else {
        // если неверен логин/пароль
        $_SESSION['auth']['access_id'] = -1;
        $_SESSION['message'] = "<div class='alert alert-danger' style='margin-top: 10px;'>Такого пользователя нет либо ввели неправильные данные.</div>";
    }
}
/* ===== Авторизация в системе ===== */

/* ===== проверить авторизовался ли пользователь для работы с системой ===== */
function verifying_access(){
    // если пользователя нет в системе или ему закрыт доступ или он ещё не пробовал авторизоваться, то перенаправляем на страницу авторизации
    // в системе работать нельзя
    if($_SESSION['auth']['access_id'] == -1 or $_SESSION['auth']['access_id'] == 0 or empty($_SESSION['auth']['access_id'])){

        header("location: ?view=auth");
        $_SESSION['message'] = "<div class='alert alert-danger' style='margin-top: 10px;'>Доступ закрыт. Авторизуйтесь для работы в системе.</div>";
        exit;
    }
}
/* ===== проверить авторизовался ли пользователь для работы с системой ===== */

/* ===== Добавление пользователя ===== */
function insert_users(){
    $login = clear($_POST['login']);

    // проверка, есть ли такой же логин в системе
    $res = select_table_one('users', 'login', $login);
    if($res) {
        $_SESSION['message'] = "<div class='alert alert-danger' style='margin-top: 10px;'>Пользователем с таким телефоном или логином уже есть. Придумайте новый.</div>";
        header("location: ?view=users_all");
        exit;
    } else {
        $fio = clear($_POST['fio']);
        $access_id = abs((int)$_POST['access_id']);
        $password = md5($_POST['password']);
        $query = "INSERT INTO `users`(`fio`, `login`, `password`, `access_id`)
                VALUES ('$fio', '$login', '$password','$access_id')";
        runQueryInsert($query);
    }
}
/* ===== Добавление пользователя ===== */

/* ===== Редактирование пользователя ===== */
function update_users(){
    $users_id = abs((int)($_POST['users_id']));
    $fio = clear($_POST['fio']);
    $access_id = abs((int)$_POST['access_id']);
    $login = clear($_POST['login']);

    if($_POST['password_old'] == $_POST['password']){
        // если пароль остался без изменения, то ничего с паролем не делаем
        $password = $_POST['password'];
    } else {
        // если придуман новый пароль, то шифруем его
        $password = md5($_POST['password']);
    }

    $query = "UPDATE `users`
                SET `fio`='$fio', `login`='$login', `password`='$password', `access_id`='$access_id'
                WHERE users_id = $users_id";
    runQueryUpdate($query);
}
/* ===== Редактирование пользователя ===== */

/* ===== Список визитов ===== */
function select_visits($visits_id = 0, $clients_id = 0){
    $sql1 = "";
    if($visits_id > 0) {
        $sql1 = " WHERE visits_id = $visits_id ";
    } elseif ($clients_id > 0){
        $sql1 = " WHERE clients_id = $clients_id ";
    }
    $query = "SELECT
                    `visits_id`,
                    DATE_FORMAT(visits.`date_add`,'%d.%m.%Y') as dateAdd,
                    `clients_id`,
                    (SELECT fio FROM clients WHERE clients.clients_id = visits.clients_id) as clients_fio,
                    (SELECT tel FROM clients WHERE clients.clients_id = visits.clients_id) as clients_tel,
                    `visits_type_id`,
                    (SELECT `name` FROM visits_type WHERE visits_type.visits_type_id = visits.visits_type_id) as name_visits_type,
                    `sum`,
                    `note`,
                    `users_id`,
                    (SELECT fio FROM `users` WHERE `users`.`users_id` = visits.users_id) as users_fio
                FROM `visits`
                $sql1
                ORDER BY visits_id DESC ";
    return runQuerySelect($query);
}
/* ===== Список визитов ===== */

/* ===== История заказов столика ===== */
function select_visits_tables($id){
    $query = "SELECT
                `visits_tables_id`,
                `clients_id`,
                `tables_id`,
                (SELECT name FROM `tables` WHERE `tables`.`tables_id` = visits_tables.tables_id ) as `name`,
                DATE_FORMAT(visits_tables.`date_reserv`,'%d.%m.%Y') as dateReserv,
                `users_id`,
                (SELECT fio FROM `users` WHERE `users`.`users_id` = visits_tables.users_id) as users_fio
                    FROM `visits_tables`
                    WHERE clients_id = $id";
    return runQuerySelect($query);
}
/* ===== История заказов столика ===== */

/* ==== Освободить столик ==== */
function update_tables_free($id){
    $query = "UPDATE `tables` SET flag_free = '0' WHERE tables_id = $id";
    return runQueryUpdate($query);
}
/* ==== Освободить столик ==== */

/* ==== Добавление столика ==== */
function insert_tables(){
    $name = clear($_POST['name']);
    $count_seats = abs((int)$_POST['count_seats']);
    $query = "INSERT INTO `tables` (`name`, `count_seats`, `flag_free`) VALUES ('$name', $count_seats, '0')";
    return runQueryInsert($query);
}
/* ==== Добавление столика ==== */

/* ==== Оформление музыки ==== */
function insert_orders_musics(){
    $tel = clear($_POST['tel']);
    $name_music = clear($_POST['name_music']);
    $prim = clear($_POST['prim']);
    $datatime_play = clear($_POST['datatime_play']);
    $statuses_id = abs((int)$_POST['statuses_id']);
    $sum = clear($_POST['sum']);
    if ($_SESSION['auth']['users_id']) {
        $users_id = $_SESSION['auth']['users_id'];
    } else {
        $users_id = 0;
    }
    $query = "INSERT INTO `orders_musics` (`orders_musics_date`, `tel`, `name_music`, `prim`, `datatime_play`, `statuses_id`, `users_id`, `sum`)
                VALUES (NOW(), '$tel', '$name_music', '$prim', '$datatime_play', '$statuses_id', $users_id, $sum)";
    return runQueryInsert($query);
}
/* ==== Оформление музыки ==== */

/* ==== Получение данных по заказанной музыке ==== */
function select_orders_musics($orders_musics_id = 0){
    if ($orders_musics_id > 0){
        $str = " WHERE orders_musics_id = $orders_musics_id ";
    } else {
        $str = "";
    }
    $query = "SELECT
                `orders_musics_id`,
                `orders_musics_date`,
                `tel`,
                `name_music`,
                `prim`,
                `datatime_play`,
                orders_musics.statuses_id,
                (SELECT name FROM statuses WHERE statuses.statuses_id = orders_musics.statuses_id) as `statuses_name`,
                `users_id`,
                (SELECT fio FROM users WHERE users.users_id = orders_musics.users_id) as users_fio,
                `sum`
                  FROM `orders_musics`
                  $str
                  ORDER BY `statuses_id` DESC";
    return runQuerySelect($query);
}
/* ==== Получение данных по заказанной музыке ==== */

/* ==== Изменение музыкального заказа ==== */
function update_orders_musics(){
    $orders_musics_id = abs((int)$_POST['orders_musics_id']);
    $tel = clear($_POST['tel']);
    $name_music = clear($_POST['name_music']);
    $prim = clear($_POST['prim']);
    $datatime_play = clear($_POST['datatime_play']);
    $statuses_id = abs((int)$_POST['statuses_id']);
    $sum = abs((int)$_POST['sum']);

    $query = "UPDATE `orders_musics`
                SET `tel`='$tel',`name_music`='$name_music',`prim`='$prim',
                `datatime_play`='$datatime_play',`statuses_id`=$statuses_id,`users_id`={$_SESSION['auth']['users_id']},`sum`=$sum
                WHERE `orders_musics_id`=$orders_musics_id";
    runQueryUpdate($query);
}
/* ==== Изменение музыкального заказа ==== */

/* ==== Закрепление за клиентом стола ==== */
function insert_visits_tables(){
    $clients_id = clear($_POST['clients_id']);
    $tables_id = clear($_POST['tables_id']);

    $query = "INSERT INTO `visits_tables` (`clients_id`,`tables_id`, `date_reserv`, `users_id`)
                VALUES ('$clients_id', '$tables_id', NOW(), '{$_SESSION['auth']['users_id']}')";
    runQueryInsert($query);

    $query = "UPDATE `tables` SET flag_free = '1' WHERE tables_id = $tables_id";
    return runQueryUpdate($query);
}
/* ==== Закрепление за клиентом стола ==== */

/* ===== Добавление клиента ===== */
function insert_clients(){
    $fio = clear($_POST['fio']);
    $tel = clear($_POST['tel']);
    $data_rozhd = clear($_POST['data_rozhd']);
    $query = "INSERT INTO `clients` (`fio`,`tel`, `data_rozhd`)
                VALUES ('$fio', '$tel', '$data_rozhd')";
    return runQueryInsert($query);
}
/* ===== Добавление клиента ===== */

/* ===== Редактирование клиента ===== */
function update_clients(){
    $clients_id = abs((int)($_POST['clients_id']));
    $fio = clear($_POST['fio']);
    $tel = clear($_POST['tel']);
    $data_rozhd = clear($_POST['data_rozhd']);
    $query = "UPDATE `clients`
                SET `fio`='$fio',`tel`='$tel',`data_rozhd`='$data_rozhd'
                WHERE `clients_id`=$clients_id";
    runQueryUpdate($query);
}
/* ===== Редактирование клиента ===== */

/* ===== Поиск клиента ===== */
function search_client($type_search){
    // определяем по чем будет поиск
    if($type_search == 'search_name'){ // по названию организации
        $name = clear($_POST['name']);
        $str = "fio like '%$name%'";
    } elseif ($type_search == 'search_tel'){ // по телефону
        $tel = clear($_POST['tel']);
        $str = "tel like '%$tel%'";
    }
    $query = "SELECT `clients_id`
                FROM `clients`
                WHERE $str
                LIMIT 1";
    $res = mysql_query($query) or die(mysql_error());
    if(mysql_num_rows($res) == 1){
        // если есть запись
        $row = mysql_fetch_row($res);
        header("location: ?view=clients_one&id=".$row[0]);
        exit;
    } else {
        // если записи нет
        $_SESSION['message'] = "<div class='alert alert-danger' style='margin-top: 10px;'>Такого клиента нет.</div>";
    }
}
/* ===== Поиск клиента ===== */

/* ===== Сохранение заказа ===== */
function insert_visits($clients_id){
    $visits_type_id = abs((int)$_POST['visits_type_id']);
    $sum = abs((int)$_POST['sum']);
    $note = clear($_POST['note']);
    $users_id = $_SESSION['auth']['users_id']; // id менеджера
    $query = "INSERT INTO `visits` (`date_add`, `clients_id`, `visits_type_id`, `sum`, `note`, `users_id`)
                VALUES (NOW(), $clients_id, $visits_type_id, $sum, '$note', $users_id)";
    return runQueryInsert($query);
}
/* ===== Сохранение заказа ===== */

/* ===== Редактирование заказа ===== */
function update_visits()
{
    $visits_id = abs((int)$_POST['visits_id']);
    $clients_id = abs((int)$_POST['clients_id']);
    $visits_type_id = abs((int)$_POST['visits_type_id']);
    $sum = abs((int)$_POST['sum']);
    $note = clear($_POST['note']);
    $query = "UPDATE `visits`
                SET `clients_id`=$clients_id,`visits_type_id`=$visits_type_id,`sum`=$sum,`note`='$note',`users_id`={$_SESSION['auth']['users_id']}
                WHERE `visits_id`=$visits_id";
    runQueryUpdate($query);
}
/* ===== Редактирование заказа ===== */

/* ===== Данные для отчета о посещениях ===== */
function select_visits_report($visits_type_id, $date1, $date2){
    $visits_type_id = abs((int)$visits_type_id);
    $date1 = clear($date1);
    $date2 = clear($date2);
    $query = "SELECT
                v.date_add,
                count(v.visits_type_id) as count_visits,
                sum(v.sum) as sum_visits
                  FROM visits v
                  WHERE v.visits_type_id = $visits_type_id
                  AND (v.date_add BETWEEN '$date1' AND '$date2')
                  GROUP BY v.date_add";
    return runQuerySelect($query);
}
/* ===== Данные для отчета о посещениях ===== */