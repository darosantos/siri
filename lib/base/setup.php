<?php
spl_autoload_extensions ( '.php' );
spl_autoload_register(function ($identityDefinition) {
    $pathToFile = ABSPATH . DIRECTORY_SEPARATOR . 'lib' . $identityDefinition . '.php';

    try {
        if (file_exists($pathToFile)) {
            $isIncluded = @include_once($pathToFile);
            if (!$isIncluded) {
                throw new Exception('Impossible load definition class in ');
            }

            $nameDefinition = getName($identityDefinition);
            $hasClass = class_exists($nameDefinition, false);
            $hasInterface = interface_exists($nameDefinition, false);
            $hasTrait = trait_exists($nameDefinition, false);
            if (!$hasClass || !$hasInterface || !$hasTrait) {
                throw new Exception('Unable to load definition. Scope not defined.');
            }
        } else {
            throw new Exception('Impossible load definition class.');
        }
    } catch (Exception $e) {
        $identityErrorFrom = $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['SERVER_PROTOCOL'] . ' ' . $_SERVER['REMOTE_ADDR'] . ':' . $_SERVER['REMOTE_PORT'];
        $descriptionError = $e->getMessage() . ' - ' . $_SERVER['SCRIPT_FILENAME'] . ' in ' . $_SERVER['REQUEST_TIME'];
        $errorMsg = date('d/m/Y h:i:s') . "\t" . $identityClass . "\t" . $identityErrorFrom . "t" . $descriptionError . "\n";
        @error_log($errorMsg, 3, PATH_LOG . 'autoload.log');
    }

});

/**
 * Utility function
 */
function getName($identityDefinition)
{
    $identityClass = explode('\\', $identityDefinition);
    return array_pop($identityClass);
}
?>