<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subir</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   
<?php
 $conn = mysqli_connect('localhost', 'root', '', 'bd_blogsoftware');
    // Asegúrate de que el método sea POST antes de acceder a los datos
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Escapar datos para evitar inyección SQL
        $Aportaciones = mysqli_real_escape_string($conn, $_POST['txtAportacion']);
        $Links = mysqli_real_escape_string($conn, $_POST['txtLink']);

        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Inserción en tbl_aportaciones
        $sql_aportaciones = "INSERT INTO tbl_aportaciones (Aportaciones) VALUES ('$Aportaciones')";
        if (mysqli_query($conn, $sql_aportaciones)) {
            echo "Aportación subida correctamente.<br>";
        } else {
            echo "Error al subir la aportación: " . mysqli_error($conn) . "<br>";
        }

        // Inserción en tbl_link
        if (!empty($Links)) { // Solo intenta insertar si hay un link
            $sql_links = "INSERT INTO tbl_link (Links) VALUES ('$Links')";
            if (mysqli_query($conn, $sql_links)) {
                echo "Link subido correctamente.<br>";
            } else {
                echo "Error al subir el link: " . mysqli_error($conn) . "<br>";
            }
        }

        // Cerrar conexión
        mysqli_close($conn);
    }
?>

<br>
<form action="Aportaciones.php">
    <button type="submit" name="btnVer">Ir a Consultar</button>
</form>

</body>
</html>
