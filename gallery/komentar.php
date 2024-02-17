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
    <title>Halaman Komentar</title>
</head>
<body>
    <?php
    include "navbar.php";
    ?>
    <h1>Halaman Komentar</h1>
    <p>Selamat datang <b><?=$_SESSION['NamaLengkap']?></b></p>
    

    <form action="tambah-komentar.php" method="post">
        <?php
            include "connect/koneksi.php";
            $FotoID=$_GET['FotoID'];
            $sql=mysqli_query($koneksi,"SELECT * from foto where FotoID='$FotoID'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="FotoID" value="<?=$data['FotoID']?>" hidden>
        <table>
            <tr>
                <td>Judul : </td>
                <td><input type="text" name="JudulFoto" value="<?=$data['JudulFoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi : </td>
                <td><input type="text" name="DeskripsiFoto" value="<?=$data['DeskripsiFoto']?>"></td>
            </tr>
            <tr>
                <td>Foto : </td>
                <td><img src="Pictures/<?=$data['LokasiFile']?>" width="200px"></td>
            </tr>
            <tr>
                <td>Komentar : </td>
                <td><input type="text" name="IsiKomentar"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>

    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
        <?php
            include "connect/koneksi.php";
            $userid=$_SESSION['UserID'];
            $sql=mysqli_query($koneksi,"SELECT * from komentarfoto,user where komentarfoto.UserID=user.UserID");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['KomentarID']?></td>
                <td><?=$data['NamaLengkap']?></td>
                <td><?=$data['IsiKomentar']?></td>
                <td><?=$data['TanggalKomentar']?></td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>