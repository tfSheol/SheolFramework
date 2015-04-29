<?php
/**
 * Config.php made by Sheol
 * 28/04/2015 - 13:18
 */

namespace Core;

class Config extends ApplicationComponent {
    protected $vars = array();
    private $_defaultPath = '/../../Config/app.xml';

    private function getGeneralValue($path) {
        $xml = new \DOMDocument;
        $xml->load($path);
        $elements = $xml->getElementsByTagName('define');
        foreach ($elements as $element) {
            $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
        }
    }

    public function get($var, $name = null) {
        if (!$name) {
            $name = $this->app->name();
        }
        if (!$this->vars) {
            $app_path = __DIR__.'/../../App/'.$name.'/Config/app.xml';
            $this->getGeneralValue(__DIR__.$this->_defaultPath);
            if (file_exists($app_path)) {
                $this->getGeneralValue($app_path);
            }
        }
        if (isset($this->vars[$var])) {
            return $this->vars[$var];
        }
        return null;
    }
}
