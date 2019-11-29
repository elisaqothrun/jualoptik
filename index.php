<?php 
session_start();
include 'koneksi.php';
?>
 <!DOCTYPE html>
<html>
<head>
	<title>Optik Surya</title>
	<link rel="stylesheet" type="text-css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
</head>
</head>
<body>

<?php include "menu.php"; ?>

	<!--Konten-->
	<div class="col-md-10"></div>
	<section class="konten">
		<div class="container">
			<h1>Rekomendasi Produk</h1>

			<div class="row">

				<?php $ambil = $koneksi->query("SELECT * FROM barang"); ?>
				<?php while ($perbarang = $ambil->fetch_assoc() ){ ?>
					

				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $perbarang['GAMBAR_BARANG']; ?>" alt="">
						<div class="caption">
							<h3><?php echo $perbarang['NAMA_BARANG'];?></h3>
							<h5>Rp. <?php echo number_format($perbarang['HARGA_BARANG']);?></h5>
							<h6>Stok : <?php echo $perbarang['STOK_BARANG']; ?></h6>
								<a href="beli.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-info">Beli</a>
								<a href="detail.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-warning">Detail</a>
							
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

</body>
</html>