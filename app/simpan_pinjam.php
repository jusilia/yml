<?php include_once ('template_atas.php') ; ?>	
	<?php
	 $nama			= $_POST['nama'];
	 $email			= $_POST['email'];
	 $notelp		= $_POST['notelp'];
	 $tanggal		= date("Y-m-d");
	 $buku_pilih	= '';
	 $qty			= 1;

	 $dataValid		= "YA";
	 if (strlen(trim($nama))==0){
		echo "Nama Harus Diisi..<br/>";
		$dataValid	= "Tidak";
	}
	 if (strlen(trim($notelp))==0){
		echo "No. Telp Harus Diisi..<br/>";
		$dataValid	= "Tidak";
	}
	if (isset($_COOKIE['keranjang'])){
		$buku_pilih=$_COOKIE['keranjang'];
	}else{
		echo "keranjang Belanja Kosong..<br/>";
		$dataValid	= "Tidak";
	}
	if ($dataValid == "TIDAK"){
		echo "Masih Ada Kesalahan, silahkan perbaiki!<br />";
		echo "<input type='button' value='Kembali'
			  onClick='self.history.back()'>";
		exit;
	 }

	include "koneksi_tugas.php";
	$simpan = true ;
	$mulai_transaksi = "start transaction";
		mysqli_query($kon, $mulai_transaksi);

	$sql = "insert into hpinjam (tanggal, nama, email, notelp)
	        values ('$tanggal','$nama','$email','$notelp')";

	$hasil = mysqli_query($kon, $sql);
	if(!$hasil){
	  echo "Data Peminjam Gagal Simpan<br/>";
	  $simpan = false;
	}
	$idhpinjam = mysqli_insert_id($kon);
	if($idhpinjam==0){
	  echo "Data Peminjam Tidak Ada<br/>";
	  $simpan = false;
	}

	$buku_array = explode(",",$buku_pilih);
	$jumlah = count($buku_array);
	if($jumlah <=1){
	  echo "Tidak Ada Buku Yang Dipilih<br/>";
	  $simpan = false;
	}else{
	  foreach($buku_array as $idbuku){
	   if($idbuku == 0){
	     continue;
		 }
		 $sql="select * from buku where idbuku = $idbuku";
		 $hasil = mysqli_query($kon, $sql);
		 if(!$hasil){
		    echo "Buku Tidak Ada<br/>";
			$simpan = false;
			break;
			}else{
			    $row = mysqli_fetch_assoc($hasil);
				$stok = $row['stok'] -1 ;
				if($stok < 0){
				echo "stok Buku".$row['nama']."Kosong<br/>";
		        $simpan = false;
		        break;
		   		}
		$stok = $row['stok'];
	}		
	$sql = "insert into dpinjam (idhpinjam,idbuku,qty)
	        values ('$idhpinjam','$idbuku','$qty')";
	$hasil = mysqli_query($kon, $sql);
	if(!$hasil){
	  echo "Detail Pinjam Gagal Simpan<br/>";
	  $simpan = false;
	  break;
	  }
	  $sql = "update buku set stok = $stok  
	          where idbuku = $idbuku";
	$hasil=mysqli_query($kon, $sql);
	if(!$hasil){
	  echo "Update Stok Buku Gagal<br/>";
	  $simpan = false;
	  break;
	     }
	   }
	 }
	 if($simpan){
	   $komit = mysqli_commit($kon);
	 }else{
	   $rollback = mysqli_rollback($kon);
	   echo "Peminjaman Gagal<br/>
	         <input type='button' value='kembali'
			 onClick='self.history.back()'>";
		exit;
	}
	header("Location: bukti_pinjam.php?idhpinjam=$idhpinjam");

	echo "Data siap Disimpan.";
	setcookie('keranjang',$buku_pilih, time()-3600);
	?>
<?php include_once ('template_bawah.php') ; ?>