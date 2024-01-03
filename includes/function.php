<?php

$conn = mysqli_connect("localhost", "root","","db_uas");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows =[];
    while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function daftar ($data){
    
    global $conn;
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $status = $data['status'];
    $role = $data['role'];

    $query = "INSERT INTO user VALUES ('','$username', '$email', '$password','$status', '$role')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $status = htmlspecialchars($data["status"]);


    $query = "UPDATE user SET 
                    username = ?, 
                    email = ?, 
                    password = ?,
                    status = ? 
                WHERE id = ?";
                
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $username, $email, $password, $status, $id);
    mysqli_stmt_execute($stmt);
    $affected_rows = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);

    return $affected_rows;
}


function hapus($id){

    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function tambah($data) {
    global $conn;

    $tanggal = $data['tanggal'];
    $warga_id = $data['warga_id'];
    $nominal = $data['nominal'];
    $keterangan = $data['keterangan'];
    $jenis_iuran = $data['jenis_iuran'];

    $query = "INSERT INTO iuran (tanggal, warga_id, nominal, keterangan, jenis_iuran) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sidss", $tanggal, $warga_id, $nominal, $keterangan, $jenis_iuran);
    mysqli_stmt_execute($stmt);
    $affected_rows = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);

    return $affected_rows;
}














































?>