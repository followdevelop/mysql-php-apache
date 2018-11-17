<?php
$mysqli = mysqli_connect("db", "usuario", "clave", "base_de_datos");

if (!$mysqli) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

$query = "SELECT identificador, nombre FROM tabla";

if ($stmt = $mysqli->prepare($query)) {

    /* execute statement */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($identificador, $nombre);

    /* fetch values */
    while ($stmt->fetch()) {
        printf ("%s (%s)\n", $identificador, $nombre);
    }

    /* close statement */
    $stmt->close();
}

mysqli_close($mysqli);
?>