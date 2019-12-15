<<<<<<< HEAD
<?php
$koneksi->query("DELETE FROM barang WHERE ID_BARANG='$_GET[id]'");
echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk;</script>";
//to redirect user to go back to page product.php after transaction
header("location: produk.php");
=======
<?php
$koneksi->query("DELETE FROM barang WHERE ID_BARANG='$_GET[id]'");
echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk;</script>";
//to redirect user to go back to page product.php after transaction
header("location: produk.php");
>>>>>>> 6964c6a69b110a9b3c0575ba58c7a0e603ed84b5
?> 