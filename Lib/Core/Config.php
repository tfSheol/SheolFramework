<?php
/**
 * Config.php made by Sheol
 * 28/04/2015 - 13:18
 */

namespace Core;

class Config extends ApplicationComponent {
    protected $_vars = array();
    private $_defaultPath = '/../../Config/app.xml';

    private function setErrorShow() {
        if ($this->_vars['debug'] == "true") {
            error_reporting(E_ALL);
            ini_set("display_errors", 1);
        }
    }

    private function getGeneralValue($path) {
        $xml = new \DOMDocument;
        $xml->load($path);
        $elements = $xml->getElementsByTagName('define');
        foreach ($elements as $element) {
            $this->_vars[$element->getAttribute('var')] = $element->getAttribute('value');
        }
        $this->setErrorShow();
    }

    public function get($var, $name = null) {
        if (!$name) {
            $name = $this->_app->getName();
        }
        if (!$this->_vars) {
            $app_path = __DIR__.'/../../App/'.$name.'/Config/app.xml';
            $this->getGeneralValue(__DIR__.$this->_defaultPath);
            if (file_exists($app_path)) {
                $this->getGeneralValue($app_path);
            }
        }
        if (isset($this->_vars[$var])) {
            return $this->_vars[$var];
        }
        return null;
    }
}
