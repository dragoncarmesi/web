<?php
$conexion = mysqli_connect('localhost','root','','bd_blogsoftware');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aportaciones Adicionales</title>
    <link rel="stylesheet" href="styles.css">
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

    <!-- Contenido principal -->
    <main>
        <h1>Aportaciones</h1>
        <p>Este este apartado se podra subir y ver  diferentes tipos de casos de cosas o anegdotas que les haya pasado a alguna persona, ademas de tambien de poder subir  links de videos para una mejor retroalimentacion.</p>
<form action="datos.php" method="post">

     <label>ingrese su aportacion:</label>
     <textarea type="text" id="txtAportacion" name="txtAportacion" required="" maxlength="400" placeholder="maximo 400 palabras"></textarea><br>
     <label >ingrese el link del video:</label>
     <input type="text" name="txtLink" maxlength="100" placeholder="opcional"><br>

        <button type="submit" name="Enviar">Enviar</button> <br><br>
</form>


 
<?php
// Primera consulta para obtener aportaciones
$sql_aportaciones = 'SELECT * FROM tbl_aportaciones';
$result_aportaciones = mysqli_query($conexion, $sql_aportaciones);

// Segunda consulta para obtener links
$sql_links = 'SELECT * FROM tbl_link';
$result_links = mysqli_query($conexion, $sql_links);

// Almacenar resultados en arreglos
$aportaciones = [];
while ($mostrar = mysqli_fetch_array($result_aportaciones)) {
    $aportaciones[] = $mostrar['Aportaciones'];
}

$links = [];
while ($mostrar = mysqli_fetch_array($result_links)) {
    $links[] = $mostrar['Links'];
}

// Asegúrate de que ambos arreglos tengan la misma longitud para mostrar correctamente en la tabla
?>

<table border="3">
    <tr>
        <th>Aportaciones de casos</th>
        <th>Links del Video</th>
    </tr>

    <?php
    // Mostrar datos en la tabla
    for ($i = 0; $i < count($aportaciones); $i++) {
        echo "<tr>";
        echo "<td>" . $aportaciones[$i] . "</td>";
        echo "<td>" . (isset($links[$i]) ? $links[$i] : '') . "</td>"; // Si no hay link, dejar vacío
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
