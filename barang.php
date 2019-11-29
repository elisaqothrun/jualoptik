
<?php 
include 'koneksi.php';
$cat = $_GET['id'];
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Optik Surya</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
<?php include "menu.php"; ?>


  <!--Konten-->
  <section class="konten">
    <div class="container">
      <h1>Barang</h1>

      <div class="row">

        <?php $ambil = $koneksi->query("SELECT* FROM kategori JOIN barang ON kategori.ID_KATEGORI = barang.ID_KATEGORI where kategori.ID_KATEGORI='$cat'"); 
          while ($perbarang = $ambil->fetch_assoc() ){ ?>


        <div class="col-md-3">
          <div class="thumbnail">
            <img src="foto_produk/<?php echo $perbarang['GAMBAR_BARANG']; ?>" alt="">
            <div class="caption">
              <h3><?php echo $perbarang['NAMA_BARANG'];?></h3>
              <h5>Rp. <?php echo number_format($perbarang['HARGA_BARANG']);?></h5>
                <a href="beli.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-primary">Beli</a>


            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
?>

</body>
</html>

