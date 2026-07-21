<!DOCTYPE html>
<html>
<head>
    <title>Latihan Array PHP</title>
</head>
<body>
    <h1>Latihan Array PHP (Indexed Array)</h1>
    
    <?php 
    // Mendefinisikan indexed array berisi daftar nama teman sekelas
    $teman_sekelas = array(
        "Yudha Achmad Muddatzir.",
        "Alvin Pradana",
        "Kholis Maulana",
        "Feby Imaniar",
        "Ayu Nur Hikmah",
        "Prof. Dr.Cippek S.Kom., M.Kom."
    );

    echo "<h3>Daftar Nama Teman Sekelas:</h3>";
    echo "<ul>";
    // Mengiterasi array dengan foreach
    foreach ($teman_sekelas as $teman) {
        echo "<li>" . $teman . "</li>";
    }
    echo "</ul>";
    ?> 
</body>
</html>
