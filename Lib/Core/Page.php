<?php
/**
 * Page.php made by Sheol
 * 28/04/2015 - 13:10
 */

namespace Core;

class Page extends ApplicationComponent {
    protected $_contentFile;
    protected $_vars = array();

    public function addVar($var, $value) {
        if (!is_string($var) || is_numeric($var) || empty($var)) {
            throw new \InvalidArgumentException('The variable name must be a string not null.');
        }
        $this->_vars[$var] = $value;
    }

    public function addLang($array) {
        foreach ($array as $var => $data) {
            if (!is_string($var) || is_numeric($var) || empty($var)) {
                throw new \InvalidArgumentException('The variable name must be a string not null.');
            }
            $this->_vars[$var] = $data;
        }
    }

    public function getGeneratedPage() {
        if (!file_exists($this->_contentFile)) {
            throw new \RuntimeException('The specified view does not exist.');
        }
        $user = $this->_app->getUser();
        extract($this->_vars);
        ob_start();
            require $this->_contentFile;
        $content = ob_get_clean();
        ob_start();
            require __DIR__.'/../../App/'.$this->_app->getName().'/Templates/layout.php';
        return ob_get_clean();
    }

    public function setContentFile($contentFile) {
        if (!is_string($contentFile) || empty($contentFile)) {
            throw new \InvalidArgumentException('The specified view is invalid.');
        }
        $this->_contentFile = $contentFile;
    }
}
