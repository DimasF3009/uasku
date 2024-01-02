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
    $Nim = htmlspecialchars($data["Nim"]);
    $Nama = htmlspecialchars($data["Nama"]);
    $Kelas = htmlspecialchars($data["Kelas"]);

    $query = "UPDATE Biodata SET 
                                Nim = '$Nim', 
                                Nama ='$Nama', 
                                Kelas ='$Kelas' 
                            WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id){

    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function tambah ($data){
    
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













































?>