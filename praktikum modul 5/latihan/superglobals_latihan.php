<!DOCTYPE html>
<html>
<head>
    <title>Superglobals PHP - GET</title>
</head>
<body>
    <form method="get" action="superglobals_latihan.php"> 
        Nama: <input type="text" name="nama"> 
        <input type="submit"> 
    </form> 
    <br> 
    <?php 
    if (isset($_GET['nama'])) { 
        $nama = htmlspecialchars($_GET['nama']); 
        echo "Halo, " . $nama . "! (Data diambil menggunakan \$_GET)"; 
    } 
    ?> 
</body>
</html>
