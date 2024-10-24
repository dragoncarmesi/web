<?php
$conexion = mysqli_connect('localhost','root','','bd_blogsoftware');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Entradas</title>
   <link rel="stylesheet" href="estilo1.css">
</head>
<body>

    <!-- Menú desplegable -->
    <nav>
        <ul>
            <li><a href="Index.html">Inicio</a></li>
            <li><a href="Entrevistas.html">Entrevistas</a>
            <li><a href="Casos.html">Casos</a></li>
            <li><a href="Retos.html">Retos</a></li>
            
                
            </li>
            <li><a href="https://mail.google.com/mail/?view=cm&fs=1&to=jose.varela262731@potro.itson.edu.mx&su=Sugerencias">Enviar sugerencias al jose.varela262731@potros.itson.edu.mx</a></li>
        </ul>
    </nav>
 
<?php
// Primera consulta para obtener aportaciones
$sql_profesion = 'SELECT * FROM tbl_profesion';
$result_profesion = mysqli_query($conexion, $sql_profesion);

// Segunda consulta para obtener links
$sql_institucion = 'SELECT * FROM tbl_institucion';
$result_institucion = mysqli_query($conexion, $sql_institucion);

// Almacenar resultados en arreglos
$profesion = [];
while ($mostrar = mysqli_fetch_array($result_profesion)) {
    $profesion[] = $mostrar['profesion'];
}

$institucion = [];
while ($mostrar = mysqli_fetch_array($result_institucion)) {
    $institucion[] = $mostrar['institucion'];
}

// Asegúrate de que ambos arreglos tengan la misma longitud para mostrar correctamente en la tabla
?>
<h1>Control de entradas</h1>
<table border="3">
    <tr>
        <th>Profesion</th>
        <th>Institucion</th>
    </tr>

    <?php
    // Mostrar datos en la tabla
    for ($i = 0; $i < count($profesion); $i++) {
        echo "<tr>";
        echo "<td>" . $profesion[$i] . "</td>";
        echo "<td>" . (isset($institucion[$i]) ? $institucion[$i] : '') . "</td>"; // Si no hay link, dejar vacío
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
