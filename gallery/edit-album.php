<?php
session_start();

if (!isset($_SESSION['UserID'])) {
    header("location:login");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
</head>
<body>
    <?php
    include "navbar.php";
    ?>

    <h1>Selamat Datang</h1>
    <h2><b><?=$_SESSION['NamaLengkap']?></b></h2>

    <input type="text" name="AlbumID" value="<?=$data['AlbumID']?>" hidden>
    <form action="update-album.php" method="post">
        <table>
    <tr>
        <td>Nama Album : </td>
        <td><input type="text" name="NamaAlbum" value="<?=$data['NamaAlbum']?>"></td>
    </tr>
    <tr>
        <td>Deskripsi Album : </td>
        <td><input type="text" name="Deskripsi" value="<?=$data['Deskripsi']?>"></td>
    </tr>

    <tr>
        <td>Tanggal Dibuat : </td>
        <td><input type="text" readonly value="<?=date("Y-m-d")?>" name="TanggalDibuat"></td>
    </tr>

    <tr>
        <td></td>
        <td><input type="submit" value="Edit"></td>
    </tr>
    </table>
    </form>

    <br>
    <br>
    <center>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Id</th>
            <th>Nama Album</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>

        <br>
        <br>
        <?php
        include "connect/koneksi.php";
        $UserID = $_SESSION['UserID'];
        $sql = mysqli_query($koneksi,"SELECT * FROM album WHERE UserID = '$UserID' ");
        while($data = mysqli_fetch_array($sql)) {
            ?>

            <tr>
                <td><?=$data['AlbumID']?></td>
                <td><?=$data['NamaAlbum']?></td>
                <td><?=$data['Deskripsi']?></td>
                <td><?=$data['TanggalDibuat']?></td>
                <td>
                    <a href="edit-album.php?AlbumID=<?=$data['AlbumID']?>">Edit</a>
                    <a href="hapus-album.php?AlbumID=<?=$data['AlbumID']?>">Hapus</a>
                </td>
            </tr>

            <?php
        }

        ?>
    </table>

    </center>


    </body>

    </html>