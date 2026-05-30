<?php
include 'conex.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = isset($_POST['id']) ? trim($_POST['id']) : null;
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : null;
    $apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : null; 
    $cedula = isset($_POST['cedula']) ? trim($_POST['cedula']) : null;
    $edad = isset($_POST['edad']) ? trim($_POST['edad']) : null;
    $sexo = isset($_POST['sexo']) ? trim($_POST['sexo']) : null;

    if (!empty($id) && !empty($nombre)) {

        $sql = "UPDATE paciente SET Nombre = ?, Apellido = ?, Cedula = ?, Edad = ?, Sexo = ? WHERE ID_Paciente = ?";

        if ($stmt = $conn->prepare($sql)) {

          
            $stmt->bind_param("ssiisi", $nombre, $apellido, $cedula, $edad, $sexo, $id);

            if ($stmt->execute()) {
                header("Location: pacientes.php?mensaje=actualizado");
                exit();
            } else {
                echo "Error al actualizar los datos en la base de datos: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error al preparar la consulta SQL: " . $conn->error;
        }
    } else {
        echo "Error: Los campos obligatorios (ID o Nombre) están vacíos o no se recibieron.";
    }

    $conn->close();

} else {
  
  echo "Acceso no valido. Se esperaba una peticion POST.";
}
?>