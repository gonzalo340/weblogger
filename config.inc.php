<?php
	ini_set('date.timezone', 'America/Montevideo');
	
	define("LOG_FOLDER_NAME", "db");
	define("LOG_FILENAME", "objects.dat");
	define("LOG_PATH", dirname(__FILE__)."/".LOG_FOLDER_NAME."/");
	
	define("DEFAULT_RETURN_REGISTER_BEFORE", true);		// setear a false para que no genere registros.
	define("DEFAULT_RETURN_CONDITIONS_BEFORE", true);	// setear a true para habilitar las condiciones para ejecutar las tareas
	
	
	/*
	 * Las tareas sirven para ejecutar scripts personalizados una vez que una condicion sea valida.
	 * Normalmente se usan para enviar emails o sincronizar datos con un webservice cuando determinado dato es registrado.
	 * Los scripts deben estar guardados dentro del directorio "tasks".
	 */
	$tasks = array(
		'notificar_local_ip' => 'local_ip.php',
		'notificar_post_method' => 'post_method.php',
	);
	
	/*
	 * Las condiciones son expresiones, que cuando se cumplen ejecuta una tarea.
	 */
	$conditions = array(
		array('type' => 'function', 'name' => 'getMethod', 'value' => 'POST', 'task' => 'notificar_post_method'),
		array('type' => 'function', 'name' => 'getIpServer', 'value' => '127.0.0.1', 'task' => 'notificar_local_ip')
	);
	
	/* Archivo con funciones personalizadas */
	require_once "functions.inc.php";
