<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1.5</title>
</head>
<body>
    <?php
    
    define("MAX", 10);
    echo "<table border='1'>";
    $n = 1;
    for ($i = 1; $i <= MAX; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= MAX; $j++) {
            echo "<td>" . $n . "</td>";
            $n = $n + 1;
        }
        echo "</tr>";
    }
    echo "</table>";
    
    ?>
</body>
</html>