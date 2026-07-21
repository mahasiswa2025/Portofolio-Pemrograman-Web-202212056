<!DOCTYPE html>
<html>
<head>
    <title>Latihan If Statements PHP</title>
</head>
<body>
    <h1>Latihan If Statements PHP</h1>
    
    <?php 
    $angka = -7; // Mengatur nilai angka yang akan diperiksa
     
    echo "Angka yang diperiksa: " . $angka . "<br><br>";

    if ($angka > 0) {
        echo "Hasil: Angka tersebut adalah <strong>Positif</strong>.";
    } elseif ($angka < 0) {
        echo "Hasil: Angka tersebut adalah <strong>Negatif</strong>.";
    } else {
        echo "Hasil: Angka tersebut adalah <strong>Nol</strong>.";
    }
    ?> 
</body>
</html>
