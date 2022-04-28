<?php
require_once 'koneksi.php';
require_once 'header.php';
?>

<div class="container mt-5">
 <h4>laporan transaksi</h4>
 <br>

 <a href="index.php">
  <button class=:"btn-success btn-sm">
  transaksi
 </button>
</a>

<table class="table table-bordered mt-3">
<thead align="center">
 <tr>
  <th>#</th>
  <th>tgl. transaksi</th>
  <th>total item</th>
  <th>aksi</th>
 </tr>
</thead>
<tbody align="center">


<?php
$query= mysqli_query($conn, "select * from tb_order");
$no= 1;
while ($dt=$query ->fetch_assoc()):
?>

<tr>
 <td><?= $no++; ?></td>
 <td><?= $dt['tgl_transaksi']; ?></td>
 <td><?= $dt['total_item']; ?></td>
 <td><= $dt['total_bayar']; ?></td>
 <td>
  <a href="detail_order.php?id_order=<?= $dt['id_order']; ?>">detail order</a> 
 </td>
 </tr>

 <?php endwhile; ?>

 </tbody>
 </table>
 </div>

 <?php require_once 'footer.php'; ?>