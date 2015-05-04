<?php
/**
 * Route.php made by Sheol
 * 28/04/2015 - 12:47
 */

namespace Core;

class Route {
    protected $_action;
    protected $_module;
    protected $_url;
    protected $_varsNames;
    protected $_vars = array();

    public function __construct($url, $module, $action, array $varsNames) {
        $this->setUrl($url);
        $this->setModule($module);
        $this->setAction($action);
        $this->setVarsNames($varsNames);
    }

    public function hasVars() {
        return !empty($this->_varsNames);
    }

    public function match($url) {
        if (preg_match('`^'.$this->_url.'$`', $url, $matches)) {
            return $matches;
        } else {
            return false;
        }
    }

    public function setAction($action) {
        if (is_string($action)) {
            $this->_action = $action;
        }
    }

    public function setModule($module) {
        if (is_string($module)) {
            $this->_module = $module;
        }
    }

    public function setUrl($url) {
        if (is_string($url)) {
            $this->_url = $url;
        }
    }

    public function setVarsNames(array $varsNames) {
        $this->_varsNames = $varsNames;
    }

    public function setVars(array $vars) {
        $this->_vars = $vars;
    }

    public function getAction() {
        return $this->_action;
    }

    public function getModule() {
        return $this->_module;
    }

    public function getVars() {
        return $this->_vars;
    }

    public function getVarsNames() {
        return $this->_varsNames;
    }
}
