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

    /**
     * Les switch case sont bien plus lent que les if elseif pour l'instant !
     *
     * @param $lang
     * @return string
     */
    private function getLangFileName($lang) {
        if ($lang === "fr") {
            return $lang."_FR";
        } elseif ($lang === "en") {
            return $lang."_US";
        } else {
            return "fr_FR";
        }
    }

    public function get($lang) {
        if (!$this->_vars) {
            $app_path = __DIR__.'/../../App/'.$this->_app->getName().'/Config/Lang/'.$this->getLangFileName($lang).'.xml';
            $this->getGeneralValue(__DIR__.'/../../Config/Lang/'.$this->getLangFileName($lang).'.xml');
            if (file_exists($app_path)) {
                $this->getGeneralValue($app_path);
            }
        }
        return $this->_vars;
    }
}
