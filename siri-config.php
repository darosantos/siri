<?php
define( 'SERVER', '127.0.0.1' );
define( 'USER', 'root' );
define( 'PASS', '' );
define('DATABASENAME', 'siri_db');

define('ABSPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('DOMAIN_LOCATION', 'localhost/siri/');

define('APPLY_DEFAULT_PHP_OPTIONS', 'On');
define( 'TIMEZONE', 'America/Cuiaba' );
define('OUTPUT_BUFFERING', 'On');
define('ZLIB_OUTPUT_COMPRESSION', 'On');
define('MAX_EXECUTION_TIME', '600');
define('MAX_INPUT_TIME', '360');
define( 'MEMORY_LIMIT', '128M' );
define('DEBUG_MODE', 'ON');
define('PATH_LOG', 'c:/wamp64/www/siri/log/');
define('LOG_FILENAME', 'siri_php.log');
define('MAX_UPLOAD_SIZE', '2M');
define('DEFAULT_MIMETYPE', 'text/html');
define('DEFAULT_CHARSET', 'UTF-8');
define('MAX_FILE_UPLOADS', '3');
define('SESSION_SAVE_PATH', '25;/tmp');
define('SESSION_COOKIE_HTTPONLY', 'On');
define('SESSION_CACHE_EXPIRE', '15');
define('SESSION_NAME', sha1('SISRIID' . $_SERVER['REMODE_ADDR'] . $_SERVER['HTTP_USER_AGENT']));
?>