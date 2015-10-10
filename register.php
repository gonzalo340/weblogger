<?php
require_once "config.inc.php";
require_once "filters.php";
require_once "Weblogger.class.php";
$wlog = new Weblogger();

if(register_beforeFilter()){
	$string_obj = serialize($wlog);

	$f = fopen(LOG_PATH.LOG_FILENAME, "a+");
	fwrite($f, $string_obj."\r\n");

	if(conditions_beforeFilter()){
		foreach($conditions as $condition){
			if($condition['type'] == 'function'){
				if(call_user_func(array(&$wlog, $condition['name'])) == $condition['value']){
					if(file_exists('tasks/'.$tasks[$condition['task']])){
						require_once 'tasks/'.$tasks[$condition['task']];
					}
				}
			}
		}
	}
}
