<?php

/*
 * Arquivo que contém a inicilização das configurações do sistema
 */

try {
	// Inclui o arquivo com as constantes default do sistema
	if ( !file_exists ( 'siri-config.php' ) ) {
		throw new Exception ( '<h1>As definições <i>default</i> não puderam ser carregadas</h1>' );
	}
	require_once ('siri-config.php');
	
	// Constantes variáveis
	if (! file_exists ( ABSPATH . 'app' . DIRECTORY_SEPARATOR . 'version.php' )) {
		throw new Exception ( '<h1>O arquivo com as definições de requisitos do sistema não pode ser carregado.</h1>' );
	}
	require_once ( ABSPATH . 'app' . DIRECTORY_SEPARATOR . 'version.php' );
	
	// Inclui o arquivo setup que contém as funções básicas e globais do sistema
	if (! file_exists ( ABSPATH . 'app' . DIRECTORY_SEPARATOR . 'setup.php' )) {
		throw new Exception ( '<h1>Setup não encontrado!</h1>' );
	}
	require_once ( ABSPATH . 'app' . DIRECTORY_SEPARATOR . 'setup.php');
	
	// Inclui o arquivo que realiza as configuraçõesm iniciais do sistema
	if (! file_exists ( ABSPATH . 'app' . DIRECTORY_SEPARATOR . 'settings.php' )) {
		throw new Exception ( '<h1>Settings não encontrado!</h1>' );
	}
	require_once ( ABSPATH . 'app' . DIRECTORY_SEPARATOR . 'settings.php');
	
	if (! file_exists ( ABSPATH . 'app' . DIRECTORY_SEPARATOR . 'main.php' )) {
		throw new Exception ( '<h1>Main não encontrado!</h1>' );
	}
	include_once ( ABSPATH . 'app' . DIRECTORY_SEPARATOR . 'main.php');
} catch ( Exception $e ) {
	?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Página de erro</title>
<meta charset="UTF-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
	<h1>Ocorreu um erro</h1>
	<h2>Contate o administrador do sistema</h2>
	<pre>
<?php echo $e->getMessage(); ?>
</pre>
</body>
</html>
<?php
}
?>