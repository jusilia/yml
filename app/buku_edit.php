<?php include_once ('template_atas.php') ; ?>  
  <?php
  	$idBuku = $_GET["idBuku"];
  	include "koneksi_tugas.php";
  	$sql = "select * from Buku where idBuku = '$idBuku'";
  	$hasil = mysqli_query($kon,$sql);
  	if (!$hasil) die ("Gagal Query...");
  	
  	$data = mysqli_fetch_array($hasil);
  	$kode = $data["kode"];
  	$judul = $data["judul"];
  	$pengarang = $data["pengarang"];
  	$penerbit = $data["penerbit"];
  	$stok = $data["stok"];
  	$foto = $data["foto"];
  	
  ?>
  <h2>.:: EDIT Buku ::. </h2>
  <form action="Buku_simpan.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="idBuku" value="<?php echo $idBuku;?>" />
   <table border="1">
    <tr>
     <td> Kode </td>
     <td><input type="text" name="kode" value="<?php echo $kode;?>" /></td>
    </tr>
    <tr><tr>
     <td> Judul Buku </td>
     <td><input type="text" name="judul" value="<?php echo $judul;?>" /></td>
    </tr>
    <tr>
     <td> Pengarang </td>
     <td><input type="text" name="pengarang" value="<?php echo $pengarang;?>" /></td>
    </tr>
    <tr>
     <td> Penerbit </td>
     <td><input type="text" name="penerbit" value="<?php echo $penerbit;?>" /></td>
    </tr>
    <tr>
    <tr>
     <td> Stok </td>
     <td><input type="text" name="stok" value="<?php echo $stok;?>" /></td>
    </tr>
    <tr>
  	<td>Gambar [Max=1.5Mb]</td>
  	<td>
  	<input type="file" name="foto">
  	<input type="hidden" name="foto_lama" value="<?php echo $foto;?>" /><br />
  	<img src="<?php echo "thumb/t_".$foto; ?>" width="100px" />
  	</td>
    </tr>
    <tr>
     <td colspan="2" align="center">
      <input type="submit" value="Simpan" name="proses" />
  	<input type="reset" value="Reset" name="reset" />
     </td>
    </tr>
   </table>
  </form>
<?php include_once ('template_bawah.php') ; ?>