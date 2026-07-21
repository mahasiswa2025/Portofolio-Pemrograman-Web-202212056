<!DOCTYPE html>
<html>
<head>
    <title>Latihan Loops PHP</title>
</head>
<body>
    <h1>Latihan Loops PHP (foreach)</h1>
    
    <?php 
    $teknologi = array("HTML", "CSS", "Bootstrap", "Javascript", "PHP", "MySQL");

    echo "<h3>Daftar Teknologi Pemrograman Web yang Dipelajari:</h3>";
    echo "<ol>";
    foreach ($teknologi as $item) {
        echo "<li>" . $item . "</li>";
    }
    echo "</ol>";
    ?> 
</body>
</html>
