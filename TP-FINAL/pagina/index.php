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
      echo ('<button type="submit" name="btn_borrar"  value="'. $cantante['id_cantante'] .'"> X </button> ');
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
      $sentencia = $conexion->prepare($sql);
      $delete="DELETE FROM cantantes WHERE  id_cantante=".'$btn_eliminar'." "; 
      $sentencia = $conexion->prepare($delete);
      $sentencia->execute();
     
    }
    $conexion = null;
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