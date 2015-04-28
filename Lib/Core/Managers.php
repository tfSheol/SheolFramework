<?php
/**
 * Managers.php made by Sheol
 * 28/04/2015 - 13:03
 */

namespace Core;

class Managers {
    protected $api = null;
    protected $dao = null;
    protected $managers = [];

    public function __construct($api, $dao) {
        $this->api = $api;
        $this->dao = $dao;
    }

    public function getManagerOf($module) {
        if (!is_string($module) || empty($module)) {
            throw new \InvalidArgumentException('Le module spécifié est invalide');
        }
        if (!isset($this->managers[$module])) {
            $manager = '\\Model\\'.$module.'Manager'.$this->api;
            $this->managers[$module] = new $manager($this->dao);
        }
        return $this->managers[$module];
    }
}
