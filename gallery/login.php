

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gallery</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
    <form action="proses-login.php" method="post">
        <h2>Login</h2>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<div class='error'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
        ?>
        <input type="text" placeholder="Username" name="Username" required>
        <input type="password" placeholder="Password" name="Password" required>
        <button type="submit">Login</button>
        <p>Tidak Punya Akun? <a href="register">Sign up</a></p>
    </div>
</body>
</html>