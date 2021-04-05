<?php
/*$servername = "localhost";
$username = "root";
$password = "root";*/

//create connection
$conn = mysqli_connect('localhost','root','');
//check connection
if (!$conn){ 
    //jika koneksi gagal ke database
    die("Connection failed : " . mysqli_connect_error());
}

//create database
$sql = "CREATE DATABASE myDB"; //mengirim query ke database
if (mysqli_query($conn,$sql)) { //kondisi apabila query berhasil dieksekusi
    echo "Database created successfully";
} else { //jika query gagal dieksekusi dan menampilkan errornya
    echo "Error creating database : " . mysqli_error($conn);
}
mysqli_close($conn); //menutup koneksi ke database
?>