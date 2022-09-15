<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1.4</title>
</head>
<body>
    <?php
    
    echo "<table border='1'>";
    $n = 1;
    for ($i = 1; $i <= 10; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= 10; $j++) {
            echo "<td>" . $n . "</td>";
            $n++;
        }
        echo "</tr>";
    }
    echo "</table>";

    ?>
</body>
</html>