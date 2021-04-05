<!DOCTYPE html>
<html>
<body>
<?php //pendefinisian variabel untuk koneksi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn) {
    die ("Connection failed : ". mysqli_connect_error());
} 
//mengirim query SELECT pada database
$sql = "SELECT kode, negara, champion FROM liga";
$result =mysqli_query($conn,$sql); //pengecekan queri apabila berhasil diekseksi

if (mysqli_num_rows($result) > 0) { //kondisi untuk mengecek terdapat jumlah data
    while($row = mysqli_fetch_assoc($result)) { //perulangan untuk menampilkan data
        echo "Kode : " . $row["kode"] . "-Negara : " .$row["negara"]."". $row["champion"]. "<b>";
    }
} else { //kondisi jika tidak ada data
    echo "0 results";
}
mysqli_close($conn); //memutus koneksi ke database
?>

</body>
</html>