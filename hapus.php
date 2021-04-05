<?php 
include "connectdb.php"; //memanggil file lain untuk menyambungkan database

if (isset($_GET['id_peg'])) { //kondisi jika variabel yang ditangkat telah ada di database
	$id_peg = $_GET['id_peg']; //mendefinisikan kembali variabel yang telah ditangkap
	if (isset($_GET['id_jab'])) {
		$id_jab = $_GET['id_jab'];//mendefinisikan variabel dari database
		if (isset($_GET['id_dep'])) {
			$id_dep = $_GET['id_dep'];//mendefinisikan variabel dari database
		} else {//kondisi jika variabel gagal ditangkap atau jika kosong
			die ("Error. Tidak ada ID Pegawai dipilih!");	
		}
	}
}
?>
<div>
	<? //proses hapus data
		if (!empty($id_peg) && $id_peg != "") { //kondisi pengecekan apabila variabel yang dipilih tidak kosong
			$query1 = "DELETE FROM profil WHERE id_peg='$id_peg'"; //memasukkan query delete pada database
			if (!empty($id_jab) && $id_jab != "") {
				$query2 = "DELETE FROM jabatan WHERE id_jab='$id_jab'";
				if (!empty($id_dep) && $id_dep != "") {
					$query3 = "DELETE FROM departemen WHERE id_dep='$id_dep'";
					$sql = mysqli_query ($query3); //pendefinisian apabila query berhasil dieksekusi
					if ($sql) { //pengecekan apabila query telah berhasil dieksekusi
						echo "<h2><font color=blue>Data Pegawai telah berhasil dihapus</font></h2>";//menampilkan teks jika semua query berhasil dieksekusi	
					} else { //menampilkan teks jika query gagal dieksekuis
						echo "<h2><font color=red>Data pegawai gagal dihapus</font></h2>";	
					}
					echo "Klik <a href='tampil.php?page=tampil'>di sini</a> untuk kembali ke halaman data pegawai"; //teks untuk hyperlink ke halaman lain
				} 
	  		}
		} else { //jika kondisi bernilai false
			die ("Access Denied");	
			}
			
	?>
</div>