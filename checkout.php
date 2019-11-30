<?php
session_start();
include 'koneksi.php';
//jk adasessiom pembeli (belum login), mk dilarikan ke login.php
if (!isset($_SESSION["pembeli"])) 
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php' ; </script>";	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="ADMIN2 /assets/css/bootstrap.css">
</head>
<body>
<?php include "menu.php"; ?>

  <!--Konten-->
	<section class="konten">
		<div class="container">
		<!--<h1>Keranjang</h1>-->
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Sub total</th>

					</tr>
				</thead>
				<tbody>
				<?php $nomor=1 ?>
				<?php $totalbelanja = 0; ?>

				<?php  foreach ($_SESSION["keranjang"] as $ID_BARANG=>$jumlah):?>
				<!--menampilkan produk yang di masukan ke keranjang berdasarkan id baranf -->
				<?php
				$ambil = $koneksi->query("SELECT * FROM barang WHERE ID_BARANG='$ID_BARANG'");
				$pecah =$ambil->fetch_assoc();
				$subtotal = $pecah["HARGA_BARANG"]*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah['NAMA_BARANG'];?></td>
					<td>Rp. <?php echo number_format($pecah['HARGA_BARANG']);?></td>
					<td><?php echo $jumlah ;?></td>
					<td>Rp. <?php echo number_format($subtotal);?></td>
				</tr>
				<?php $nomor++ ?>
				<?php $totalbelanja+=$subtotal; ?>
				<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total Belanja</th>
						<th>Rp. <?php echo number_format($totalbelanja) ?></th>
					</tr>
				</tfoot>
			</table>
			<form method="post">
				<div class="row">	
				<div class="col-md-2">
				<div class="form-group">
				 <input type="text" readonly value="<?php echo $_SESSION["pembeli"]['NAMA_PEMBELI'] ?>" 
					class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["pembeli"]['NO_TELEPON'] ?>"
						 class="form-control">	
						 </div>
						 </div>	
					<div class="col-md-2">
						<select class="form-control" name="ID_ONGKIR">
							<option value="" >Pilih Ongkos Kirim</option>
							<?php
							$ambil = $koneksi->query("SELECT * FROM ongkir");
							while ($perongkir = $ambil-> fetch_assoc()) {
							?>
							<option value="<?php echo $perongkir["ID_ONGKIR"]?>">
								<?php
								echo $perongkir['KOTA'];
							 	echo number_format($perongkir['TARIF']);
								?>
							</option> 
						<?php } ?>
							
						</select>
				</div>
			</div>
			<button class="btn btn-primary" name="nota">Nota</button>
			</form>

			<?php
			if (isset($_POST["nota"]))
			 {
				$nik = $_SESSION["pembeli"]["NIK"];
				$id_admin= $_POST["ID_ADMIN"];
				$id_pemesanan = $_POST["ID_PEMESANAN"];
				$id_ongkir = $_POST["ID_ONGKIR"];
				$tgl_pemesanan =date("Y-m-d");
				$ambil = $koneksi->query("SELECT * FROM ongkir WHERE ID_ONGKIR='$ID_ONGKIR'");
				$arrayongkir = $ambil -> fetch_assoc();
				$taris= $arrayongkir['TARIF'];
				$totalharga = $totalbelanja + $TARIF;
				//1. menyimpan data ke tabel pembelian
				$koneksi->query("INSERT INTO pemesanan (ID_PEMESANAN, ID_ADMIN, ID_ONGKIR, NIK, TGL_PEMESANAN, TOTAL_HARGA, JUMLAH_BARANG, BUKTI_PEMBAYARAN,STATUS_PEMBAYARAN,TGL_TRANSFER) VALUES ('$id_pemesanan', '$id_admin','$id_ongkir','$nik','$tgl_pemesanan','$totalharga', '$JUMLAH_BARANG','$BUKTI_PEMBAYARAN','$STATUS_PEMBAYARAN','$TGL_TRANSFER')");
				//mendapat ID_PEMESANAN barusan terjadi
				$id_pemesanan_baru = $koneksi->insert_id;
				foreach ($_SESSION["keranjang"] as $ID_BARANG => $jumlah) 
				{
					$koneksi->query("INSERT INTO pemesanan (ID_PEMESANAN, ID_ADMIN, ID_ONGKIR, NIK, TGL_PEMESANAN, TOTAL_HARGA, JUMLAH_BARANG, BUKTI_PEMBAYARAN,STATUS_PEMBAYARAN,TGL_TRANSFER) VALUES ('$id_pemesanan_baru', '$ID_ADMIN','$ID_ONGKIR','$NIK','$TGL_PEMESANAN','$TOTAL_HARGA', '$JUMLAH_BARANG','$BUKTI_PEMBAYARAN','$STATUS_PEMBAYARAN','$TGL_TRANSFER')");
				}
			}
			?>
			</div>
			
</section>

<pre><?php print_r($_SESSION['pembeli']) ?></pre>
<pre><?php print_r($_SESSION["keranjang"]) ?></pre>
</body>
</html>