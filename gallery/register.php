<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="proses-register.php" method="post">
        <table>
            <tr>
                <td><label for="">Username :</label> </td>
                <td><input type="text" name="Username" required></td>
            </tr>
            <tr>
                <td><label for="">Password :</label></td>
                <td><input type="password" name="Password" id="" required></td>
            </tr>
            <tr>
                <td><label for="">Email : </label> </td>
                <td><input type="email" name="Email" required></td>
            </tr>
            <tr>
                <td><label for="">Nama Lengkap :</label> </td>
                <td><input type="text" name="NamaLengkap" id="" required></td>
            </tr>
            <tr>
                <td><label for="">Alamat :</label> </td>
                <td><textarea name="Alamat" id="" cols="30" rows="10" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>
</body>
</html> -->




<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register - Gallery</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="container">
            <h2>Register</h2>
    <form action="proses-register.php" method="post">
      
        <input type="text" placeholder="Username" name="Username" required>
        <input type="password" placeholder="Password" name="Password" required>
        <input type="email" placeholder="Email" name="Email" required>
        <input type="text" placeholder="Nama Lengkap" name="NamaLengkap" required>
        <input type="text" placeholder="Alamat" name="Alamat" required>
        <button type="submit">Register</button>
        <p>Sudah Punya Akun? <a href="login">Login</a></p>
    </div>
</body>
</html>