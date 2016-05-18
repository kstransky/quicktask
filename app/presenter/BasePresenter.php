<?php
namespace App\Presenters;

use Nette;

/**
 * Error presenter.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    public function afterRender()
    {
        if ($this->isAjax() && $this->hasFlashSession()) {
            $this->redrawControl('flashes');
        }
    }

    /**
     * @param string $filterComponentName
     * @return mixed[]
     */
    protected function createComponentFilterDataFromRequest($filterComponentName)
    {
        $filterComponentPrefix = $filterComponentName . '-';
        $filterParameters = \array_filter($this->request->getParameters(), function($parameterName) use ($filterComponentPrefix) {
            return \strpos($parameterName, $filterComponentPrefix) === 0;
        }, ARRAY_FILTER_USE_KEY);
        
        $filterData = array();
        foreach ($filterParameters as $key => $value)
        {
            $parameterName = \substr($key, \strlen($filterComponentPrefix));
            $filterData[$parameterName] = $value;
        }

        return $filterData;
    }
}
