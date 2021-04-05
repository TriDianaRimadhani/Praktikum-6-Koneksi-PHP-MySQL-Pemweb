<?php //mendefinisikan variabel untuk data koneksi
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "pegawai";

$conn = mysqli_connect ($host, $user, $pass, $dbname);//membuat koneksi pada database

if (!$conn) { //jika koneksi gagal
		die ("Server tidak dapat terhubung". mysqli_connect_error());		
} else {
    echo "Database berhasil terhubung!"; //jika koneksi berasil terhubung
}

?>