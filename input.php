<!DOCTYPE html>

<html>
    <head>
        <title>Input Data Pegawai</title>
        <!--menyambungkan pada file css-->
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
        <nav class="nav"><!--tag nav telah di definisikan style tampilannya-->
            <ul><!--script untuk pembuatan menu/navigasi bar-->
                <li><a href ="http://localhost/praktikum6/tampil.php">Tampil Data Pegawai</a></li>
                <li><a href ="http://localhost/praktikum6/input.php">Input Data Pegawai</a></li>
                <li><a href ="http://localhost/praktikum6/index.php">Home</a></li>
            </ul>
        </nav>
            
<?php 
include "connectdb.php"; //memanggil file connectdb.php untuk menghubungkan ke database

//mendefinisikan variabel-variabel untuk dimasukkan ke dalam method POST
if (isset ($_POST['input'])){
    $id_peg = $_POST['id_peg'];
    $id_jab = $_POST['id_jab'];
    $id_dep = $_POST['id_dep'];
    $jenis = $_POST['jenis'];
    $nama_dep = $_POST['nama_dep'];
    $nama = $_POST['nama'];
    $jenis_kel = $_POST['jenis_kel'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    
    //syntax php untuk memasukkan query mysql ke database
    $query1 = mysqli_query($conn, "INSERT INTO profil VALUES ('$id_peg','$id_jab','$id_dep','$nama','$jenis_kel','$tgl_lahir','$alamat','$no_telp')");
    $query2 = mysqli_query($conn, "INSERT INTO jabatan VALUES ('$id_jab','$jenis')");
    $query3 = mysqli_query($conn, "INSERT INTO departemen VALUES ('$id_dep','$nama_dep')");
    if ($query1){ //kondisi dimana jika semua query dapat berjalan maka akan menampilkan teks
        if ($query2){
            if ($query3){
                echo "Data berhasil ditambahkan!";}
            }
        
    } else {
        echo "Data gagal ditambahkan."; //jika semua data gagal di proses
    }
}
?>
<div>
    <h2>Input Data Pegawai</h2>
    <form action="" method="POST" name="input"><!--form html untuk menginput data pegawai 
    dengan menggunakan method POST untuk memasukkan data inputan-->
        <table cellpadding="0" cellspacing="0" border="0" width="700"><!--pembuatan tabel untuk merapikan form html-->
            <tr>
                <td>ID Pegawai</td> 
                <td>: <input type="text" name="id_peg" maxlength="3"></td><!--form untuk memasukkan inputan dari user berupa teks-->
            </tr>
            <tr>
                <td>ID Jabatan</td>
                <td>: <input type="text" name="id_jab" maxlength="3"></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: <input type="text" name="jenis" maxlength="20"></td>
            </tr>
            <tr>
                <td>ID Departemen</td>
                <td>: <input type="text" name="id_dep" maxlength="3"></td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>: <input type="text" name="nama_dep" maxlength="20"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" maxlength="30"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td> <!--data inputan dari user berupa radio button-->
                <td>: <input type="radio" name="jenis_kel" value="Pria" checked>Pria
                <input type="radio" name="jenis_kel" value="Wanita">Wanita</td> 
            </tr>
            <tr>
                <td>Tempat dan Tanggal Lahir</td>
                <td>: 
                    <input type="text" name="tgl_lahir">
                </td>
            </tr>
            
            <tr>
                <td>Alamat</td><!--data inputan dari user berupa textarea-->
                <td>: <textarea name="alamat" cols="40" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>No.Telepon</td>
                <td>: <input type="text" name="no_telp"></td>
            </tr>
            <tr>
                <td colspan="8"><input type="submit" class="submit" name="input" value="Input Data"><!--tombol untuk mengirim data-->
                <input type="reset" name="reset" class="reset" value="Reset"></td><!--tombol untuk mereset/clear data inputan-->
            </tr>
        </table>
    </form>

</div>
</body>
</html>