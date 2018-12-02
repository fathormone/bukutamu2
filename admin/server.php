<?php
session_start();
//apabila user yang mengakses tidak sah
if (empty($_SESSION['namauser']) and
	empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses halaman ini, anda harus login
terlebih dahulu <br>";
echo "<a href=index.php><b>LOGIN</b></a></center>";
}
//apabila user yang mengakses sah
else {
	?>
	<html>
	<head>
		<title>Banaspati | Professional E-Sports Organization</title>
		<!-- <link href="../include/admin_style.css" rel="stylesheet"
		type="text/css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>
	<body>
		<nav class="navbar navbar-light bg-light">
	  		<a class="navbar-brand" href="#">Navbar</a>
	  		<div>
				<a href="server.php?module=home"><b>Beranda</b></a> | <a href="server.php?module=user&act=gantipwd&id=<?php echo"$_SESSION[namauser]";?>" > Ganti Password</a> | <a href="logout.php"><b>Logout</b></a>&nbsp;</td>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<?php include "menu.php"; ?>
				</div>
				<div class="col-md-9">
					<?php include "konten.php"; ?>
				</div>
				<div class="col-md-12" align="center">
				Copyright <b>Faiz Luthfianto</b> &copy; 2018. All Right Reserved<br>
				<span class="style_text">Design By <a href="http://www.polindra.ac.id" target="_blank">Training Center TI Polindra</a></span></span>
				</div>
			</div>
		</div>
	</body>
	</html>
	<?php
		}
	?>