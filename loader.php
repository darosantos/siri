<?php
/**
 * @Author Danilo Rodrigues dos Santos
 */
try {

    /**
     * Inclui o arquivo com as constantes default do sistema
     */
    $nameFileConfig = $GLOBALS['APP_ENGINE']['APP_NAME'] . '-config.php';
    if ( !file_exists( $nameFileConfig ) ) {
        throw new Exception ('<h1>As definições <i>default</i> não puderam ser carregadas</h1>');
    }
    require_once('siri-config.php');

    $pathToSetupFile = ABSPATH . 'lib' . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'setup.php';
    if ( !file_exists( $pathToSetupFile ) ) {
        throw new Exception ('<h1>Setup não encontrado!</h1>' );
    }
    require_once( $pathToSetupFile );

    /**
     * Verifica se o ambiente é adequado para a execução do app
     * Efetua esta verificação apenas uma vez por sessão
     */
    $pathToVersionFile = ABSPATH . 'lib' . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'version.php';
    if (!file_exists($pathToVersionFile)) {
        throw new Exception ('<h1>O arquivo com as definições de requisitos do sistema não pode ser carregado.</h1>');
    }
    require_once($pathToVersionFile);

    $pathToSettingsFile = ABSPATH . 'lib' . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'settings.php';
    if (!file_exists($pathToSettingsFile)) {
        throw new Exception ('<h1>Settings não encontrado!</h1>');
    }
    require_once($pathToSettingsFile);

    $pathToMainFile = $pathToSettingsFile = ABSPATH . 'lib' . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'main.php';
    if (!file_exists($pathToMainFile)) {
        throw new Exception ('<h1>Main não encontrado!</h1>');
    }
    include_once($pathToMainFile);

} catch ( Exception $e ) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <title>Página de erro</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <pre>
        <h1>Ocorreu um erro</h1>
        <h2>Contate o administrador do sistema</h2>
    </pre>
<?php echo $e->getMessage(); ?>
</pre>
    </body>
    </html>
    <?php
}
?>