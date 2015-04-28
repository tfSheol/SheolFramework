<?php
/**
 * ApplicationComponent.php made by Sheol
 * 28/04/2015 - 12:34
 */

namespace Core;

abstract class ApplicationComponent {
    protected $app;

    public function __construct(Application $app) {
        $this->app = $app;
    }

    public function app() {
        return $this->app;
    }
}
