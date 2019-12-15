<?php $koneksi = new mysqli("localhost", "root","alvadebian","jualoptik"); 
if (!$koneksi){
    die("Database tidak terkoneksi. " . mysqli_connect_error());
}
?>