<?php
//1. Incluir a la base de datos
include 'conex.php'; 

//2. Verificar que los datos hayan sido enviados por el metodo post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

//3. capturar y limpiar los datos del formulario
//asegurate de que los nombres coincidan con el atributo 'name' de tus inputs
 $id = isset($_POST['id']) ? trim($_POST['id']) : null;
    

 if (!empty($id)){

 $sql = "DELETE FROM paciente WHERE id=$id";

  if ($stmt = $conn->prepare($sql)){
     
  $stmt->bind_param("i", $id);

  if ($stmt->execute()){
    $stmt->close();
    $conn->close();

    header("Location: pacientes.php?mensaje=eliminado");
    exit();
  }else{
    echo "Error al eliminar el registro: " . $stmt->error; 
  }
   $stmt->close();
 }else{
    echo "Error al preparar la consulta: " . $conn->error;
 }
  }else{
    echo "error: id de paciente no valido o vacio";
  }

  $conn->close();
   }else{
    header("Location: pacientes.php");
    exit();
   }
?>