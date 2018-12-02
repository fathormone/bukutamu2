<?php 
include '../include/koneksi.php';
switch(@$_GET['act']){
default:
echo "<h2>Galeri</h2>
<form method=post action='?module=galeri&act=tambahgaleri'>
<input class='btn btn-primary' type=submit value='Tambah Galeri'>
</form>
<table class='table'>
<tr>
<th scope='col'>No</th>
<th scope='col'>Nama Galeri</th>
<th scope='col'>Tgl</th>
<th scope='col'>Galeri</th>
<th scope='col'>Aksi</th>
</tr>";
$tampil=mysqli_query($koneksi, "select * from galeri order by id_galeri");
$no=1;
while 
	($r=mysqli_fetch_array($tampil))
{
echo "<tr><td>$no</td>
<td>$r[nm_galeri]</td>
<td>$r[ket]</td>
<td>$r[tgl_galeri]</td>
<td><img src='galeri/$r[gambar]' width='50'></td>
<td><a class='btn btn-primary' href=?module=galeri&act=editgaleri&id=$r[id_galeri]>Edit</a>
<a class='btn btn-danger' href=\"aksi.php?module=galeri&act=hapus&id=$r[id_galeri]\"onClick=\"return confirm('apakah anda benar akan menghapus galeri $r[id_galeri]?')\">Hapus</a>
</td></tr>";
$no++;
}
echo "</table>";
break;
//tambah galeri
case "tambahgaleri":
echo "<h2>Tambah galeri</h2>
<form name='form1' method='post' action='aksi.php?module=galeri&act=input' enctype='multipart/form-data'>
<div class='col-md-5'>
  				<div class='form-group'>
    				<input class='form-control' name='nm_gal' type='text' size='35' placeholder='Enter Name Galeri'>
  				</div>
  				<div class='form-group'>
  					<textarea class='form-control' name='ket' cols='35' rows='4' placeholder='Enter Keterangan'></textarea>
  				</div>
  				<div class='form-group'>
  					<input name='gam' type=file >
  				</div>
  				<input type='submit' class='btn btn-primary' name='submit' value='Simpan'>
  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
			</div>
</form>";
break;
//edit galeri
case "editgaleri":
$edit=mysqli_query($koneksi, "select * from galeri where id_galeri='$_GET[id]'");
$r=mysqli_fetch_array($edit);
echo "<h2>Edit galeri</h2>
<form name='form1' method='post' action='aksi.php?module=galeri&act=update' enctype='multipart/form-data'>
<div class='col-md-5'>
  				<div class='form-group'>
  					<input type=hidden name=id value='$r[id_galeri]'>
    				<input class='form-control' name='nm_gal' type='text' size='35' value='$r[nm_galeri]'>
  				</div>
  				<div class='form-group'>
  					<textarea class='form-control' name='ket' cols='35' rows='4' placeholder='Enter Keterangan'>$r[ket]</textarea>
  				</div>
  				<div class='form-group'>
  					<img src='galeri/$r[gambar]' width='50'><br>
  					<input name='gam' type=file size='30'>
  				</div>
  				<input type='submit' class='btn btn-primary' value='Update'>
  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
			</div>
</form>";
break;}
?>