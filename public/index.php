<?php
require "../includes/function.php";
$result = query('SELECT * FROM warga');
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Warga
            </button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result): ?>
                    <?php foreach($result as $row): ?>
                    <tr>
                        <td><?= $row['id'];?></td>
                        <td><?= $row['nik'];?></td>
                        <td><?= $row['nama'];?></td>
                        <td><?= $row['jenis_kelamin'];?></td>
                        <td><?= $row['no_hp'];?></td>
                        <td><?= $row['alamat'];?></td>
                        <td><?= $row['status'];?></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="1">Belum ada data</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>


    </div>
    <?php require '../templates/footer.php' ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>


