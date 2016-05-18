<?php
namespace App\Factories\Task;

use App\Components\Task\Detail;

interface IDetailFactory
{
    /**
     * @return Detail
     */
    public function create();
}
