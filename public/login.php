<?php
session_start(); // Mulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(E_ALL);
    require "../includes/function.php";
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT username, email, password FROM user WHERE email = '$email'");

    // Query untuk mengambil data pengguna dari basis data berdasarkan alamat email

    if ($result) {
        if ($rows = mysqli_fetch_assoc($result)) {
            // Verifikasi kata sandi
            if ($password == $rows['password']) {
                // Kata sandi benar, simpan informasi pengguna ke dalam sesi
                $_SESSION['username'] = $row['username'];

                // Redirect ke halaman lain setelah login berhasil
                header("Location: index.php?welcome=true");
                exit();
            } else {
                echo "Kata sandi salah.";
            }
        } else {
            echo "Akun dengan email tersebut tidak ditemukan.";
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="../assets/css/logincss.css">
</head>
<body style="background-image: url('../assets/image/rumah.jpg');">
    <div id="container">
        <div id="gambar">
            
        </div>

        <div id="login">
            <h2>Masuk</h2>
            <form action="#" method="post">
                <div class="input">
                    <label for="email">Email</label><br>
                    <br>
                    <input type="email" name="email" placeholder="Email" required><br>
                </div>
                <br>
                <div class="input">
                    <label for="password">Password</label><br>
                    <br>
                    <input type="password" name="password"  placeholder="Password"><br>
                </div>
                <br><br><br>
                <input type="submit" value="Login">
            </form>
            <p>
               <a href="daftar.php">Daftar Sekarang</a>
            </p>
        </div>
    </div>

</body>
</html>