<?php
require_once('app/models/task.php');

class DeleteTaskController{
  

    public function deleteTask($taskId){
        $taskModel = new Task(); //instanciar la clase task
        $taskModel->delete($taskId); //llamar al metodo delete task de la clase task
    }
}
?>

