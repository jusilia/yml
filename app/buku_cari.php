<?php include_once ('template_atas.php') ; ?>
	<form action="buku_tampil.php" method="post">
		<h2>.:: Cari Buku ::. </h2>
		<hr/>
		<table border="0">
		<tr>
		<td>Judul</td>
		<td><input type="text" name="judul" /><br/></td>
		</tr>
		<tr>
		<td>Pengarang</td>
		<td><input type="text" name="pengarang" /></td>
		</tr>
		</table>
		<hr/>
		<input type="submit" value="CARI" />
	</form>
<?php include_once ('template_bawah.php') ; ?>