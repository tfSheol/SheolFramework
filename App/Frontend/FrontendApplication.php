<?php
/**
 * FrontendApplication.php made by Sheol
 * 28/04/2015 - 14:18
 */

namespace App\Frontend;

use \Core\Application;

class FrontendApplication extends Application {
    public function __construct() {
        parent::__construct();
        $this->_name = 'Frontend';
    }

    public function run() {
        $controller = $this->getController();
        $controller->execute("FR_fr");
        $this->_httpResponse->setPage($controller->getPage());
        $this->_httpResponse->send();
    }
}
