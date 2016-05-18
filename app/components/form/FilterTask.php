<?php
namespace App\Components\Form;

use App\Model\Entity\Task;
use App\Model\Entity\TaskGroup;
use App\Model\Repository\TaskRepository;
use App\Model\Repository\TaskGroupRepository;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;

class FilterTask extends Control
{
    /** @var string @persistent */
    public $name;
    
    public function render()
    {
        $template = $this->template;
        $template->setFile(__DIR__ . '/templates/FilterTask.latte');
        $template->render();
    }

    /**
     * @return Form
     */
    protected function createComponentFilterTaskForm()
    {
        $form = new Form();
        $form->addText('name', 'Name')->setDefaultValue($this->name);
        $form->addSubmit('submit', 'Find');
        $form->onSuccess[] = array($this, 'filterTaskFormSuccess');
        return $form;
    }
    
    /**
     * @param Form $form
     * @param $values
     */
    public function filterTaskFormSuccess(Form $form, $values)
    {
        $this->redirect('this', array('name' => $values['name']));     
    } 
}
