<?php
/**
 * Manager.php made by Sheol
 * 28/04/2015 - 13:06
 */

namespace Core;

abstract class Manager {
    protected $_dao;

    public function __construct($dao) {
        if ($dao != null) {
            $this->_dao = $dao;
        } else {
            $this->_dao = new DAO();
        }
    }
}
