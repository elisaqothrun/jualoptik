<<<<<<< HEAD
<h2> Data Produk </h2>
<p><a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Barang Baru</a>
</p>

<table class= "table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Id barang</th>
			<th>Kategori</th>
			<th>Nama barang</th>
			<th>harga</th>
			<th>stok</th>
			<th>tanggal kadaluarsa</th>
			<th>foto</th>
			<th>deskripsi barang</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil = $koneksi-> query ("SELECT * FROM barang JOIN kategori ON barang.ID_KATEGORI = kategori.ID_KATEGORI"); ?>
	<?php while ($pecah =$ambil-> fetch_assoc()){ ?>
	<tr>
		<td><?php echo $nomor;?></td>
		<td><?php echo $pecah['ID_BARANG'];?></td>
		<td><?php echo $pecah['KATEGORI'];?></td>
		<td><?php echo $pecah['NAMA_BARANG'];?></td>
		<td><?php echo $pecah['HARGA_BARANG'];?></td>
		<td><?php echo $pecah['STOK_BARANG'];?></td>
		<td><?php echo $pecah['TGL_KADALUARSA'];?></td>
		<td><img src="../foto_produk/<?php echo $pecah['GAMBAR_BARANG']; ?>" width="100"></td>
		<td><?php echo $pecah['DESKRIPSI_BARANG'];?></td>
		<td>
		<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['ID_BARANG'];?> " class="btn-danger btn">hapus</a>
		<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['ID_BARANG'];?> " class="btn-warning btn">edit</a>
		</td>
		
	</tr>
	<?php $nomor++ ?>
	<?php } ?>
		
	</tbody>
=======
<h2> Data Produk </h2>
<p><a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Barang Baru</a>
</p>

<table class= "table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Id barang</th>
			<th>Kategori</th>
			<th>Nama barang</th>
			<th>harga</th>
			<th>stok</th>
			<th>tanggal kadaluarsa</th>
			<th>foto</th>
			<th>deskripsi barang</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil = $koneksi-> query ("SELECT * FROM barang JOIN kategori ON barang.ID_KATEGORI = kategori.ID_KATEGORI"); ?>
	<?php while ($pecah =$ambil-> fetch_assoc()){ ?>
	<tr>
		<td><?php echo $nomor;?></td>
		<td><?php echo $pecah['ID_BARANG'];?></td>
		<td><?php echo $pecah['KATEGORI'];?></td>
		<td><?php echo $pecah['NAMA_BARANG'];?></td>
		<td><?php echo $pecah['HARGA_BARANG'];?></td>
		<td><?php echo $pecah['STOK_BARANG'];?></td>
		<td><?php echo $pecah['TGL_KADALUARSA'];?></td>
		<td><img src="../foto_produk/<?php echo $pecah['GAMBAR_BARANG']; ?>" width="100"></td>
		<td><?php echo $pecah['DESKRIPSI_BARANG'];?></td>
		<td>
		<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['ID_BARANG'];?> " class="btn-danger btn">hapus</a>
		<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['ID_BARANG'];?> " class="btn-warning btn">edit</a>
		</td>
		
	</tr>
	<?php $nomor++ ?>
	<?php } ?>
		
	</tbody>
>>>>>>> 6964c6a69b110a9b3c0575ba58c7a0e603ed84b5
</table>