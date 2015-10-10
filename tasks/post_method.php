<?php
	if(isset($wlog)){
		if(is_object($wlog)){
			$f = fopen(LOG_PATH."posts.txt", "a+");
			fwrite($f, json_encode($wlog->getPostdata())."\r\n");
		}
	}
