<?php
switch(@$_GET[act]){
//tampil user
	default:
	echo "<h2>User</h2>
	<form method=post action='?module=user&act=tambahuser'>
	

		<input type=submit class='btn btn-primary' value='Tambah User'>
	</form>
	<table class='table'>
		<tr>
			<th scope='col'>No</th><th scope='col'>Username</th><th scope='col'>Password</th><th scope='col'>Aksi</th>
		</tr>";
		$tampil=mysqli_query($koneksi,"select * from admin order by id_user asc");
		$no=1;
		while ($r=mysqli_fetch_array($tampil)) {
			echo "<tr>
			<td>$no</td>
			<td>$r[id_user]</td>
			<td>$r[password]</td>
			<td><a class='btn btn-primary' href=?module=user&act=edituser&id=$r[id_user]>Edit</a>
				<a class='btn btn-danger' href=\"aksi.php?module=user&act=hapus&id=$r[id_user]\" onClick=\"return confirm('apakah anda benar akan menghapus user $r[id_user]?')\">Hapus</a>
			</td></tr>";
			$no++;
		}
		echo "</table>";
		break;
//tambah user
		case "tambahuser":
		echo "<h2>Tambah User</h2>
		<form method=post action='aksi.php?module=user&act=input'>
		<div class='col-md-5'>
  				<div class='form-group'>
    				<input class='form-control' name='id_user' type='text' id='id_user' placeholder='Username'>
  				</div>
  				<div class='form-group'>
    				<input type='password' class='form-control' name='password' id='password' placeholder='Password'>
  				</div>
  				<input type='submit' class='btn btn-primary' name='submit' value='Simpan'>
  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
			</div>
					</form>";
					break;

//edit user
					case "edituser":
					$edit=mysqli_query($koneksi,"select * from admin where
						id_user='$_GET[id]'");
					$r=mysqli_fetch_array($edit);
					echo "<h2>Edit User</h2>
					<form method=post action='aksi.php?module=user&act=update'>
					<div class='col-md-5'>
  				<div class='form-group'>
  					<input type=hidden name=id value='$r[id_user]'>
    				<input class='form-control' name='id_user' type='text' id='id_user' value='$r[id_user]'>
  				</div>
  				<div class='form-group'>
    				<input type='password' class='form-control' name='password' id='password' placeholder='Password'>
  				</div>
  				<input type='submit' class='btn btn-primary' name='submit' value='Update'>
  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
			</div>
						</form>";
								break;
//edit Password case "gantipwd":
				case"gantipwd":
				$edit=mysqli_query($koneksi, "select * from admin where id_user='$_GET[id]'");
				$r=mysqli_fetch_array($edit); echo "<h2>Ganti Password</h2>
				<form method=post 
					action='aksi.php?module=user&act=gantipwd'>
					<input type=hidden name=id value='$r[id_user]'>
					<input type=hidden name=pwd_lama1 value='$r[password]'>
					<table>
						<tr><td>Password Lama</td>
							<td> : <input type=password name=pwd_lama2></td>
						</tr>
						<tr>
							<td>Password Baru</td>
							<td> : <input type=password name=pwd_baru1></td></tr>
						<tr>
							<td>Ulangi Password Baru</td>
							<td> : <input type=password name=pwd_baru2></td>
						</tr>
						<tr>
						    <td colspan=2><input type=submit value='Ganti Password'>
							<input type=button value=Batal onclick=self.history.back()>
							</td>
						</tr>
					</table></form>"; 
					break;
	}
	?> 