<?php
require_once "config.inc.php";
require_once "Weblogger.class.php";

if(!file_exists(LOG_PATH.LOG_FILENAME))die("Empty data!");
$__datafile = file(LOG_PATH.LOG_FILENAME);
$wlogs = array();

foreach($__datafile as $line){
	if(strlen(trim($line)) > 0){
		$obj = unserialize(trim($line));
		if(is_object($obj)){
			$wlogs[] = $obj;
		}
	}
}
krsort($wlogs); // Ordeno el arreglo de mayor a menor por clave
$wlogs = array_values($wlogs);
