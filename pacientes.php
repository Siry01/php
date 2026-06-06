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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/src/main.css"/>    
</head>
<body class="bg-gray-50 p-6">

<?php if (iseet ($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'):?>
  <div class="border border-gray-300 dark:border-black bg-pink-300 text-white p-2">
    ¡Paciente eliminado con exito!
  </div>
  <?php endif;?>

<?php
$sql = "select * from paciente";
$resultado = $conn->query($sql);

if(mysqli_num_rows($resultado) > 0){
    ?>
 
    <div class="overflow-x-auto">
        <table class="table-fixed w-full max-w-4xl bg-white shadow-md rounded-lg overflow-hidden mt-3">
          <thead>
            <tr class="border border-pink-400 dark:border-black">
              <th class="border border-pink-400 dark:border-black bg-pink-300 text-white p-2">Nombre</th>
              <th class="border border-gray-300 dark:border-black bg-pink-300 text-white p-2">Apellido</th>
              <th class="border border-gray-300 dark:border-black bg-pink-300 text-white p-2">Cédula</th>
              <th class="border border-gray-300 dark:border-black bg-pink-300 text-white p-2">Edad</th>
              <th class="border border-gray-300 dark:border-black bg-pink-300 text-white p-2">Sexo</th>
              <th class="border border-gray-300 dark:border-black bg-pink-300 text-white p-2">Editar</th>
              <th class="border border-gray-300 dark:border-black bg-pink-300 text-white p-2">Eliminar</th>
            </tr>
          </thead>
          <tbody>
         
        <?php
        while($fila = mysqli_fetch_assoc($resultado)){
            ?>
            <tr class="border border-pink-400 dark:border-black hover:bg-pink-50 transition-colors">
              <td class="border border-pink-400 dark:border-black p-2"><?php echo htmlspecialchars($fila["Nombre"]);?></td>
              <td class="border border-gray-300 dark:border-black p-2"><?php echo htmlspecialchars($fila["Apellido"]);?></td>
              <td class="border border-gray-300 dark:border-black p-2"><?php echo htmlspecialchars($fila["Cedula"]);?></td> 
              <td class="border border-gray-300 dark:border-black p-2"><?php echo htmlspecialchars($fila["Edad"]);?></td>
              <td class="border border-gray-300 dark:border-black p-2"><?php echo htmlspecialchars($fila["Sexo"]);?></td>
              <td class="border border-gray-300 dark:border-black p-2 text-center">
                  <a class="text-blue-600 hover:text-blue-800 font-medium hover:underline" href="editar_paciente.php?ID_Paciente=<?php echo $fila['ID_Paciente'];?>">Editar</a>
              </td>
              <td class="border border-gray-300 dark:border-black p-2 text-center">
                  <a class="text-red-600 hover:text-red-800 font-medium hover:underline" href="eliminar.php?id=<?php echo $fila['ID_Paciente'];?>">Eliminar</a>
              </td>
            </tr>
            <?php
        } 
        ?>
        
          </tbody>
        </table>
    </div>

<?php
} else {
    echo "<p class='m-4 text-gray-600 italic'>No hay registros de pacientes.</p>";
}

mysqli_close($conn);
?>
    
</body>
</html>