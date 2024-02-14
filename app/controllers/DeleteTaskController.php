<?php
require_once('app/models/task.php');
require_once('lib/base/controller.php');
class DeleteTaskController extends Controller{
  

    public function deleteTask(){
        $this->init();
        $taskId = $this->_getParam('taskId');
        $taskModel = new Task(); //instanciar la clase task
        $taskModel->delete($taskId); //llamar al metodo delete task de la clase task
    }
}
?>

