<?php
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("location:login");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Foto</title>
</head>
<body>
   <?php
    include "navbar.php";
   ?>

   <center>
    <h1>Halaman Foto</h1>
    <p>Selamat datang <b><?=$_SESSION['NamaLengkap']?></b></p>
    

    <form action="tambah-foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul : </td>
                <td><input type="text" name="JudulFoto"></td>
            </tr>
            <tr>
                <td>Deskripsi : </td>
                <td><input type="text" name="DeskripsiFoto"></td>
            </tr>
            <tr>
                <td>Lokasi File : </td>
                <td><input type="file" name="LokasiFile"></td>
            </tr>
            <tr>
                <td>Album : </td>
                <td>
                    <select name="AlbumID">
                    <?php
                        include "connect/koneksi.php";
                        $UserID=$_SESSION['UserID'];
                        $sql=mysqli_query($koneksi,"select * from album where UserID='$UserID'");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                            <option value="<?=$data['AlbumID']?>"><?=$data['NamaAlbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
<br>
    <table width="100%" border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "connect/koneksi.php";
            $UserID=$_SESSION['UserID'];
            $sql=mysqli_query($koneksi,"SELECT * from foto,album where foto.UserID='$UserID' and foto.AlbumID=album.AlbumID");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['FotoID']?></td>
                    <td><?=$data['JudulFoto']?></td>
                    <td><?=$data['DeskripsiFoto']?></td>
                    <td><?=$data['TanggalUnggah']?></td>
                    <td>
                        <img src="pictures/<?=$data['LokasiFile']?>" width="200px">
                    </td>
                    <td><?=$data['NamaAlbum']?></td>
                    <td>
                        <?php
                            $FotoID=$data['FotoID'];
                            $sql2=mysqli_query($koneksi,"select * from likefoto where FotoID='$FotoID'");
                            echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td>
                        <a href="hapus-foto.php?FotoID=<?=$data['FotoID']?>">Hapus</a>
                        <a href="edit-foto.php?FotoID=<?=$data['FotoID']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
    </center>
</body>
</html>
