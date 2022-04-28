<?php
session_start();

requiere_once'koneksi.php';

if (!isset($['cart'])) {
 header('location: index.php');
}

$cart= unserialize(serialize($_session['cart']));
$total_item=0;
$total_bayar=0;

for ($i=0; $i<count($cart); $i++) {
$total_item += $cart[$i]['pembelian'];
$total_bayar += $cart[$i]['pembelian'] *$cart[$i]['harga'];
}

//proses penyimpanan data
$query=mysqli_query($conn,"insert into tb_order (total_item, total_bayar, tgl_transaksi") values
('$total_item', '$total_bayar', '" . date ('y-m-d') . ")");
$id_order=mysqli_insert_id($conn);

for ($i=0; $i<count($cart); $i++) {
$id_produk= $cart[$i]['id_produk'];
$pembelian= $cart[$i]['pembelian'];

$query=mysqli_query($conn, "insert into tb_detail_order (id_order, id_produk, pembelian) values
('$id_order', '$id_produk', '$pembelian')");
}

//unset session
unset($_session['cart']);
$_session['pesan']= "pembelian sedang diproses, terimakasih.";
header('location: index.php');

