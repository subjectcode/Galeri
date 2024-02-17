<?php
include "connect/koneksi.php";
session_start();

$NamaAlbum = $_POST['NamaAlbum'];
$Deskripsi = $_POST['Deskripsi'];
$TanggalDibuat = date("Y-m-d");
$UserID = $_SESSION['UserID'];

$sql = mysqli_query($koneksi,"INSERT INTO album VALUES('','$NamaAlbum','$Deskripsi','$TanggalDibuat','$UserID')");

header("location:album");

?>