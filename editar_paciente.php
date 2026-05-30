<?php
require_once("conex.php");

if (isset ($_GET['ID_Paciente']) && !empty($_GET['ID_Paciente'])){
    $ID_Paciente = $_GET['ID_Paciente'];


$stmt = $conn->prepare("SELECT * FROM paciente WHERE ID_Paciente =?");
$stmt->bind_param ("i", $ID_Paciente);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0){
    $paciente = $resultado->fetch_assoc();
} else {
    echo "<p class='text-amber-300 m-4'> El paciente no existe.</p>";
    exit;
}   
 } else {
    echo "<p class='text-amber-200 m-4'>Acceso no válido. No se especificó un ID.</P>";
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar paciente</title>
    <link rel="stylesheet" href="/src/main.css">
</head>
<body>
    <h2>Editar Paciente</h2>
    <form action="actualizar_paciente.php" method="post">
        <input type="hidden" name="id" value ="<?php echo $paciente["ID_Paciente"]; ?>">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value ="<?php echo htmlspecialchars($paciente['Nombre']);?>"><br><br>

        <label for="apellido">Apellido</label>
         <input type="text" id="apellido" name="Apellido" value ="<?php echo htmlspecialchars($paciente['Apellido']);?>"><br><br>

          <label for="cedula">Cedula</label>
         <input type="text" id="cedula" name="Cedula" value ="<?php echo htmlspecialchars($paciente['Cedula']);?>"><br><br>

          <label for="edad">Edad</label>
         <input type="text" id="edad" name="Edad" value ="<?php echo htmlspecialchars($paciente['Edad']);?>"><br><br>

          <label for="">Sexo</label>
          <input type="text"  id="sexo" name="Sexo" value ="<?php echo htmlspecialchars($paciente['Sexo']);?>"><br><br>
 
  

    <input type="submit" value="Actualizar">
    <input value="editar" class=>
      </form>
</body>
</html>