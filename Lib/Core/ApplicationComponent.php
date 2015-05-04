<?php
/**
 * ApplicationComponent.php made by Sheol
 * 28/04/2015 - 12:34
 */

namespace Core;

abstract class ApplicationComponent {
    protected $_app;

    public function __construct(Application $app) {
        $this->_app = $app;
    }

    public function getApp() {
        return $this->_app;
    }
}
