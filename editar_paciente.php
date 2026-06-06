<?php
require_once("conex.php");

if (isset ($_GET['ID_Paciente']) && !empty($_GET['ID_Paciente'])){
    $ID_Paciente = $_GET['ID_Paciente'];

    $stmt = $conn->prepare("SELECT * FROM paciente WHERE ID_Paciente = ?");
    $stmt->bind_param ("i", $ID_Paciente);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0){
        $paciente = $resultado->fetch_assoc();
    } else {
     
        echo "
        <div class='flex justify-center items-center h-screen bg-pink-50/50'>
            <div class='bg-rose-50 border-l-4 border-rose-500 p-4 rounded-xl shadow-sm max-w-md w-full mx-4'>
                <p class='text-rose-700 font-medium text-center'>El paciente no existe o fue eliminado.</p>
            </div>
        </div>";
        exit;
    }   
} else {
   
    echo "
    <div class='flex justify-center items-center h-screen bg-pink-50/50'>
        <div class='bg-pink-50 border-l-4 border-pink-400 p-4 rounded-xl shadow-sm max-w-md w-full mx-4'>
            <p class='text-pink-700 font-medium text-center'>Acceso no válido. No se especificó un ID.</p>
        </div>
    </div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar paciente</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/src/main.css">
</head>
<body class="bg-pink-50/50 font-sans min-h-screen flex items-center justify-center p-6">

  
    <div class="bg-white p-8 rounded-2xl shadow-md border border-pink-100 w-full max-w-lg">
        
      
        <div class="mb-6 border-b border-pink-100 pb-4 text-center">
            <h2 class="text-2xl font-bold text-pink-600">Editar Paciente</h2>
            <p class="text-gray-400 text-sm mt-1">Actualiza la información del expediente</p>
        </div>

       
        <form action="actualizar_paciente.php" method="post" class="space-y-5">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($paciente['ID_Paciente'] ?? ''); ?>">
            
           
            <div>
                <label for="nombre" class="block text-sm font-semibold text-gray-600 mb-1">Nombre</label>
                <input type="text" id="nombre" name="nombre" 
                       value="<?php echo htmlspecialchars($paciente['Nombre'] ?? ''); ?>"
                       class="w-full px-4 py-2 border border-pink-200 rounded-xl focus:ring-2 focus:ring-pink-400 focus:border-pink-400 bg-pink-50/20 text-gray-700 outline-none transition-all">
            </div>

           
            <div>
                <label for="apellido" class="block text-sm font-semibold text-gray-600 mb-1">Apellido</label>
                <input type="text" id="apellido" name="Apellido" 
                       value="<?php echo htmlspecialchars($paciente['Apellido'] ?? ''); ?>"
                       class="w-full px-4 py-2 border border-pink-200 rounded-xl focus:ring-2 focus:ring-pink-400 focus:border-pink-400 bg-pink-50/20 text-gray-700 outline-none transition-all">
            </div>

          
            <div>
                <label for="cedula" class="block text-sm font-semibold text-gray-600 mb-1">Cédula</label>
                <input type="text" id="cedula" name="Cedula" 
                       value="<?php echo htmlspecialchars($paciente['Cedula'] ?? ''); ?>"
                       class="w-full px-4 py-2 border border-pink-200 rounded-xl focus:ring-2 focus:ring-pink-400 focus:border-pink-400 bg-pink-50/20 text-gray-700 outline-none transition-all">
            </div>

            <div class="grid grid-cols-2 gap-4">
               
                <div>
                    <label for="edad" class="block text-sm font-semibold text-gray-600 mb-1">Edad</label>
                    <input type="text" id="edad" name="Edad" 
                           value="<?php echo htmlspecialchars($paciente['Edad'] ?? ''); ?>"
                           class="w-full px-4 py-2 border border-pink-200 rounded-xl focus:ring-2 focus:ring-pink-400 focus:border-pink-400 bg-pink-50/20 text-gray-700 outline-none transition-all">
                </div>

               
                <div>
                    <label for="sexo" class="block text-sm font-semibold text-gray-600 mb-1">Sexo</label>
                    <input type="text" id="sexo" name="Sexo" 
                           value="<?php echo htmlspecialchars($paciente['Sexo'] ?? ''); ?>"
                           class="w-full px-4 py-2 border border-pink-200 rounded-xl focus:ring-2 focus:ring-pink-400 focus:border-pink-400 bg-pink-50/20 text-gray-700 outline-none transition-all">
                </div>
            </div>

          
            <div class="flex items-center justify-end space-x-3 pt-4">
              
                <button type="submit" 
                        class="px-6 py-2 text-sm font-semibold text-white bg-pink-500 hover:bg-pink-600 active:bg-pink-700 rounded-xl shadow-sm shadow-pink-200 focus:ring-4 focus:ring-pink-200 transition-colors cursor-pointer">
                    Actualizar
                </button>
            </div>
        </form>
    </div>

</body>
</html>