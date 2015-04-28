<?php
/**
 * Hydrator.php made by Sheol
 * 28/04/2015 - 14:51
 */

namespace Core;

trait Hydrator
{
    public function hydrate($data){
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}
