<?php include_once ('template_atas.php') ; ?>
  <h2>INPUT Buku</h2>
  <form action="buku_simpan.php" method="post" enctype="multipart/form-data">
   <table border="0">
    <tr>
     <td colspan="2"><hr/></td>
    </tr>
    <tr>
     <td> Kode </td>
     <td><input type="text" name="kode" size="10" /></td>
    </tr>
    <tr>
     <td> Judul Buku </td>
     <td><input type="text" name="judul" size="25" /></td>
    </tr>
    <tr>
     <td> Pengarang </td>
     <td><input type="text" name="pengarang" size="25" /></td>
    </tr>
    <tr>
     <td> Penerbit </td>
     <td><input type="text" name="penerbit" size="25" /></td>
    </tr>
    <tr>
     <td> Jumlah Stok </td>
     <td><input type="text" name="stok" size="10" /></td>
    </tr>
    <tr>
     <td> Foto Sampul </td>
     <td><input type="file" name="foto"/></td>
    </tr>
    <tr>
     <td colspan="2" align="left">
     <hr />
      <input type="submit" value="Simpan" name="proses" />
  	  <input type="reset" value="Reset" name="reset" />
     </td>
    </tr>
   </table>
  </form>
<?php include_once ('template_bawah.php') ; ?>