<?php
require_once "config.inc.php";
require_once "Weblogger.class.php";
require_once "data.php";
?>
<html>
	<head>
		<title>Web Logger</title>
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
		<h2>Web Logger</h2>
		<table id="data-table" class="display" width="100%" cellspacing="0">
			<thead>
			<tr>
				<th>Fecha</th>
				<!--<th>Agente de usuario</th>-->
				<th>IP Cliente</th>
				<!--<th>Cookies</th>-->
				<th>Dominio</th>
				<th>URL</th>
				<th>Metodo</th>
				<th>Datos del POST</th>
			</tr>
			</thead>
			
			<tfoot>
			<tr>
				<th>Fecha</th>
				<!--<th>Agente de usuario</th>-->
				<th>IP Cliente</th>
				<!--<th>Cookies</th>-->
				<th>Dominio</th>
				<th>URL</th>
				<th>Metodo</th>
				<th>Datos del POST</th>
			</tr>
			</tfoot>

		<?php $count= 0; ?>
		<?php foreach($wlogs as $wlog): ?>

			<tr>
				<td><?php echo date('Y-m-d H:i:s', $wlog->getDate()); ?></td>
				<!--<td><?php echo $wlog->getUserAgent(); ?></td>-->
				<td><?php echo $wlog->getIpClient(); ?></td>
				<!--<td>
					<ul>
					<?php foreach($wlog->getCookies() as $key => $value): ?>
						<li><b><?php echo $key; ?>: </b><?php echo substr($value, 0, 30); ?></li>
					<?php endforeach; ?>
					</ul>
				</td>-->
				<td><a href="view_register.php?i=<?php echo $count; ?>" title="Ver informaci&oacute;n detallada">
					<?php echo get_port($wlog->getPort())." ".$wlog->getDomain()." (". $wlog->getIpServer() .")"; ?>
					</a>
				</td>
				<td><?php echo $wlog->getRequest(); ?></td>
				<td><?php echo $wlog->getMethod(); ?></td>
				<td>
					<ul>
					<?php foreach($wlog->getPostdata() as $key => $value): ?>
						<li><b><?php echo $key; ?>: </b><?php echo json_encode($value); ?></li>
					<?php endforeach; ?>
					</ul>
				</td>
			</tr>
			<?php $count++; ?>
		<?php endforeach; ?>
		</table>
		
		<div class="footer">
			Web Logger 0.1 by Gonzalo Fleitas pastor
		</div>
		
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="http://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#data-table').DataTable({"order": [[ 0, "desc" ]]});
			} );
		</script>
	</body>
</html>
