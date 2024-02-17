<?php

include "connect/koneksi.php";

$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Email = $_POST['Email'];
$NamaLengkap = $_POST['NamaLengkap'];
$Alamat = $_POST['Alamat'];

$sql = mysqli_query($koneksi,"INSERT INTO user VALUES('','$Username','$Password','$Email','$NamaLengkap','$Alamat')");

header("location:login");

?>