<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>FaDaLoader</title>
		<link rel="stylesheet" type="text/css" href="fadaloader.css" media="all" />
	</head>
	<body>
		<?php
			require_once ('fadaloader.php');
			$fadaloader = new fadaloader();
			if (isset($_POST['submit'])) {
				$fadaloader->upload();
			}
			echo $fadaloader->generateForm('fadaloader','fadaloader','fadaloader','','POST','10','file','Enviar Arquivos!');
			echo $fadaloader->status();
		?>
	</body>
</html>
