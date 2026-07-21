<!DOCTYPE html>
<html>
<head>
    <title>Superglobals PHP - POST</title>
</head>
<body>
    <form method="post" action="superglobals.php"> 
        Nama: <input type="text" name="nama"> 
        <input type="submit"> 
    </form> 
    <br> 
    <?php 
    if (isset($_POST['nama'])) { 
        $nama = htmlspecialchars($_POST['nama']); 
        echo "Halo, " . $nama . "!"; 
    } 
    ?> 
</body>
</html>
