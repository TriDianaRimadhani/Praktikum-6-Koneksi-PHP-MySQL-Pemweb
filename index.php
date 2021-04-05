<!DOCTYPE html>

<html>
    <head>
        <title>Home</title>
        <!--menyambungkan pada file css-->
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
        <style>
            /*style tampilan untuk h1*/
            h1 {
                background-color:transparent;
	            color: rgb(62, 112, 179);
                font-family:sans-serif;
                text-align: center;
                width: 45%;
                margin-top: 10%;
                margin-right:auto;
                margin-left:auto;
                padding: 20px;
                border: 3px solid #333281
            }
        </style>
    <body>
        
        <nav class="nav"><!--tag nav telah di definisikan style tampilannya-->
            <ul><!--script untuk pembuatan menu/navigasi bar-->
                
                <li><a href ="http://localhost/praktikum6/tampil.php">Tampil Data Pegawai</a></li>
                <li><a href ="http://localhost/praktikum6/input.php">Input Data Pegawai</a></li>
                <li><a href ="http://localhost/praktikum6/index.php">Home</a></li>
            </ul>
        </nav>
        <h1>SELAMAT DATANG DI HALAMAN DATA PEGAWAI</h1> <!--header untuk halaman index--> 
        <div><!--teks pada halaman index-->
            <p align="center"> Halaman ini merupakan halaman informasi Data Pegawai</p>
        </div>
    </body>
</html>