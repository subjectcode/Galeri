<?php
    include "connect/koneksi.php";
    session_start();

    $AlbumID=$_POST['AlbumID'];
    $NamaAlbum=$_POST['NamaAlbum'];
    $Deskripsi=$_POST['Deskripsi'];

    $sql=mysqli_query($koneksi,"UPDATE album SET NamaAlbum='$NamaAlbum',Deskripsi='$Deskripsi' where AlbumID='$AlbumID'");

    header("location:album.php");
?>
