<?php 
require_once 'koneksi.php';
require_once 'header.php';

if (!isset($_get['id_order'])) {header('location: laporan.php'); }
?>

<div class="container mt-5">
 <h4>detail order</h4>
 <br>

<a href="laporan.php">
 <button class="btn btn-success btn-sm">
  <i class="fa fa-arrow-left"></i> kembali
 </button>
 </a>

 <table class="table table-bordered mt-3">
  <thead align="center">
   <tr>
    <th>#</th>
    <th>nama produk</th>
    <th>pembelian</th>
   </tr>
  </thead>
  <tbody>


  <?php
  $query=mysqli_query($conn, "select * from 'tb_detail_order' inner join tb_produk on
  tb_detail_order.id_produk= tb_produk.id where id_order= '$_get[id_order]'");
  $no=1;

  while($detail=$query->fetch_assoc()) ;
   ?>

   <tr>
    <td align="center"><?= $no++; ?></td>
    <td><?== $detail['nama_produk']; ?></td>
    <td><?= $detail['harga']; ?></td>
    <td align="center"><?= $detail['pembelian']; ?></td>
   </tr>

   <?php endwhile; ?>

  </tbody>
 </table>
 </div>
