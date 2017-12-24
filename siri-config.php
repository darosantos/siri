<?php
define( 'SERVER', '127.0.0.1' );
define( 'USER', 'root' );
define( 'PASS', '' );
define( 'DATABASENAME','gfc_unemat' );

define( 'ABSPATH', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );
define( 'WEB_ROOT', 'http://localhost/gfc/');
define( 'PATHTOLOG', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );
define( 'PATHTOMFC', ABSPATH . 'data.inc' . DIRECTORY_SEPARATOR );
define( 'PATHTMPMFC', ABSPATH . 'data.inc' . DIRECTORY_SEPARATOR . 'mfc_tmp' . DIRECTORY_SEPARATOR );

define( 'MAX_EXECUTION_TIME', 600 );
define( 'MAX_UPLOAD_SIZE', '2M' );
define( 'TIMEZONE', 'America/Cuiaba' );
define( 'DEFAULT_CHARSET', 'UTF-8' );
define( 'DEBUG_MODE', 'ON' );
define( 'MEMORY_LIMIT', '128M' );

define( 'UID_CONTAINER', 'BUC' );
define( 'PREFIX_SESSION_NAME', 'SGIFCD' );
define( 'PREFIX_ID_USER_PROFILE', 'DUP' );
define( 'PREFIX_PASSWORD_USER_PROFILE', 'DUS' );
define( 'PREFIX_SESSION_CATALOGUING', 'SFC' );
define( 'PREFIX_CPF_CATALOGUING', 'CFC' );

//define( 'ARTICLE_MAX_SIZE', 64424509440 ); // To 60 Mb, value in byte
//define( 'UPLOAD_DIR_ARTICLE', 'C:\wamp64\www\rvfid\article\\' ); // To 60 Mb, value in byte

?>