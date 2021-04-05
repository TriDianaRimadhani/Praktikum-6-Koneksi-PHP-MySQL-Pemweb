<?php //mendefinisikan variabel untuk koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
 
//check connection
if (!$conn) { //kondisi jika gagal koneksi
    die ("Connection failed:". mysqli_connect_error()); 
}
//mengirim query menambah data pada tabel database 
$sql = "INSERT INTO liga (kode, negara, champion)
values ('Jer', 'Jerman', '4')";

if (mysqli_query($conn, $sql)) { //pengecekan query apabila berhasil
    echo "New record created successfully";
} else {//kondisi jika query gagal
    echo "Error :" . $sql . "<br>" . mysqli_error($conn);
}//menutup koneksi ke database
mysqli_close($conn);
?>