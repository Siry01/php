<?php
require_once ("conex.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel ="stylesheet" href="/src/main.css"/>    
</head>
<body>

<?php
$sql = "select * from paciente";
$resultado = $conn->query($sql);
if(mysqli_num_rows($resultado)>0){
    ?>
 
<table class="table-fixed mt-3">
  <thead>
    <tr class="border border-pink-400 dark:border-black  ">
      <th class="border border-pink-400 dark:border-black bg-pink-300  text-white ">Nombre</th>
      <th class="border border-gray-300 dark:border-black  bg-pink-300  text-white ">Apellido</th>
      <th class="border border-gray-300 dark:border-black  bg-pink-300  text-white ">Cedula</th>
      <th class="border border-gray-300 dark:border-black  bg-pink-300  text-white ">Edad</th>
      <th class="border border-gray-300 dark:border-black  bg-pink-300  text-white ">Sexo</th>
        <th class="border border-gray-300 dark:border-black  bg-pink-300  text-white ">Editar</th>
      <th class="border border-gray-300 dark:border-black  bg-pink-300  text-white ">Eliminar</th>

    </tr>
  </thead>
 
</table>

    <?php
    while($fila = mysqli_fetch_assoc($resultado)){
        ?>
   
   <table class="table-fixed mt-3">
  <thead>
    <tr class="border border-pink-400 dark:border-black  ">
      <td class="border border-pink-400 dark:border-black bg-pink-300  text-white "><?php echo $fila ["Nombre"];?> </td>
      <td class="border border-gray-300 dark:border-black  bg-pink-300  text-white "><?php echo $fila ["Apellido"];?></td>
      <td class="border border-gray-300 dark:border-black  bg-pink-300  text-white "><?php echo $fila ["Cedula"];?></dh>
      <td class="border border-gray-300 dark:border-black  bg-pink-300  text-white "><?php echo $fila ["Edad"];?></td>
      <td class="border border-gray-300 dark:border-black  bg-pink-300  text-white "><?php echo $fila ["Sexo"];?></td>
      <td class="border border-gray-300 dark:border-black  bg-pink-300  text-white "><a href= "editar_paciente.php?id=<?php echo $fila ['ID_Paciente'];?>">Editar </a></td>
      <td class="border border-gray-300 dark:border-black  bg-pink-300  text-white "><a href= "editar_paciente.php?id=<?php echo $fila ['ID_Paciente'];?>">Eliminar </a></td>

    </tr>
  </thead>
 
</table>

    <?php
    echo $fila["Nombre"];
} ?>

<?php
}else{
    echo "No hay registros";
}
?>
<?php mysqli_close($conn);
?>
    
</body>
</html>