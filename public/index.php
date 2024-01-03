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
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Iuran Rt</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="warga_id" class="form-label">Warga Id</label>
                                    <select class="form-control" id="warga_id" name="warga_id" required>
                                        <option value="warga_id">Pilih Warga</option>
                                        <?php foreach ($warga_result as $warga): ?>
                                        <option value="<?php echo $warga['id']; ?>"><?php echo $warga['nama']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Nominal</label>
                                    <input type="number" class="form-control" id="nominal" name="nominal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input class="form-control" id="keterangan" name="keterangan" >
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_iuran" class="form-label">Jenis Iuran</label>
                                    <select class="form-control" id="jenis_iuran" name="jenis_iuran" required>
                                        <option value="jenis_iuran">Jenis Iuran</option>
                                            <?php foreach ($jenis_result as $jenis): ?>
                                            <option value="<?php echo $jenis['jenis_iuran']; ?>"><?php echo $jenis['jenis_iuran']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
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


