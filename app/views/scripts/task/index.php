<?php
include_once("crear-tarea.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TO DO LIST</title>
    <!-- Include the Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<header></header>

<main class="container mx-auto mt-8">
    <div class="w-full max-w-md mx-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-center text-2xl font-bold mb-4">TO DO LIST</h1>
            <form action="" method="post">
                <div class="mb-4">
                    <label for="tarea" class="block text-gray-700 text-sm font-bold mb-2">Tarea:</label>
                    <input type="text" name="tarea" id="tarea" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Escriba su tarea">
                </div>
                <div class="mb-6 text-center">
                    <input type="submit" name="agregar-tarea" id="agregar-tarea" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Agregar tarea">
                </div>
            </form>
            <ul class="list-group">
                <?php foreach($registros as $registro){ ?>
                    <li class="list-group-item flex justify-between">
                        <span><?php echo $registro['tarea'];?></span>
                        <div class="space-x-4">
                            <a href="?id=<?php echo $registro['id'];?>" class="text-red-500">Eliminar</a>
                            <a href="?id=<?php echo $registro['id'];?>" class="text-blue-500">Editar</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <div class="text-muted text-center mt-4">Gracias por utilizar esta app creada por Gonzalo y Diega.</div>
        </div>
    </div>
</main>

</body>
</html>
