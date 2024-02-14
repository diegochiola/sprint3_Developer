<?php
require_once('app/models/task.php');
require_once('lib/base/Controller.php');

class UpdateTaskController extends Controller{
  

    public function updateTask(){
        $this->init();
        $taskId= $this->_getParam('taskId');//id de la tarea a actualizar
        
        $taskModel = new Task(); //instanciar la clase task
        $task = $taskModel->fetchOne($taskId); //actualizar la tarea
    }
}
?>
