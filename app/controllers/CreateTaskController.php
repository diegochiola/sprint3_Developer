<?php
require_once('app/models/task.php');
require_once('lib/base/controller.php');
class CreateTaskController extends Controller{
  

    public function createTask(){
        $this->init(); //inicio de vista
        $dataTask = $this->_getParam('dataTask'); //obtener el parametro 
        $taskModel = new Task(); //instanciar la clase task
        $taskModel->createTask($dataTask); //llamar al metodo create task de la clase task
    }
}
?>
