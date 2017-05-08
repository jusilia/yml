<?php include_once ('template_atas.php') ; ?>	
	<?php
		include "koneksi_tugas.php";
		$sql = "select * from buku where idBuku='$_GET[idBuku]'";
		$hasil = mysqli_query($kon, $sql);
		if (!$hasil)
			die("Gagal query..".mysqli_error($kon));
	?>
	<a href="buku_isi.php">Input Buku</a>
	&nbsp;&nbsp;&nbsp;
	<a href="buku_cari.php">Cari Buku</a>
	&nbsp;&nbsp;&nbsp;
	<a href="buku_tampil.php">Daftar Buku</a>
	<h1>Informasi Buku</h1>
	<table border="1">
		<?php
			$no = 0;
			while ($row = mysqli_fetch_assoc($hasil)) {
				echo "<tr>";
				echo "<td colspan='2' align='center'><a href='pict/{$row['foto']}'/>
					  <img src='thumb/t_{$row['foto']}' width='140' height='180'/>
					  </a></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Kode Buku</td>";
				echo "<td>".$row['kode']."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Judul Buku</td>";
				echo "<td>".$row['judul']."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Pengarang</td>";
				echo "<td>".$row['pengarang']."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Penerbit</td>";
				echo "<td>".$row['penerbit']."</td>";
				echo "</tr>";
			}
		?>
	</table>
<?php include_once ('template_bawah.php') ; ?>