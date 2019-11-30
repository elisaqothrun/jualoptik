
 <!-- Navbar -->
          <link rel="stylesheet" href="../../assets/css/bootstrap.css">
     <nav class="navbar navbar-light" style="background-color: #e67e22; ">
    <div class="container">

      <ul class="nav navbar-nav">


          <li><a href="index.php">Optik Surya</li>
          <li><a href="kategori.php">Kategori</li>
          <li><a href="keranjang.php">Keranjang</li>
          <li><a href="daftar.php">Daftar</li>

            <!--jk sudah login(ada session pembeli)-->
            <?php if (isset($_SESSION["pembeli"])): ?> 
            <li><a href="logout.php">Logout</a></li>
             <!--jika belum login belum ada session pembeli--> 
            <?php else : ?>
              <li><a href="login.php">Login</a></li>
            <?php endif ?>

      </ul>

      <form action="pencarian.php" method="get" class="navbar-form navbar-right">
        <input type="text" class="form-control" name="keyword">
        <button class="btn btn-primary">Cari</button>
      </form>
    </div>
  </nav>