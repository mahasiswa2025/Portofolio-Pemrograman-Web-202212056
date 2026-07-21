<!DOCTYPE html>
<html>
<head>
    <title>Latihan String PHP</title>
</head>
<body>
    <h1>Latihan String PHP</h1>
    
    <?php 
    $kalimat = "STITEK Bontang adalah kampus IT terbaik"; 
    $kalimat_kapital = strtoupper($kalimat);

    echo "<strong>Kalimat Asli:</strong> " . $kalimat . "<br>";
    echo "<strong>Kalimat Kapital (strtoupper):</strong> " . $kalimat_kapital;
    ?> 
</body>
</html>
