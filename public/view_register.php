<?php
require_once "../config.inc.php";
require_once "../Weblogger.class.php";
require_once "../data.php";
?>
<html>
	<head>
		<title>Web Logger - Informaci&oacute;n detallada</title>
		<link rel="stylesheet" href="http://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" type="text/css" />
		<style>
			body {
				font-size:9pt;
			}
			table {
				font-size:9pt;
			}
			
			body table ul li { list-style-type:none; }
			
			.footer { border-top:1px solid #111111; margin-top:15px;padding-top:8px; text-align:center }
		</style>
	</head>
	
	<body>
		<h2>Informaci&oacute;n detallada</h2>
		
		<?php
		$index = $_GET['i'];

		function dismount($object) {
			$reflectionClass = new ReflectionClass(get_class($object));
			$array = array();
			foreach ($reflectionClass->getProperties() as $property) {
				$property->setAccessible(true);
				$array[$property->getName()] = $property->getValue($object);
				$property->setAccessible(false);
			}
			return $array;
		}

		function getKey($str){
			$content = "";
			$content = str_replace("__", "", $str);
			$content = str_replace("_", " ", $content);
			return ucfirst($content);
		}

		if(is_numeric($index)){
			$data = dismount($wlogs[$index]);
			
			foreach($data as $key => $value){
				if(is_array($value)){
					$value = json_encode($value);
				}
				echo "<p><b>".getKey($key).":</b> ".urldecode($value)."</p>";
			}
		}
		?>
		
	</body>
</html>
