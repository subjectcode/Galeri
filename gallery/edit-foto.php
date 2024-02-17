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
    <title>Halaman Edit Foto</title>
</head>
<body>
    <h1>Selamat Datang</h1><b><?=$_SESSION['NamaLengkap']?></b>
    <pre>halaman Edit Foto</pre>
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="update-foto.php" method="post" enctype="multipart/form-data">
        <?php
            include "connect/koneksi.php";
            $FotoID=$_GET['FotoID'];
            $sql=mysqli_query($koneksi,"select * from foto where FotoID='$FotoID'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="FotoID" value="<?=$data['FotoID']?>" hidden>
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="JudulFoto" value="<?=$data['JudulFoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="DeskripsiFoto" value="<?=$data['DeskripsiFoto']?>"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="LokasiFile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="AlbumID">
                    <?php
                        $UserID=$_SESSION['UserID'];
                        $sql2=mysqli_query($koneksi,"select * from album where UserID='$UserID'");
                        while($data2=mysqli_fetch_array($sql2)){
                    ?>
                            <option value="<?=$data2['AlbumID']?>" <?php if($data2['AlbumID']==$data['AlbumID']){echo 'selected';}?>><?=$data2['NamaAlbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Ubah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>

    
</body>
</html>