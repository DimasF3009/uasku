<?php
require "../includes/function.php";
$id = isset($_GET["id"]) ? $_GET["id"] : null;
$result = query("SELECT * FROM user WHERE id = $id")[0];


if (isset($_POST["submit"])) {
    
    // cek apakah data berhasil ditambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'admin.php';
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
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body>
    <div id="container">
        
        <?php require '../templates/header.php' ?>
        <?php require '../templates/navigasi.php' ?>
        <div id="main">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result): ?>
                    <?php foreach($result as $row): ?>
                    <tr>
                        <td><?= $row['id'];?></td>
                        <td><?= $row['username'];?></td>
                        <td><?= $row['email'];?></td>
                        <td><?= $row['status'];?></td>
                        <td><?= $row['role'];?></td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubah">
                                Ubah
                            </button>
                        <a class="btn btn-primary btn-hapus" href="hapus.php?id=<?= $row['id'];?>">Hapus</a></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="1">Belum ada data</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="modal" tabindex="-1" id="ubah">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ubah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                

                                <div class="mb-3">
                                    <label for="username" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $result['username']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $result['email']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label><br>
                                    <select name="status" id="status" style="width: 300px; height: 25px;">
                                        <option value="empty" style="text-align: center;">---------</option>
                                        <option value="1" style="text-align: center;" <?= $result['status'] == '1' ? 'selected' : ''; ?>>Aktif</option>
                                        <option value="2" style="text-align: center;" <?= $result['status'] == '2' ? 'selected' : ''; ?>>Non Aktif</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require '../templates/footer.php' ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>


