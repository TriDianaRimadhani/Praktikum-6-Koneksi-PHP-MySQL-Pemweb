<!DOCTYPE html>

<html>
    <head>
        <title>Tampil Data Pegawai</title>
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
            
	<?php //memanggil file lain untuk koneksi ke database
	include "connectdb.php";
	?>
	<div>
	<h2>Data Pegawai</h2> <!--menampilkan header-->
	<table class="center khusus"> <!--tabel untuk merapikan data-->
	<tr><!--membuat header tabel-->
		<th>No.</th>
		<th>ID Pegawai</th>
        <th>ID Jabatan</th>
        <th>Jabatan</th>
        <th>ID Departemen</th>
        <th>Departemen</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Tgl Lahir</th>
		<th>Alamat</th>
        <th>No.Telp</th>
		<th>Action</th>
	</tr>
	<?=
	$no = 1; //mendefinisikan variabel no untuk nomer urut data
	//mengirim sebuah query pada database dengan menggabungkan beberapa tabel
	$query = "SELECT * FROM profil 
	INNER JOIN jabatan ON profil.id_Jab = jabatan.id_jab 
	INNER JOIN departemen ON profil.id_Dep = departemen.id_dep ORDER BY id_peg";
	$sql = mysqli_query ($conn,$query);//variabel pengecekan pada query

	if (mysqli_num_rows($sql)>0) { //kondisi yang menggunakan fungsi php untuk menghitung data yang ada
	while ($hasil = mysqli_fetch_array ($sql)) { //perulangan untuk menampilkan data tabel menggunakan array
		$id_peg = $hasil['id_peg']; //pendefinisian variabel agar dapat ditampilkan 
        $id_jab = $hasil['id_jab'];
        $jenis = $hasil['jenis'];
        $id_dep = $hasil['id_dep'];
        $nama_dep = $hasil['nama_dep'];
        $nama = $hasil['nama'];
        $jenis_kel = $hasil['jenis_kel'];
        $tgl_lahir = $hasil['tgl_lahir'];
        $alamat = $hasil['alamat'];
        $no_telp = $hasil['no_telp'];
		$warna = ($no%2==1)?"#ffffff":"#9d3bee"; //definisi untuk warna background data  
		
		//tampilkan data pegawai
	 ?>
		<tr bgcolor="<?=$warna?>"> <!--pengaturan tampilan data-->
			<td><?=$no?></td> <!--data ditampilkan pada tabel-->
			<td><?=$id_peg?></td>
            <td><?=$id_jab?></td>
            <td><?=$jenis?></td>
            <td><?=$id_dep?></td>
            <td><?=$nama_dep?></td>
			<td><?=$nama?></td>
			<td><?=$jenis_kel?></td>
			<td><?=$tgl_lahir?></td>
			<td><?=$alamat?></td>
			<td><?=$no_telp?></td>
			<td>
			<a href="edit.php?id_peg=<?=$id_peg?>">Edit</a><br/> <!--hyperlink untuk menuju halaman edit-->
			<a href="hapus.php?id_peg=<?=$id_peg?>"onClick='return confirm("Apakah Ada yakin menghapus?")'>Delete</a></td>
			<!--hyperlink untuk ke halaman delete-->
		</tr>	
	<?= $no++; }}?><!--variabel no bertambah seiring perulangan data-->
	</table>
	</div>
	</body>
</html>