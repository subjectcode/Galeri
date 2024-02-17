<?php

include "connect/koneksi.php";
session_start();


$AlbumID = $_GET['AlbumID'];
$NamaAlbum = $_POST['NamaAlbum'];
$Deskripsi = $_POST['Deskripsi'];


$sql = mysqli_query($koneksi, "UPDATE album SET NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi' WHERE AlbumID = '$AlbumID'");


header("location:album");
?>