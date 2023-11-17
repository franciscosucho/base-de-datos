<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cantantes";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO cantantes (nombre, fecha_nacimiento, nacionalidad) VALUES (:nombre, :fecha_nacimiento, :nacionalidad)");

        $nombre = htmlspecialchars($_POST['nombre']);
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $nacionalidad = htmlspecialchars($_POST['nacionalidad']);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fecha_nacimiento', $fechaNacimiento);
        $stmt->bindParam(':nacionalidad', $nacionalidad);

        $stmt->execute();
        header("location:http://localhost/TP-FINAL/pagina/pagina/index.php");
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>
