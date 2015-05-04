<?php
/**
 * Managers.php made by Sheol
 * 28/04/2015 - 13:03
 */

namespace Core;

class Managers {
    protected $_api = null;
    protected $_dao = null;
    protected $_managers = array();

    public function __construct($api, $dao) {
        $this->_api = $api;
        $this->_dao = $dao;
    }

    public function getManagerOf($module) {
        if (!is_string($module) || empty($module)) {
            throw new \InvalidArgumentException('The specified module is not valid.');
        }
        if (!isset($this->_managers[$module])) {
            $manager = '\\Model\\'.$module.'Manager'.$this->_api;
            $this->_managers[$module] = new $manager($this->_dao);
        }
        return $this->_managers[$module];
    }
}
