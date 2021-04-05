<?php //mendefinisikan variabel untuk koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
 
//check connection
if (!$conn) {
    die ("Connection failed:". mysqli_connect_error()); 
}
//mengirimkan query pada database untuk membuat tabel
$query= mysqli_query ($conn, "CREATE TABLE `buku_tamu` ( `id_bt` INT(10) NOT NULL AUTO_INCREMENT , 
`nama` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
`email` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
`isi` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL , 
PRIMARY KEY (`id_bt`)) ENGINE = InnoDB");

if ($query) { //pengecekan jika query berhasil dieksekusi
    echo "New table created successfully";
} else { //jika query tidak berhasil dan menampilkan errornya
    echo "Error :" . mysqli_error($conn);
} //untuk memutus koneksi ke database
mysqli_close($conn);
?>