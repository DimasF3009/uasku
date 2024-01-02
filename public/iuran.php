<?php
require "../includes/function.php";
$result = query('SELECT * FROM iuran');
?>
<?php
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'iuran.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = iuran.php';
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah
            </button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">tanggal</th>
                        <th scope="col">nama</th>
                        <th scope="col">nominal</th>
                        <th scope="col">keterangan</th>
                        <th scope="col">jenis iuran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result): ?>
                    <?php foreach($result as $row): ?>
                    <tr>
                            <td><?= $row['id'];?></td>
                            <td><?= $row['tanggal'];?></td>
                            <td><?= $row['warga_id'];?></td>
                            <td>Rp.<?= $row['nominal'];?></td>
                            <td><?= $row['keterangan'];?></td>
                            <td><?= $row['jenis_iuran'];?></td>
                     </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="1">Belum ada data</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Iuran Rt</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                            <form>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal"require>
                                </div>
                                <div class="mb-3">
                                    <label for="warga_id" class="form-label">Warga Id</label>
                                    <select>
                                        
                                        <option value=""></option>
                    
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Nominal</label>
                                    <input type="number" class="form-control" id="nominal"require>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input class="form-control" id="keterangan">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_iuran" class="form-label">Jenis Iuran</label>
                                    <select>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
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


