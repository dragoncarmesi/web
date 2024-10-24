<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subir</title>
    <link rel="stylesheet" href="estilo1.css">
</head>
<body>
   
<?php
 $conn = mysqli_connect('localhost', 'root', '', 'bd_blogsoftware');
    // Asegúrate de que el método sea POST antes de acceder a los datos
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Escapar datos para evitar inyección SQL
        $profesion = mysqli_real_escape_string($conn, $_POST['txtprofesion']);
        $institucion = mysqli_real_escape_string($conn, $_POST['txtinstitucion']);

        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Inserción en tbl_aportaciones
        $sql_profesion = "INSERT INTO tbl_profesion (profesion) VALUES ('$profesion')";
        if (mysqli_query($conn, $sql_profesion)) {
            echo "profesion subida correctamente.<br>";
        } else {
            echo "Error al subir la profesion: " . mysqli_error($conn) . "<br>";
        }

        // Inserción en tbl_link
        if (!empty($institucion)) { // Solo intenta insertar si hay un link
            $sql_institucion = "INSERT INTO tbl_institucion (institucion) VALUES ('$institucion')";
            if (mysqli_query($conn, $sql_institucion)) {
                echo "institucion subida correctamente.<br>";
            } else {
                echo "Error al subir el institucion: " . mysqli_error($conn) . "<br>";
            }
        }

        // Cerrar conexión
        mysqli_close($conn);
    }
?>

<br>
<form action="Inicio.html">
    <button type="submit" name="btnVer">Ir a Incio</button>
</form>

</body>
</html>
