<?php
/**
 * Config.php made by Sheol
 * 28/04/2015 - 13:18
 */

namespace Core;

class Config {
    protected $vars = [];

    public function get($var) {
        if (!$this->vars) {
            $xml = new \DOMDocument;
            $xml->load(__DIR__.'/../../App/'.$this->app->name().'/Config/app.xml');
            $elements = $xml->getElementsByTagName('define');
            foreach ($elements as $element) {
                $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
            }
        }
        if (isset($this->vars[$var])) {
            return $this->vars[$var];
        }
        return null;
    }
}
