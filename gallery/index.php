<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Gallery</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['UserID'])) {
    ?>

        <ul>
            <li><a href="register">Register</a></li>
            <li><a href="login">Login</a></li>
        </ul>

    <?php
    } else {
        include "navbar.php";
    ?>
        <center>
        <h1>Selamat Datang</h1>
        <h2><b><?= $_SESSION['NamaLengkap'] ?></b></h2>
        </center>
    <?php
    }

    ?>

    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
            <th>Jumlah Like</th>
            <th>Aksi</th>
        </tr>

        <?php
        include "connect/koneksi.php";
        $sql = mysqli_query($koneksi, "SELECT * FROM foto,user WHERE foto.UserID = user.UserID");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?= $data['FotoID'] ?></td>
                <td><?= $data['JudulFoto'] ?></td>
                <td><?= $data['DeskripsiFoto'] ?></td>
                <td><img src="pictures/<?=$data['LokasiFile']?>" width="200px" alt="" srcset=""></td>
                <td><?= $data['NamaLengkap'] ?></td>
                <td>
                    <?php
                    $FotoID = $data['FotoID'];
                    $sql2 = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID = '$FotoID'");
                    echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <a href="like.php?FotoID=<?= $data['FotoID'] ?>">Like</a>
                    <a href="komentar.php?FotoID=<?= $data['FotoID'] ?>">Komentar</a>
                </td>
            </tr>
        <?php
        }
        ?>


    </table>
</body>

</html>