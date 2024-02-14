<?php
require_once('app/models/task.php');

class ReadTaskController{
  

    public function readTask(){
        $taskModel = new Task(); //instanciar la clase task
        $taskModel->loadData(); //llamar al metodo create task de la clase task
    }
}
?>
