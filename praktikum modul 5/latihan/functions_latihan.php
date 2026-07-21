<!DOCTYPE html>
<html>
<head>
    <title>Latihan Fungsi PHP</title>
</head>
<body>
    <h1>Latihan Fungsi PHP</h1>
    
    <?php 
    // Mendefinisikan fungsi sapa dengan parameter $nama dan $waktu
    function sapa($nama, $waktu) {
        return "Selamat " . $waktu . ", " . $nama . "!";
    }

    // Memanggil fungsi sapa dengan argumen berbeda dan menampilkannya
    echo "<h3>Hasil Pengujian Fungsi sapa():</h3>";
    echo sapa("Yudha Achmad Muddatzir.", "Pagi") . "<br>";
    echo sapa("Budi", "Siang") . "<br>";
    echo sapa("Feby", "Sore") . "<br>";
    echo sapa("Nur Kholis Maulana S.Kom.", "Malam") . "<br>";
    ?> 
</body>
</html>
