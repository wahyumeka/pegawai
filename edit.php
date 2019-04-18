<?php
include "koneksi.php";

if (isset($_GET['nip'])) {
	$nip = $_GET['nip'];
} else {
	die ("Error. No Nip Selected! ");	
}

$query = "SELECT * FROM pegawai WHERE nip='$nip'";
$sql = mysql_query ($query);
$hasil = mysql_fetch_array ($sql);
$nip = $hasil['nip'];
$nama = stripslashes ($hasil['nama']);
$jenkel = $hasil['jenkel'];
list($thn,$bln,$tgl) = explode ("-",$hasil['tgllahir']);
$alamat = stripslashes ($hasil['alamat']);
$namafoto = stripslashes ($hasil['namafoto']);
$foto = $hasil['namafoto'];

//proses edit
if (isset($_POST['Edit'])) {
	$nip = $_POST['hnip'];
	$nama = addslashes (strip_tags ($_POST['nama']));
	$tgllahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$jenkel = $_POST['jenkel'];
	$alamat = addslashes (strip_tags ($_POST['alamat']));
	$namafoto = $_FILES['foto']['name'];
	if (strlen($namafoto)>0) {
		//upload
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
			move_uploaded_file ($_FILES['foto']['tmp_name'], "images/".$namafoto);
			mysql_query ("UPDATE pegawai SET namafoto='$namafoto' WHERE nip='$nip'");
		}
	}
	//update data
	$query = "UPDATE pegawai SET nama='$nama',tgllahir='$tgllahir',jenkel='$jenkel',
			  alamat='$alamat' WHERE nip='$nip'";
	$sql = mysql_query ($query);
	if ($sql) {
			echo"<script>alert('Data Pegawai telah berhasil diedit !',document.location.href='index.php')</script>";
	} else {
			echo"<script>alert('Data Pegawai gagal diedit !',document.location.href='index.php')</script>";
	}
}
?>
<div id="content">
	<h2 align="center">Edit Data Pegawai</h2>
	<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" border="0" width="950">
			
			<tr>
				<td width="271">NIP</td>
				<td width="463">: <b><?php echo $nip; ?></b></td>
				<td width="216">Foto: <?php echo $namafoto; ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>: <input type="text" name="nama" size="30" maxlength="30" value="<?php echo $nama; ?>"></td>
				<td rowspan="4"><?php echo "<img src='images/$foto' width='180' height='180'/>"; ?></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>: 
				<select name="tgl">
				<?php
					for ($i=1; $i<=31; $i++) {
						$tg = ($i<10) ? "0$i" : $i;
						$sele = ($tg==$tgl)? "selected" : "";
						echo "<option value='$tg' $sele>$tg</option>";	
					}
				?>
				</select> - 
				<select name="bln">
				<?php
					for ($i=1; $i<=12; $i++) {
						$bl = ($i<10) ? "0$i" : $i;
						$sele = ($bl==$bln)?"selected" : "";
						echo "<option value='$bl' $sele>$bl</option>";	
					}
				?>
				</select> - 
				<select name="thn">
				<?php
					for ($i=1970; $i<=2000; $i++) {
						$sele = ($i==$thn)?"selected" : "";
						echo "<option value='$i' $sele>$i</option>";	
					}
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>: <input type="radio" name="jenkel" value="0" <?php echo ($jenkel==0)?"checked":""; ?>> Pria &nbsp;&nbsp;
				<input type="radio" name="jenkel" value="1" <?php echo ($jenkel==1)?"checked":""; ?>> Wanita</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: <textarea name="alamat" cols="40" rows="3"><?php echo $alamat; ?></textarea></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td>: <input type="file" name="foto"/></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;&nbsp;
				<input type="hidden" name="hnip" value="<?php echo $nip; ?>">
				<input type="submit" name="Edit" value=" Simpan ">&nbsp;
				<input type="reset" name="reset" value=" Reset ">&nbsp;
				<a href="index.php"><input type="button" name="" value=" Kembali "/></a></td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</FORM>
</div>