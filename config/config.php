<?php

define('DEFAULT_PRICE_VISIT', 200); // сумма визита в клуб по умолчанию
define('ACCOUNT_YANDEX', '410012195640357'); // счет Яндекс.Деньги
define('URL_SUCCESS', 'arm-olimpus.loc/?view=musics_success'); // страница при успешной оплате музыки

define('REPORT_DATE_1_DEFAULT', '2016-05-01'); // дата мо умолчанию для начала периода для отчета
define('REPORT_DATE_2_DEFAULT', '2016-08-01'); // дата мо умолчанию для конца периода для отчета


// номер сервера, к которому подключаться
$connect_server = 1;

// Подключение к серверу и базе данных
switch($connect_server){
    case 1:
        // подключение к локальному серверу на Mac OS
        define('PATH', 'http://arm-olimpus.loc/'); // домен
        define('HOST', 'localhost'); // сервер
        define('USER', 'root'); // пользователь
        define('PASS', 'root'); // пароль
        define('DB', 'olimpusArm'); // БД
        break;
    case 2:
        // подключение к локальному серверу на Windows OS
        define('PATH', 'http://arm-olimpus.loc/'); // домен
        define('HOST', 'localhost'); // сервер
        define('USER', 'root'); // пользователь
        define('PASS', ''); // пароль
        define('DB', 'olimpusArm'); // БД
        break;
}

mysql_connect(HOST, USER, PASS) or die('Не удалось подключиться к серверу');
mysql_select_db(DB) or die('Не удалось открыть БД');
mysql_query("SET NAMES 'UTF8'") or die('Не удалось установить кодировку');
?>
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
