<!DOCTYPE html>
<html>
<head>
    <title>Latihan Switch PHP</title>
</head>
<body>
    <h1>Latihan Switch PHP</h1>
    
    <?php 
    $ukuran_baju = "L"; // Variabel ukuran baju
     
    echo "Ukuran baju yang dipilih: " . $ukuran_baju . "<br><br>";

    switch ($ukuran_baju) {
        case "S":
            echo "Deskripsi: Ukuran <strong>Small (Kecil)</strong>.";
            break;
        case "M":
            echo "Deskripsi: Ukuran <strong>Medium (Sedang)</strong>.";
            break;
        case "L":
            echo "Deskripsi: Ukuran <strong>Large (Besar)</strong>.";
            break;
        case "XL":
            echo "Deskripsi: Ukuran <strong>Extra Large (Sangat Besar)</strong>.";
            break;
        default:
            echo "Deskripsi: Ukuran tidak dikenal atau salah.";
    }
    ?> 
</body>
</html>
