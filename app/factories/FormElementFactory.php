<?php
namespace App\Factories;

use App\Model\Repository\TaskGroupRepository;

class FormElementFactory
{
    /** @var TaskGroupRepository*/
    public $taskGroupRepository;
  
    /**
     * @param \App\Factories\TaskGroupRepository $taskGroupRepository
     */
    public function __construct(TaskGroupRepository $taskGroupRepository) {
        $this->taskGroupRepository = $taskGroupRepository;
    }

    /**
     * @param string $label
     * @return \Nette\Forms\Controls\SelectBox
     */
    public function getTaskGroupsSelect($label) {
        $data = array();
        foreach ($this->taskGroupRepository->getAll() as $taskGroup) {
          $data[$taskGroup->getId()] = $taskGroup->getName();
        }
      
        return new \Nette\Forms\Controls\SelectBox($label, $data);
    }
}
