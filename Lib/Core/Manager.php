<?php
/**
 * Manager.php made by Sheol
 * 28/04/2015 - 13:06
 */

namespace Core;

abstract class Manager {
    protected $dao;

    public function __construct($dao) {
        $this->dao = $dao;
    }
}
