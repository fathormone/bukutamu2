<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Data Buku Tamu</title>
	</head>
	<body>
		<h1>Data Buku Tamu</h1>
		<?php
		$fp=fopen("bukutamu.dat","r");
		while (!feof($fp)){
		$baris=fgets($fp,80);
		echo $baris;
	}
	fclose($fp);
	?>
</body>
</html>