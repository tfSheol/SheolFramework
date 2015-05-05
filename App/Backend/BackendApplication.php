<?php
/**
 * BackendApplication.php made by Sheol
 * 05/05/2015 - 10:05
 */

namespace App\Backend;

use \Core\Application;

class BackendApplication extends Application {
    public function __construct() {
        parent::__construct();
        $this->_name = 'Backend';
    }

    public function run() {
        if ($this->_user->isAuthenticated()) {
            $controller = $this->getController();
        } else {
            $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'index');
        }
        $controller->execute();
        $this->_httpResponse->setPage($controller->getPage());
        $this->_httpResponse->send();
    }
}
