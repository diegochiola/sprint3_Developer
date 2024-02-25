<?php
require_once(__DIR__ . '/../../models/TaskModel.php');
require_once(__DIR__ . '/../../models/ToDoModel.php');
require_once(__DIR__ . '/../../lib/base/Controller.php');
require_once(__DIR__ . '/ErrorController.php'); 


class ApplicationController extends Controller {
    
    private $toDo;

    public function __construct(){
        $this->toDo = new ToDoModel();
    }

    // Función taskList
    public function tasksListAction() {
        try {
            return $this->toDo->getTasks();
        } catch (Exception $e) { //aplicar el Error controller
            $errorController = new ErrorController();
            $errorController->setException($e);
            $errorController->errorAction();
        }
    }

    // Acciones 
    public function deleteTaskAction() {
        try {
            if(isset($_GET["task_id"])) {
                $taskId = $_GET["task_id"];
                // Verificar si s ehizo o no
                $success = $this->toDo->delete($taskId);
                if ($success) {
                    header("Location: tasksList");
                } else {
                    throw new Exception("Error: Unable to delete the task.");
                }
            } else {
                throw new Exception("Error: Task ID not provided.");
            }
        } catch (Exception $e) {
            $errorController = new ErrorController();
            $errorController->setException($e);
            $errorController->errorAction();
        }
    }

    public function insertTaskAction() {
        try {
            if (isset($_POST["taskName"], $_POST["createdBy"], $_POST["creationDate"], $_POST["deadline"], $_POST["taskStatus"])) {
                //validar datos
                $taskName = $_POST["taskName"];
                $createdBy = $_POST["createdBy"];
                $creationDate = $_POST["creationDate"];
                $deadline = $_POST["deadline"];
                $statusTask = $_POST["taskStatus"];

                // Verificar campos obligatorios y formato
                if(empty($taskName) || empty($createdBy) || empty($creationDate) || empty($deadline) || empty($statusTask)) {
                    throw new Exception("Error: All data is mandatory.");
                } else {
                    // Crear una nueva tarea
                    $this->toDo->createTask(new Task($taskName, $createdBy, $creationDate, $deadline, $statusTask));
                    header("Location: tasksList");
                }
            } else {
                throw new Exception("Error: All data is mandatory.");
            }
        } catch (Exception $e) {
            $errorController = new ErrorController();
            $errorController->setException($e);
            $errorController->errorAction();
        }
    }

    public function updateTaskView() {
        try {
            if (isset($_GET["task_id"])) {
                $taskId = $_GET["task_id"];
                $tasksFound = $this->toDo->fetchOne($taskId); 
                return $tasksFound;
            }
        } catch (Exception $e) {
            $errorController = new ErrorController();
            $errorController->setException($e);
            $errorController->errorAction();
        }
    }


    public function updateTaskAction() {
        try {
            if(isset($_POST["task_id"])) {    
                $taskId = (int) $_POST["task_id"];
                $taskName = $_POST["taskName"];
                $createdBy = $_POST["createdBy"];
                $creationDate = $_POST["creationDate"];
                $deadline = $_POST["deadline"];
                $taskStatus = $_POST["taskStatus"];

                $updatedTask = [
                    "task_id" => $taskId,
                    "task" => $taskName,
                    "status" => $taskStatus,
                    "created_by" => $createdBy,
                    "starts_at" => $creationDate,
                    "deadline" => $deadline
                ];

                $this->toDo->updateTask($updatedTask);

                header("Location: tasksList"); // Redirige a la vista de lista de tareas
            }
        } catch (Exception $e) {
            $errorController = new ErrorController();
            $errorController->setException($e);
            $errorController->errorAction();
        }
    }
}
?>
