<?php
session_start();
require_once 'model/model_lib.php'; // подключение библиотеки для работы модели
require_once 'model/model.php'; // подключение модели
require_once 'functions/functions.php'; // подключение библиотеки функций

// получение динаминой части шаблона
if(empty($_GET['view'])){ $view = 'auth'; }
else { $view = $_GET['view']; }

switch($view){
    case('auth'):
        // авторизация
        $guest = true;

        if(isset($_POST['enter'])){ authorization(); } // если нажата кнопка Войти
        if($_GET['action'] == "exit"){ unset($_SESSION['auth']); } // если нажата кнопка Выйти
        break;

    case('main'):
        // рабочий стол
        verifying_access(); // проверка авторизации

        // посчитать количество задач
        $tasks = select_tasks('В процессе'); // получить задачи
        $tasks_count = count($tasks);

        // изменение задачи
        if(isset($_POST['upd'])){
            update_tasks();
            redirect();
        }

        break;

    case('visits_add'):
        // оформление нового визита
        verifying_access(); // проверка авторизации

        $clients = select_table('clients'); // получить список всех клиентов
        $visits_type = select_table('visits_type'); // получить список всех типов визитов
        $tables = select_table('tables'); // получить список всех типов визитов

        // процедура оформления визита
        if(isset($_POST['add'])){
            // сохранение клиента
            if($_POST['whatClient'] == 'old'){ // если выбрали существуюшего клиента
                $clients_id = abs((int)$_POST['clients_id']);
            } elseif($_POST['whatClient'] == 'new'){ // если ввели нового клиента
                $clients_id = insert_clients();
            }
            // сохранение визита
            if(isset($clients_id)){
                $visits_id = insert_visits($clients_id);
            }
        }
        break;

    case('visits_all'):
        // список визитов
        verifying_access(); // проверка авторизации
        $visits = select_visits(); // список визитов
        // удаление
        if($_GET['action'] == 'del'){
            $id = abs((int)$_GET['id']);
            delete_table('visits', 'visits_id', $id);
            redirect();
        }
        break;

    case('visits_one'):
        // информация по одному визиту
        verifying_access(); // проверка авторизации

        // получить информацию
        if(isset($_GET['id'])){
            $id = abs((int)$_GET['id']);
            $visits = select_visits($id);
            $clients = select_table('clients'); // получить список всех клиентов
            $visits_type = select_table('visits_type'); // получить список всех типов визитов
            $tables = select_table('tables'); // получить список всех типов визитов
        }

        // изменение
        if(isset($_POST['upd'])){
            update_visits();
            redirect();
        }

        // удаление
        if(isset($_POST['del'])){
            $id = abs((int)$_POST['visits_id']);
            delete_table('visits', 'visits_id', $id);
            header("location: ?view=visits_all");
        }
        break;


    case('report'):
        // отчет о посещениях
        verifying_access(); // проверка авторизации

        if(isset($_POST['date1'])) {
            $date1 = clear($_POST['date1']);
            $_SESSION['date1'] = clear($_POST['date1']);
        } elseif ($_SESSION['date1']) {
            $date1 = $_SESSION['date1'];
        } else {
            $date1 = REPORT_DATE_1_DEFAULT;
        }

        if(isset($_POST['date2'])) {
            $date2 = clear($_POST['date2']);
            $_SESSION['date2'] = clear($_POST['date2']);
        } elseif ($_SESSION['date2']) {
            $date2 = $_SESSION['date2'];
        } else {
            $date2 = REPORT_DATE_2_DEFAULT;
        }
        break;

    case('musics_all'):
        // Стол заказов музыки
        verifying_access(); // проверка авторизации

        $orders_musics = select_table('orders_musics');
        $statuses = select_table('statuses');
        $playlist = select_orders_musics(0);

        // заказ музыки
        if(isset($_POST['add'])){
            insert_orders_musics();
            redirect();
        }

        // удаление
        if($_GET['action'] == 'del'){
            $id = abs((int)$_GET['id']);
            delete_table('orders_musics', 'orders_musics_id', $id);
            redirect();
        }
        break;

    case('musics_one'):
        // информация о заказанной музыке
        verifying_access(); // проверка авторизации

        // получить информацию по одному заказу
        if(isset($_GET['id'])){
            $id = abs((int)$_GET['id']);
            $playlist = select_orders_musics($id);
            $statuses = select_table('statuses');
        }

        // изменить
        if(isset($_POST['upd'])) {
            update_orders_musics();
            redirect();
        }

        // удалить
        if(isset($_POST['del'])){
            $id = abs((int)$_POST['orders_musics_id']);
            delete_table('orders_musics', 'orders_musics_id', $id);
            header("location: ?view=musics_all");
        }
        break;


    case('musics_guest'):
        // Заказать музыку - гость
        $guest = true;

        // заказ музыки
        if(isset($_POST['add'])){
            $_SESSION['orders_musics_id'] = insert_orders_musics();
            header("location: ?view=musics_pay");
        }

        break;

    case('musics_pay'):
        // Заказать музыку - гость
        $guest = true;


        $playlist = select_orders_musics($_SESSION['orders_musics_id']); // получить данные по заказанной музыке
        $desc = "Оплата музыкального заказа №" . $playlist[0]['orders_musics_id'] . " (" . $playlist[0]['name_music'] .") в Клубе Олимпус"; // назначение платежа в Яндекс.Деньги
        $sum = $playlist[0]['sum']; // сумма платежа в Яндекс.Деньги


        break;

    case('musics_success'):
        // Успешная оплата музыки - гость
        $guest = true;

        break;

    case('clients_all'):
        // клиенты
        verifying_access(); // проверка авторизации

        $clients = select_table('clients'); // получить список всех клиентов

        // добавление клиента
        if(isset($_POST['add'])){
            insert_clients();
            redirect();
        }

        // удаление клиента
        if($_GET['action'] == 'del'){
            $id = abs((int)$_GET['id']);
            delete_table('clients', 'clients_id', $id);
            redirect();
        }

        // поиск клиента по ФИО
        if(isset($_POST['search_name'])){
            search_client('search_name');
        }

        // поиск клиента по номеру телефона
        if(isset($_POST['search_tel'])){
            search_client('search_tel');
        }
        break;

    case('clients_one'):
        // карточка клиента
        verifying_access(); // проверка авторизации

        // открыть карточку клиента с полученным id
        if(isset($_GET['id'])){
            $id = abs((int)$_GET['id']);
            $clients = select_table_one('clients', 'clients_id', $id);
            $visits = select_visits(0, $id);
            $visits_tables = select_visits_tables($id);
        }

        // изменение клиента
        if(isset($_POST['upd'])){
            update_clients();
            redirect();
        }

        // удаление клиента
        if(isset($_POST['del'])){
            $id = abs((int)$_POST['clients_id']);
            delete_table('clients', 'clients_id', $id);
            header("location: ?view=clients");
        }
        break;

    case('tables_one'):
        // информация по одному столу
        verifying_access(); // проверка авторизации

        if(isset($_GET['id'])){
            $id = abs((int)$_GET['id']);
            $tables = select_table_one('tables', 'tables_id', $id);
        }

        // изменение информации
        if(isset($_POST['upd'])){
            update_tables();
            redirect();
        }
        break;

    case('service_restaurant'):
        // обслуживание ресторана
        verifying_access(); // проверка авторизации

        $tables = select_table('tables');
        $clients = select_table('clients');

        if($_GET['action'] == 'clear'){
            $id = abs((int)$_GET['id']);
            update_tables_free($id);
            redirect();
        }

        // добавление стола
        if(isset($_POST['add'])){
            insert_tables();
            redirect();
        }

        // закрепление клиента за столом
        if(isset($_POST['bron'])){
            insert_visits_tables();
            redirect();
        }
        break;

    case('users_all'):
        // пользователи
        verifying_access(); // проверка авторизации

        $users = select_table('users'); // получение списка сотрудников
        $access = select_table('access');

        // добавление сотрудника
        if(isset($_POST['add'])){
            insert_users();
            redirect();
        }
        break;

    case('users_one'):
        // карточка пользователя
        verifying_access(); // проверка авторизации

        // открыть карточку сотрудника с полученным id
        if(isset($_GET['id'])){
            $users_id = clear($_GET['id']);
            $users = select_table_one('users', 'users_id', $users_id);
            $access = select_table('access');
        }

        // изменение
        if(isset($_POST['upd'])){
            update_users();
            redirect();
        }

        // удаление
        if(isset($_POST['del'])){
            $id = abs((int)$_POST['users_id']);
            delete_table('users', 'users_id', $id);
            header("location: ?view=users_all");
        }

        break;

    default:
        // если из адресной строки получено имя несуществуюшего шаблона
        $view = 'auth';

        break;
}

// подключение вида
require_once 'views/index.php';

?>