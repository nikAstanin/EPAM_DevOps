	<!DOCTYPE html>
<html>
	<head>
	<meta charset = "UTF-8"/>
	<link rel = "stylesheet" href = "style/Main_style.css"/>
	<title>Lab_4</title>
	<script src="scripts/Main_script.js"></script>
	</head>
	
	<body>

<?php include 'header.php'; ?>
	
	<main>
		<div id="content">
			<div id="server_vars">
				<table cellspacing = "0">
					<tr>
						<td><strong>$_GET</strong></td>
						<td></td>
					</tr>
					
					<?php
					foreach($_GET as $key => $value){
						
						echo "<tr><td>$key</td>";
						echo "<td>$value</td></tr>";
						
					}?>
					<tr>
						<td><strong>$_POST</strong></td>
						<td></td>
					</tr>
					<tr>
					<?php
					foreach($_POST as $key => $value){
						echo "<tr><td>$key</td>";
						echo "<td>$value</td></tr>";
						
					}?>
					</tr>
					<tr>
						<td><strong>$_SERVER</strong></td>
						<td></td>
					</tr>
					<tr>
					<?php
					foreach($_SERVER as $key => $value){
						echo "<tr><td>$key</td>";
						echo "<td>$value</td></tr>";
						
					}?>
					</tr>
				</table>
			</div>
		</div>
	</main>
<?php include 'footer.php'; ?>