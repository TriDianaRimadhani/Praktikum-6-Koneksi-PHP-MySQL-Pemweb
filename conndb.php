<html>
<head>
    <title>Koneksi Database MySQL</title>
</head>
<body>
    <h1>Demo Koneksi Database MySQL</h1>
    <?php //membuat koneksi pada database
    $conn = mysqli_connect('localhost','root','','myDB');
    
    //check connection
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL : ". mysqli_connect_error()
        ; //jika gagal koneksi ke database dan menampilkan errornya
        exit();
    } else {  //jika berhasil terhubung dengan database
        echo "Successfully connected!";
    }
    ?>
</body>
</html>