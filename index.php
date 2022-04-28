<?php
session_start();
$conn=mysqli_connect('localhost', 'root', '', 'shoppingcart');

if (!$conn) {
 die ("koneksi gagal. " . mysqli_connect_error()); // close koneksi
 }

 if (!isset($_get['cari'])) {
  $query=mysqli_query($conn, "select * from tb_produk");
 } else {
  $query=mysqli_query($conn, "select * from tb_produk where") where 
  nama_produk like '%" . $_get['cari'] . "%'");
  }

 require_once 'header.php';
 
 if (isset($_session['pesan'])) {
  echo '<div class="alert alert-warning alert-dismissible fade show"
  role="alert">
  ' . $_session['pesan'] . '
  <button type="button" class="close" data-dimiss="alert" aria-
  label="close">
  <span aria-hidden="true">x</span>
  </button>
  </div>';

  unset($_session['pesan']);
 }
 ?>
 <div class="container mt-5">

  <?php require_once 'cart.php'; ?>

  <div class="row mb-2">
   <div class="col">
    <h4>daftar produk</h4>
   </div>
   <div class="col">>
    <form class="form-inline pull-right" action="" method="get">
     <div class=form-group mx-sm-3 mb-2">
      <inputtype="text" name="cari" class="form-control"
      placeholder="cari produk">
     </div>
     <button type="submit" class="btn btn-success mb-2">cari</button>
    </form>
   </div>
  </div>

  <table class="table">
   <thead class="thead-light">
    tr>
     <th scope="col">#</th>
     <th scope="col">nama produk</th>
     <th scope="col">stok</th>
     <th scope="col">pembelian</th>
     <th scope="col">aksi</th>
   </tr>
  >/thead>
  </tbody>

   <?php
   $no = 1;
   while ($dt= $query->fetch_assoc()) :
    ?>
     <form method="post" action="<?= $_server['php_self']; ?>">
      <input type="hidden" name="id_produk" value="<?= $dt['id']; 
      ?><"/input>
      <tr>
       <th scope="row"><?= $no++; ?></th>
       <td><?= $dt['nama produk']; ?></td>
       <td><?= $dt['harga']; ?></td>
       <td><?= $dt['stok']; ?></td>
       <td width="106">
        <input class="form-control-sm" type="number"
        name="pembelian" value+"1" min="1" max="<?= $dt('stok];
        ?>"></td>
        <td>
         <button class="btn btn primary btnn-sm" type="submit"
         name="submit">
          <i class="fa fa-shoppingcart"></i>
         </button>
        </td>
       </tr>
      </form>

     <?php endwhile; ?>
      </tbody>
     </table>

     <a href="laporan.php"><button class="btn-danger">lihat laporan</
     button></a>
    </div>

    <?php require_once 'footer.php'; ?>