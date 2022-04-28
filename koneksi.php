<?php
$conn= myqli_connect('localhost', 'root', 'shoppingcart');
if (!$conn) {
 die("koneksi gagal. " . mysqli_connect_error()); // close koneksi 
 }