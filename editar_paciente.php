<?php
require_once("conex.php");?>

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
    <form id="editarpaciente" class="form">
        <label for="">Nombre</label>
        <input type="text" name="Nombre" value =""<?php echo $fila ["Nombre"];?>>
        <label for="">Apellido</label>
         <input type="text" name="Apellido" value =""<?php echo $fila ["Apellido"];?>>
          <label for="">Cedula</label>
         <input type="text" name="Cedula" value =""<?php echo $fila ["Cedula"];?>>
          <label for="">Edad</label>
         <input type="text" name="Edad" value =""<?php echo $fila ["Edad"];?>>
          <label for="">Sexo</label>
          <input type="text" name="Sexo" value =""<?php echo $fila ["Sexo"];?>>


    </form>
</body>
</html>