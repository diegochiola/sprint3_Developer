<?php 
include_once ('create_task-php');
include_once ('read_task-php');
include_once ('update_task-php');
include_once ('delete_task-php');
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
            
            <form action="create_task.php" method="post">
                <input type="hidden" name="task_id" value="1">  
                <div class="mb-4">
                    <input type="text" name="title" placeholder="Task Name:" class="border rounded-md p-2">
                   
                    </form>
                </div>
                
                <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold mb-2">Estado:</label>
                    <select name="status" id="status" class="form-select rounded-md shadow-sm">
                        <option value="TO_DO">To do</option>
                        <option value="IN_PROGRESS">In progress</option>
                        <option value="DONE">Done</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Task</button>
            <!-- <div class="mb-4">
                    <label for="task" class="block text-gray-700 text-sm font-bold mb-2">Task:</label>
                    <input type="text" name="task" id="task" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Create task">
                </div>
                <div class="mb-6 text-center">
                    <input type="submit" name="create_task" id="create_task" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Create Task">
                    <span> <?php echo file_get_contents('task.json'); ?></span>
                </div>-->

            </form>
            <ul class="list-group">
                <?php foreach($arrayTasks as $task){ ?>
                    <li class="list-group-item flex justify-between">
                        <span><?php echo $task['task'];?></span>
                        <div class="space-x-4">
                            <a href="delete_task.php?id=<?php echo $task['id'];?>" class="text-red-500">Delete</a>
+                           <a href="update_task.php?id=<?php echo $task['id'];?>" class="text-blue-500">Update</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <div class="text-muted text-center mt-4 text-xs">Thank you for using this app created by Gonzalo and Diega.</div>
        </div>
    </div>
</main>

</body>
</html>
