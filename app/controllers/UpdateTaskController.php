<?php
require_once('app/models/task.php');

class UpdateTaskController{
  

    public function updateTask($dataTask){
        $taskModel = new Task(); //instanciar la clase task
        return $taskModel->fetchOne($dataTask); //llamar al metodo delete task de la clase task
    }
}
?>
