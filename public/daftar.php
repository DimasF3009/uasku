<?php
session_start(); // Mulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(E_ALL);
    require "../includes/function.php";
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( daftar($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'login.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'login.php';
			</script>
		";
	}
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
            <h2>Daftar</h2>
            <form action="" method="post">
                <div class="input">
                    <label for="username">Username</label><br>
                    <br>
                    <input type="text" name="username" placeholder="username" required><br>
                </div>
                <br>
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
                <br>
                <div class="input">
                    <label for="status">status</label><br>
                    <br>
                    <input type="text" name="status"  placeholder="status"><br>
                </div>
                <div class="input">
                    <label for="role">Role</label><br>
                    <br>
                    <select name="role" id="role" style="width: 300px; height: 25px;">
                        <option value="empty" style="text-align: center;">---------</option>
                        <option value="2" style="text-align: center;">User</option>
                        <option value="1"style="text-align: center;">Admin</option>
                    </select>
                </div>
                <br><br><br>
                <input type="submit" value="tambah">
            </form>
            <p>
               <a href="login.php">Back</a>
            </p>
        </div>
    </div>

</body>
</html>