<?php
namespace App\Utils;

class Ordering
{
    const ORDER_TYPE_ASC = 'ASC';
    const ORDER_TYPE_DESC = 'DESC';
  
    /** @var mixed[] */
    private $data = array();

    /**
     * 
     * @param string $key
     * @param string ORDER_TYPE_ASC|ORDER_TYPE_DESC $orientation
     */
    public function addOrdering($key, $orientation)
    {
        $this->data[$key] = $orientation;
    }

    /**
     * @return mixed[]
     */
    public function toArray() {
      return $this->data;
    }
}
