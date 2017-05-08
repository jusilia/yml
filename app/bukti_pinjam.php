<?php include_once ('template_atas.php') ; ?>
	<style type="text/css">
	@media print{
		#tombol{
			display : none;
		}
	}
	</style>

	<div id="tombol">
		<input type="button" value="Pinajm Buku"
				onClick ="window.location.assign('buku_tersedia.php')">
		<input type="button" value="Print"
				onClick ="window.print()">
	<div/>

	<?php
		$idhpinjam=$_GET["idhpinjam"];
		include "koneksi_tugas.php";
		$sqlhpinjam		= "SELECT * FROM hpinjam where idhpinjam = $idhpinjam";
		$hasilhpinjam	= mysqli_query($kon, $sqlhpinjam);
		$rowhpinjam		= mysqli_fetch_assoc($hasilhpinjam);

		echo "<pre>";
			echo "<h2>BUKTI PEMINJAMAN</h2>";
			echo "NO.		: ".date("Ymd").$rowhpinjam['idhpinjam']."<br/>";
			echo "TANGGAL 	: ".$rowhpinjam['tanggal']."<br/>";
			echo "NAMA 		: ".$rowhpinjam['nama']."<br/>";;
			$sqldpinjam = "SELECT buku.judul, buku.pengarang, dpinjam.qty,
						(dpinjam.qty * dpinjam.qty)as Total
						from dpinjam inner join buku
						on dpinjam.idbuku = buku.idbuku
						where dpinjam.idhpinjam = $idhpinjam";
			$hasildpinjam = mysqli_query($kon, $sqldpinjam);
		echo "<table border = '1' cellpadding = '10' cellspacing='0'>";
			echo "<tr>";
			echo "<th> Judul Buku </th>";
			echo "<th> Pengarang </th>";
			echo "</tr>";
			$totalbuku=0;
			while($rowdpinjam = mysqli_fetch_assoc($hasildpinjam)){
				echo "<tr>";
				echo "<td>".$rowdpinjam['judul']."</td>";
				echo "<td>".$rowdpinjam['pengarang']."</td>";
				echo "</tr>";
				$totalbuku=$totalbuku + $rowdpinjam['qty'];
			}
			echo "<th> Total Buku </th>";
			echo "<td> <strong>$totalbuku</strong> </td>";
		echo "</table>";
		echo "</pre>";
	?>
<?php include_once ('template_bawah.php') ; ?>