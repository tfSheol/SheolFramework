<?php
/**
 * Lang.php made by Sheol
 * 29/04/2015 - 16:52
 */

namespace Core;

class Lang extends ApplicationComponent {
    protected $_vars = array();

    private function getGeneralValue($path) {
        $xml = new \DOMDocument;
        $xml->load($path);
        $elements = $xml->getElementsByTagName('define');
        foreach ($elements as $element) {
            $this->_vars['_'.$element->getAttribute('var').'_'] = $element->getAttribute('value');
        }
    }

    public function get($lang) {
        if (!$this->_vars) {
            $app_path = __DIR__.'/../../App/'.$this->_app->getName().'/Config/Lang/'.$lang.'.xml';
            $this->getGeneralValue(__DIR__.'/../../Config/Lang/'.$lang.'.xml');
            if (file_exists($app_path)) {
                $this->getGeneralValue($app_path);
            }
        }
        return $this->_vars;
    }
}
