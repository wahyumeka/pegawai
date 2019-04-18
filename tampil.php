<?php
include "koneksi.php";
?>
<div id="content">
	<h2 align="center">DATA PEGAWAI</h2>
	<a href="index.php?page=input"><input type="button" name="" value=" Input Data "/></a>
	<table width="100%"  border="1"    id="table">
	<thead>
	<tr>
		<th width="3%">No</th>
		<th width="18%">NIP</th>
		<th width="18%">Nama</th>
		<th width="10%">Tgl Lahir</th>
		<th width="13%">Jenis Kelamin</th>
		<th width="22%">Alamat</th>
		<th width="10%">Foto</th>
		<th width="6%">Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$no = 1;
	$query = "SELECT * FROM pegawai ORDER BY nip";
	$sql = mysql_query ($query);
	while ($hasil = mysql_fetch_array ($sql)) {
		$nip = $hasil['nip'];
		$nama = stripslashes ($hasil['nama']);
		$jenkel = ($hasil['jenkel']==0)?"Laki-laki": "Wanita";
		$tgllhr = stripslashes ($hasil['tgllahir']);
		$alamat = stripslashes ($hasil['alamat']);
		$foto = $hasil['namafoto'];
		$warna = ($no%2==1)?"#ffffff":"#efefef";

		//tampilkan data pegawai
	?>

		<tr bgcolor="<?php echo $warna; ?>">
			<td><?php echo $no; ?></td>
			<td><?php echo $nip; ?></td>
			<td><?php echo $nama; ?></td>
			<td><?php echo $tgllhr; ?></td>
			<td><?php echo $jenkel; ?></td>
			<td><?php echo $alamat; ?></td>
			<td><?php echo "<img src='images/$foto' width='1000' height='1000'/>"; ?></td>
			<td> 
			<a href="index.php?page=edit&nip=<?php echo $nip; ?>"><input type="button" name="" value=" Edit "/></a><br/>
			<a href="index.php?page=delete&nip=<?php echo $nip; ?>" onclick="return confirm('Anda yakin akan menghapus pegawai <?php echo $nama; ?> ?')"><input type="button" name="" value=" Delete "/></a></td>
		</tr>	
	<?php $no++; }?>
	</tbody>
	</table>
</div>