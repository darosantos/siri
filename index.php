<?php
if (!isset($GLOBALS['APP_ENGINE'])) {
    global $APP_ENGINE;
    $GLOBALS['APP_ENGINE'] = array('APP_NAME' => 'siri',
        'INFO_DEBUG' => ''
    );
}

include_once ('loader.php');
?>