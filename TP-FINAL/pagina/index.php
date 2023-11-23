<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cantantes</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Cantantes</h1>

  <div class="cantantes-container">
    <?php
    $conexion = new PDO('mysql:host=localhost;dbname=cantantes', 'root', '');

    $sql = 'SELECT * FROM cantantes';
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();

    while ($cantante = $sentencia->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="cantante">';
      echo '<form method="post" action="">'; // Agregar el formulario
      echo ('<button type="submit" name="btn_borrar" class="btn_eliminar" value='. $cantante['id_cantante'] .'>X</button>');
      echo '</form>'; // Cerrar el formulario
      echo '<table>';
      echo '<thead>';
      echo '<tr>';
      echo '<th colspan="2">Información del cantante</th>';
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      echo '<tr>';
      echo '<td>Nombre:</td>';
      echo '<td>' . $cantante['nombre'] . '</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td>Fecha de nacimiento:</td>';
      echo '<td>' . $cantante['fecha_nacimiento'] . '</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td>Nacionalidad:</td>';
      echo '<td>' . $cantante['nacionalidad'] . '</td>';
      echo '</tr>';
      echo '</tbody>';
      echo '</table>';
      echo '</div>'; 
    }
    if (isset($_POST['btn_borrar'])){ 
      $btn_eliminar= $_POST['btn_borrar'];
      
      // Verificar la conexión a la base de datos
      if ($conexion) {
        // Eliminar las filas secundarias en la tabla cantantes_canciones
        $delete_canciones = "DELETE FROM cantantes_canciones WHERE id_cantante = :id";
        $sentencia_canciones = $conexion->prepare($delete_canciones);
        $sentencia_canciones->bindParam(':id', $btn_eliminar, PDO::PARAM_INT);
        $sentencia_canciones->execute();
    
        // Eliminar la fila principal en la tabla cantantes
        $delete_cantante = "DELETE FROM cantantes WHERE id_cantante = :id";
        $sentencia_cantante = $conexion->prepare($delete_cantante);
        $sentencia_cantante->bindParam(':id', $btn_eliminar, PDO::PARAM_INT);
        $sentencia_cantante->execute();
      } else {
        echo "Error de conexión a la base de datos";
      }
    }
    ?>
  </div> 

  <!--agregar cantantes-->
  <button id="mostrarFormulario">Agregar nuevo cantante</button>

<div id="formularioAgregar" style="display: none;">
  <h2>Agregar nuevo cantante</h2>
  <form id="formulario" method="POST" action="agregar_cantante.php">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="fechaNacimiento">Fecha de nacimiento:</label>
    <input type="date" id="fechaNacimiento" name="fechaNacimiento" required><br><br>

    <label for="nacionalidad">Nacionalidad:</label>
    <input type="text" id="nacionalidad" name="nacionalidad" required><br><br>

    <input type="submit" value="Agregar">
  </form>
</div>


</body>
<script src="index.js"></script>
</html>
