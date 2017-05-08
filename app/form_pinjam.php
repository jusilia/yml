<?php include_once ('template_atas.php') ; ?>
   <h2>DATA PEMINJAM BUKU</h2>
   <form action='simpan_pinjam.php' method="POST">
   <table border="0">
   <tr>
      <td>Nama</td>
      <td>: <input type="text" name="nama"></td>
   </tr>
   <tr>
      <td>Email</td>
      <td>: <input type="text" name="email"></td>
   </tr>
   <tr>
   	<td>No. Telp</td>
      <td>: <input type="text" name="notelp"></td>
   </tr>
   <tr>
      <td colspan="2" align="right">
      	<input type="submit" value="simpan"/>
      </td>
   </tr>
   </table>
   </form>
   <?php include_once ("keranjang_peminjaman.php"); ?>
<?php include_once ('template_bawah.php') ; ?>