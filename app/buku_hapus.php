<?php include_once ('template_atas.php') ; ?>	
	<?php
		$idBuku = $_GET["idBuku"];
		include "koneksi_tugas.php";
		$sql = "select * from buku where idBuku = '$idBuku'";
		$hasil = mysqli_query($kon, $sql);
		if (!$hasil) die ("Gagal Query...");
		
		$data = mysqli_fetch_array($hasil);
		$kode = $data["kode"];
		$judul = $data["judul"];
		$pengarang = $data["pengarang"];
		$penerbit = $data["penerbit"];
		$stok = $data["stok"];
		$foto = $data["foto"];
			
		echo "<h2>Konfirmasi Hapus Buku</h2>";
		echo "<table border='1' width='400px'>";
		echo "<tr>";
		echo " <td colspan='2' align='center'>";
		echo "	<img src='thumb/t_".$foto."' width='100px' /><br/><br/>";
		echo " </td>";
		echo "</tr>";
		echo "<tr>";
		echo " <td>Kode </td>";
		echo " <td>".$kode."</td>";
		echo "</tr>";
		echo "<tr>";
		echo " <td>Judul Buku </td>";
		echo " <td>".$judul."</td>";
		echo "</tr>";
		echo "<tr>";
		echo " <td>Pengarang </td>";
		echo " <td>".$pengarang."</td>";
		echo "</tr>";
		echo "<tr>";
		echo " <td>Penerbit </td>";
		echo " <td>".$penerbit."</td>";
		echo "</tr>";
		echo "</table>";
		echo "<hr/>";
		echo "<fieldset>";
		echo "APAKAH DATA BUKU INI AKAN DIHAPUS? <br />";
		echo "  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "   <a href='buku_hapus.php?idBuku=$idBuku&hapus=1'> YA </a>";
		echo "  &nbsp;&nbsp;";
		echo "   <a href='buku_tampil.php'> Tidak </a><br /><br />";
		echo "</fieldset>";
		
		if(isset($_GET['hapus'])){
			$sql = "delete from buku where idBuku = '$idBuku'";
			$hasil = mysqli_query($kon, $sql);
			if (!$hasil){
				echo "Gagal Hapus Buku: $nama ..<br />";
				echo "<a href='buku_tampil.php'>Kembali Ke Daftar Buku</a>";
			} else {
				$gbr = "pict/$foto";
				if (file_exists($gbr)) unlink($gbr);
				$gbr = "thumb/t_$foto";
				if (file_exists($gbr)) unlink($gbr);
				header('location:buku_tampil.php');
			}
		}	
	?>
<?php include_once ('template_bawah.php') ; ?>