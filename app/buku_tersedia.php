<?php include_once ('template_atas.php') ; ?>
	<?php
	 $buku_pilih = 0;
	 if (isset($_COOKIE['keranjang'])){
	 	$buku_pilih = $_COOKIE['keranjang'];
	 }
	 if (isset($_GET['idBuku'])){
	 	$idBuku = $_GET['idBuku'];
	 	$buku_pilih = $buku_pilih .",". $idBuku;
	 	setcookie('keranjang',$buku_pilih,time()+3600);
	 }
	 include "koneksi_tugas.php";
	 $sql = "select * from buku where idBuku not in (".$buku_pilih.") and stok > 0 ORDER BY idBuku DESC";
	 $hasil = mysqli_query($kon, $sql);
	 if (!$hasil)
	 	die ("Gagal query..".mysqli_error($kon));
	 ?>
	 <h2>DAFTAR BUKU TERSEDIA</h2>
	<table border="1">
		<tr>
			<th>Foto</th>
			<th>Judul Buku</th>
			<th>Pengarang</th>
			<th>Operasi</th>
		</tr>
		<?php
			$no = 0;
			while ($row = mysqli_fetch_assoc($hasil)) {
				echo "<tr>";
				echo "<td><a href='pict/{$row['foto']}'/>
					  <img src='thumb/t_{$row['foto']}' width='100'/>
					  </a></td>";
				echo "<td>".$row['judul']."</td>";
				echo "<td>".$row['pengarang']."</td>";
				echo "<td> <a href='".$_SERVER['PHP_SELF']."?idBuku=".$row['idBuku']."'> PINJAM </a>";
				echo "</td>";
				echo "</tr>";
			}
		?>
	</table>
<?php include_once ('template_bawah.php') ; ?>