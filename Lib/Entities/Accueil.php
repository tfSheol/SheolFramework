<?php
/**
 * Accueil.php made by Sheol
 * 30/04/2015 - 10:48
 */

namespace Entities;

use Core\Entity;

class Accueil extends Entity {
    protected $_firstTest;
    protected $_secondTest;

    public function setFirstTest($test) {
        $this->_firstTest = $test;
    }

    public function setSecondTest($test) {
        $this->_secondTest = $test;
    }

    public function getFirstTest() {
        return $this->_firstTest;
    }

    public function getSecondTest() {
        return $this->_secondTest;
    }
}
