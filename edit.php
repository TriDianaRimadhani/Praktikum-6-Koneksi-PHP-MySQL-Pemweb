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
include "connectdb.php";//memanggil file connectdb.php untuk menghubungkan ke database

if (isset ($_GET['id_peg'])) { //kondisi jika berhasil menangkap variabel dan variabel tersebut telah terdefinisi
    $id_peg = $_GET['id_peg']; //mendefinisikan kembali variabel yang telah ditangkap dari halaman sebelumnya
}else { //menampilkan error ketika kondisi tidak bernilai true
    die ("Error. Tidak ada ID Pegawai yang di pilih!");
}
//memasukkan query untuk dijalankan pada database
$query = "SELECT * FROM profil 
	INNER JOIN jabatan ON profil.id_Jab = jabatan.id_jab 
	INNER JOIN departemen ON profil.id_Dep = departemen.id_dep ORDER BY id_peg";
	$sql = mysqli_query ($conn,$query); //mendefinisikan jika fungsi telah dieksekusi dengan baik

	if (mysqli_num_rows($sql)>0) { //kondisi untuk menghitung terdapat baris pada database atau tidak
	while ($hasil = mysqli_fetch_array ($sql)) { //perulangan untuk menampilkan isi database
		$id_peg = $hasil['id_peg'];
        $id_jab = $hasil['id_jab'];
        $jenis = $hasil['jenis'];
        $id_dep = $hasil['id_dep'];
        $nama_dep = $hasil['nama_dep'];
        $nama = $hasil['nama'];
        $jenis_kel = $hasil['jenis_kel'];
        $tgl_lahir = $hasil['tgl_lahir'];
        $alamat = $hasil['alamat'];
        $no_telp = $hasil['no_telp'];
        }
    }
//proses edit data dengan mendefinisikan variabel ke method POST
if (isset ($_POST['edit'])){
    $id_peg = $_POST ['id_peg'];
    $id_jab = $_POST ['id_jab'];
    $jenis = $_POST ['jenis'];
    $id_dep = $_POST ['id_dep'];
    $nama_dep = $_POST ['nama_dep'];
    $nama = $_POST['nama'];
    $jenis_kel = $_POST['jenis_kel'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    
    //update data dengan memasukkan syntax query dengan fungsi mysqli_query
    $query1 = mysqli_query($conn, "UPDATE profil SET id_peg='$id_peg',id_jab='$id_jab',id_dep='$id_dep',nama='$nama',jenis_kel='$jenis_kel',tgl_lahir='$tgl_lahir',alamat='$alamat',no_telp='$no_telp'");
    $query2 = mysqli_query($conn, "UPDATE jabatan SET id_jab='$id_jab',jenis='$jenis'");
    $query3 = mysqli_query($conn, "UPDATE departemen SET id_dep='$id_dep',nama_dep='$nama_dep'");
    if ($query1){ //kondisi dimana jika semua query dapat berjalan maka akan menampilkan teks
        if ($query2){
            if ($query3){
                echo "<font color=red>Data berhasil ditambahkan!</font>";}
        }
    } else {
        echo "<font color=red>Data gagal ditambahkan.</font>"; //jika semua data gagal di proses
    }
    
}
?>
<div>
    <h2>Edit Data Pegawai</h2> 
    <form action="" method="POST" name="input"><!--pembuatan form untuk dimasukkan dalam method POST-->
        <table cellpadding="0" cellspacing="0" border="0" width="700"> <!--pembuatan tabel agar form terlihat rapi-->
            <tr>
                <td>ID Pegawai</td>
                <td>: <b><?=$id_peg?></b></td> <!--id dikunci karena yang diubah hanya data-->
            </tr>
            <tr>
                <td>ID Jabatan</td><!--inputan dari user mengganti data dengan variabel yang sudah didefinisikan-->
                <td>: <input type="text" name="id_jab" maxlength="3" value="<?=$id_jab?>"></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: <input type="text" name="jenis" maxlength="20" value="<?=$jenis?>"></td>
            </tr>
            <tr>
                <td>ID Departemen</td>
                <td>: <input type="text" name="id_dep" maxlength="3" value="<?=$id_dep?>"></td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>: <input type="text" name="nama_dep" maxlength="20" value="<?=$nama_dep?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" maxlength="3" value="<?=$nama?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td><!--inputan baru dari user berupa radio button-->
                <td>: <input type="radio" name="jenkel" value="0" <?echo($jenkel==0)? "checked":""; ?>>Pria
                <input type="radio" name="jenkel" value="1"<?echo($jenkel==1)?"checked":""; ?>>Wanita</td> 
            </tr>
            <tr>
                <td>Tempat dan Tanggal Lahir</td>
                <td>: 
                    <input type="text" name="tgl_lahir" value="<?=$tgl_lahir?>">,

                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <textarea name="alamat" cols="40" rows="5"><?=$alamat?></textarea></td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td>: <input type="text" name="no_telp" maxlength="3" value="<?=$no_telp?>"></td>
            </tr>
            <tr>
                <input type="hidden" name="id_peg" value="<?=$id_peg?>"> <!--mengembalikan nilai id_peg-->
                <td colspan="8"><input type="submit" class="submit" name="edit" value="Edit Data"><!--tombol edit data-->
                <input type="reset" name="reset" class="reset" value="Reset"></td><!--tombol reset/clear data input-->
            </tr>
        </table>
    </form>

    </div>
    </body>
</html>