<?php 
include '../include/koneksi.php';
switch(@$_GET['act']){
default:
echo "<h2>Buku Tamu</h2>
<form method=post action='?module=bukutamu&act=tambahbukutamu'>
<input class='btn btn-primary' type=submit value='Tambah buku tamu'>
</form>
<table class='table'>
<tr>
<th scope='col'>No</th>
<th scope='col'>Nama </th>
<th scope='col'>Email</th>
<th scope='col'>Website</th>
<th scope='col'>Tanggal</th>
<th scope='col'>Komentar</th>
<th scope='col'>Aksi</th>

</tr>";
$tampil=mysqli_query($koneksi, "select * from buku_tamu order by id_bktamu");
$no=1;
while 
	($r=mysqli_fetch_array($tampil))
{
echo "<tr><td>$no</td>
<td>$r[nm_bktamu]</td>
<td>$r[email_bktamu]</td>
<td>$r[alamat_bktamu]</td>
<td>$r[tgl_bktamu]</td>
<td>$r[komentar]</td>
<td> <a class='btn btn-danger' href=\"aksi.php?module=bukutamu&act=hapus&id=$r[id_bktamu]\"onClick=\"return confirm('apakah anda benar akan menghapus galeri $r[id_bktamu]?')\">Hapus</a>
</td>
</tr>";
$no++;
}
echo "</table>";
break;
//tambah galeri
case "tambahbukutamu":
echo "<h2>Tambah Buku Tamu</h2>
<form method='post' action='aksi.php?module=bukutamu&act=input'>
<div class='col-md-5'>
  				<div class='form-group'>
    				<input class='form-control' name='nama' type='text' placeholder='Enter Name'>
  				</div>
          <div class='form-group'>
            <input class='form-control' name='email' type='text' placeholder='Enter Email'>
          </div>
          <div class='form-group'>
            <input class='form-control' name='website' type='text' placeholder='Enter Website'>
          </div>
          <div class='form-group'>
            <textarea id='mytextarea' name='text'></textarea>
          </div>
  				<input type='submit' class='btn btn-primary' name='submit' value='Simpan'>
  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
			</div>
</form>";
break;}
?>

<script type="text/javascript" src="../tinymce/tinymce.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#mytextarea"
        });
    </script>