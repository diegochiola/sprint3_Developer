<?php
//rutas
$routes = [
    'create_task' => 'CreateTaskController.php',
    'read_task' => 'ReadTaskController.php',
    'update_task' => 'UpdateTaskController.php',
    'delete_task' => 'DeleteTaskController.php'
];

// Verificar acción desde el formulario
if (isset($_GET['action'])) {
    
    $controllerFile = $routes[$_GET['action']] ?? null;// Obtener el nombre del archivo del controlador

    // si existe archivo del controlador, requirirlo
    if ($controllerFile && file_exists('app/controllers/' . $controllerFile)) {
        require_once('app/controllers/' . $controllerFile);
    } else {
        // Si no se encuentra un controlador válido, mostrar un mensaje de error o redirigir a una página de error
        echo 'Invalid action';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TO DO LIST</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<main class="container mx-auto mt-8">
    <div class="w-full max-w-md mx-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-center text-2xl font-bold mb-4 ">TO DO LIST</h1>
            
            <form action="index.php?action=create_task" method="post">
                <input type="hidden" name="task_id" value="1">  
                <div class="mb-4">
                    <label for="task" class="block text-gray-700 text-sm font-bold mb-2">Task:</label>
                    <input type="text" name="title" placeholder="Task Name:" class="border rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Task Status:</label>
                    <select name="status" id="status" class="form-select rounded-md shadow-sm p-2">
                        <option value="TO_DO">To do</option>
                        <option value="IN_PROGRESS">In progress</option>
                        <option value="DONE">Done</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="starts_at" class="block text-gray-700 text-sm font-bold mb-2">Starts at:</label>
                    <input type="datetime-local" name="starts_at" id="starts_at" class="form-input rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4">
                    <label for="ends_at" class="block text-gray-700 text-sm font-bold mb-2">Ends at:</label>
                    <!-- Adelantarnos al usuario y no permitirle que coleque un data7time anterior al inicio-->
                    <input type="datetime-local" name="ends_at" id="ends_at" class="form-input rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4">
                    <label for="create_by_user" class="block text-gray-700 text-sm font-bold mb-2">Created by:</label>
                    <input type="text" name="create_by_user" id="create_by_user" class="border rounded-md p-2">
                </div>
                </div>
                <div class="mb-6 text-center">
                    <button type="submit" name="create_task" id="create_task" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Create Task">Create Task</button>   
                </div>
            </form>
                
       

            <div class="text-muted text-center mt-4 text-xs">Thank you for using this app created by Gonzalo and Diega.</div>
        </div>
    </div>
</main>

</body>
</html>