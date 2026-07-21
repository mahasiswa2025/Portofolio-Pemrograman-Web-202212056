<!DOCTYPE html>
<html>
<head>
    <title>Latihan Operator PHP</title>
</head>
<body>
    <h1>Latihan Operator PHP</h1>
    
    <?php 
    $umur = 18; 
    $sudah_punya_sim = true; // Mengubah variabel menjadi true agar kondisi bernilai benar
     
    echo "Umur: " . $umur . " tahun<br>";
    echo "Memiliki SIM: " . ($sudah_punya_sim ? "Ya" : "Tidak") . "<br><br>";

    if ($umur >= 17 && $sudah_punya_sim == true) { 
        echo "<strong>Hasil:</strong> Anda boleh mengemudi."; 
    } else { 
        echo "<strong>Hasil:</strong> Anda tidak boleh mengemudi."; 
    } 
    ?> 
</body>
</html>
