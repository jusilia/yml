<?php include_once('template_atas.php') ; ?>
<?php
	$judul = "";
	$pengarang = "";

	include "koneksi_tugas.php";
		if (isset($_POST["judul"]) || isset($_POST["pengarang"]) ) {
			if (!empty($_POST["judul"]) && !empty($_POST["pengarang"]))
			{
				// jika judul dan pengarang diisi
				$nama_barang = $_POST['judul'];
				$sqlwhere = "where judul like '%".$judul."%' AND pengarang like '%".$pengarang."%'";
			}
			else if (!empty($_POST["pengarang"]))
			{
				//jika pengarang saja yang diisi
				$pengarang = $_POST['pengarang'];
				$sqlwhere = "where pengarang like '%".$pengarang."%'";
			} else
			{
				//jika judul saja yang diisi
				$sqlwhere = "where judul like '%".$judul."%'";
			}
		}  else
		{
			$sqlwhere='';
		}

		$sql = "select * from buku  $sqlwhere order by idBuku desc";
		$hasil = mysqli_query($kon, $sql);
		if (!$hasil)
			die("Gagal query..".mysqli_error($kon));
	?>
	<a href="buku_isi.php">Input Buku</a>
	&nbsp;&nbsp;&nbsp;
	<a href="buku_cari.php">Cari Buku</a>
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
				echo "<td><a href='buku_detail.php?idBuku=".$row['idBuku']."'/>Lihat Buku</a>";
				echo "&nbsp;|&nbsp;";
				echo "<a href='buku_edit.php?idBuku=".$row['idBuku']."'> Edit Buku</a>";
				echo "&nbsp;|&nbsp;";
				echo "<a href='buku_hapus.php?idBuku=".$row['idBuku']."'> Hapus Buku</a>";
				echo "</td>";
				echo "</tr>";
			}
		?>
	</table>
<?php include_once ('template_bawah.php') ; ?>