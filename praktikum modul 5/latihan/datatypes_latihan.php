<!DOCTYPE html>
<html>
<head>
    <title>Latihan Tipe Data PHP</title>
</head>
<body>
    <h1>Latihan Tipe Data PHP</h1>
    
    <?php 
    $string = "Yudha Achmad Muddatzir.";
    $integer = 202212056;
    $float = 3.85;
    $boolean = true;
    $array = array("HTML", "CSS", "JS", "PHP");
    $null = null;

    echo "<h3>1. String: \$string = \"Yudha Achmad M.\"</h3>";
    echo "<pre>";
    var_dump($string);
    echo "</pre><hr>";

    echo "<h3>2. Integer: \$integer = 202212056</h3>";
    echo "<pre>";
    var_dump($integer);
    echo "</pre><hr>";

    echo "<h3>3. Float: \$float = 3.85</h3>";
    echo "<pre>";
    var_dump($float);
    echo "</pre><hr>";

    echo "<h3>4. Boolean: \$boolean = true</h3>";
    echo "<pre>";
    var_dump($boolean);
    echo "</pre><hr>";

    echo "<h3>5. Array: \$array = array(\"HTML\", \"CSS\", \"JS\", \"PHP\")</h3>";
    echo "<pre>";
    var_dump($array);
    echo "</pre><hr>";

    echo "<h3>6. NULL: \$null = null</h3>";
    echo "<pre>";
    var_dump($null);
    echo "</pre>";
    ?> 
</body>
</html>
