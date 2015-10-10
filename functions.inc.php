<?php
function get_port($port){
	$__port = array(
		'80' => '<b>HTTP</b>',
		'443' => '<b>HTTPS</b>'
	);

	if(isset($__port[$port])){
		return $__port[$port];
	}else{
		return "Puerto: ".$port;
	}
}
