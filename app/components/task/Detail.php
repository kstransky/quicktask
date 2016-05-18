<?php
namespace App\Components\Task;

use Nette\Application\UI\Control;
use App\Model\Repository\TaskRepository;

class Detail extends Control
{
    /** @var TaskRepository*/
    public $taskRepository;
    
    /**
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        parent::__construct();
        $this->taskRepository = $taskRepository;
    }    
    
    /**
     * @param mixed $task
     */
    public function render(array $task)
    {
        $this->template->setFile(__DIR__ . '/templates/Detail.latte');
        $this->template->task = $task;
        $this->template->render();
    }
    
    /**
     * @param string $id
     */
    public function handleComplete($id)
    {
        $this->updateCompletedStatus((int)$id, true);
    }
    
    /**
     * @param string $id
     */
    public function handleUncomplete($id)
    {
        $this->updateCompletedStatus((int)$id, false);
    }
    
    /**
     * @param int $id
     * @param boolean $completed
     */
    private function updateCompletedStatus($id, $completed)
    {
        $task = $this->taskRepository->getById($id);
        if (isset($task)) {
            $task->setCompleted($completed);
            $this->taskRepository->updateEntity($task);
        }
    } 
}
