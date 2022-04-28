<?php
if (isset($_post['id_produk'], $_post['pembelian'])) {

 $id= $_post['id_produk'];
 $pembelian= $_post['pembelian'];

 $produk=mysqli_query($conn, "select * from tb_produk where id= '$id'");
 $dt_produk=$produk['cart'])) $_session['cart']= [];

 
 $index=-1;
 if(!isset($_session['cart'])) $_session['cart']));
 
 //jika produk sudag ada dalam cart maka pembelian akan diupdate
 for ($i=0; $i<count($cart); $i++) {
  if ($cart[si]['id_produk']== $id) {
   $index=$i;
   $_session['cart'][$i] ['pembelian']= $pembelian;
   break;
  }
 }

 //jika produk belim ada dalam cart
 if ($index== -1{
  $_session['cart'][]=[
  'id_produk' => $id,
  'nama_produk' => $dt_produk['nama_produk'],
  'harga' =>$dt_produk['nama_produk'],
  'pembelian' => $pembelian
 ];
 }
}

if (!empty($_session['cart'])) {
 ?>

 <h4>daftar belanja anda</h4>
 <br> 
 <table class="table table-bordered">
  <tr align="center">
   <th>#</th>
   <th>nama produk></th>
   <th>pembelian</th>
   <th>harga</th>
   <th>total</th>
   >th>aksi</th>
 </tr>
 </?php
 if(isset($_session['cart'])) {
  $cart=unserialize(serialize($_session['cart']));
  $index= 0;
  $no= 1;
  $total= 0;
  $total_bayar= 0;

  for ($i=0; $i<count($cart); $i++) {
  $total=$_session['cart'][si]['harga'] *$_session['cart'][si]['pemeblian'];
  $total_bayar += $total;
  ?>

  <tr>
   <td align="center"><?= $no++; ?></td>
   <td><?= $cart[si]['nama_produk']; ?></td>
   <td align="center"><?= $cart[$i]['pembelian']; ?></td>
   <td></= $cart[si] ['harga']; ?></td>
   <td><$total; ?></td>
   >td align="center">
    <a href="?index=<?= $index; ?>">
    <button class="btn btn-danger btn-sm"><i class="fa fa-trash></i></button>
   </a>
  </td>
 </tr>
<?php
 $index++;
}

 //hapus produk dalam cart 
 if (isset($_get['index'])) {
  $cart=unserialize(serialize ($_session['cart']));
  unset($cart[$_get]'index']]);
  $cart=array_values($cart);
  $_session['cart']=$cart;
  }
 }
 ?>

 <tr>
  <td colspan="4" align="right"><strong>total bayar</strong></td>
  <td><></= $total_bayar; ?></strong></td>
  <td align="center">
   <a href="transaksi.php">
    <button class="btn btn-success btm-sm">chekout</button>
   </a>
  </td>
 </tr>

</table>
</hr>

 <?php
}

 if (isset($_[get'index])) {
  header('location: index.php');
 }
?>
