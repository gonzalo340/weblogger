<?php
	if(isset($wlog)){
		if(is_object($wlog)){
			$f = fopen(LOG_PATH."local_ip.txt", "a+");
			fwrite($f, $wlog->getFilename()."\r\n");
		}
	}
