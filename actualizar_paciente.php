<?php
include 'conex.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    $id = isset($_POST['id']) ? trim($_POST['id']) : null;
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : null;
    $apellido = isset($_POST['Apellido']) ? trim($_POST['Apellido']) : null; 
    $cedula = isset($_POST['Cedula']) ? trim($_POST['Cedula']) : null;
    $edad = isset($_POST['Edad']) ? trim($_POST['Edad']) : null;
    $sexo = isset($_POST['Sexo']) ? trim($_POST['Sexo']) : null;


    if (isset($_POST['id']) && $_POST['id'] !== '' && !empty($nombre)) {

        $sql = "UPDATE paciente SET Nombre = ?, Apellido = ?, Cedula = ?, Edad = ?, Sexo = ? WHERE ID_Paciente = ?";

        if ($stmt = $conn->prepare($sql)) {

          
            $id_int = (int)$id;
            $edad_int = (int)$edad;

            $stmt->bind_param("ssissi", $nombre, $apellido, $cedula, $edad_int, $sexo, $id_int);

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
  echo "Acceso no válido. Se esperaba una petición POST.";
}
?>