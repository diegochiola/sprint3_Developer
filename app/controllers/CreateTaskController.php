<?php
require_once('app/models/task.php');

class CreateTaskController{
  

    public function createTask($dataTask){
        $taskModel = new Task(); //instanciar la clase task
        $taskModel->createTask($dataTask); //llamar al metodo create task de la clase task
    }
}
?>
