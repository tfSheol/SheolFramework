<?php
/**
 * HomeController.php made by Sheol
 * 05/05/2015 - 11:23
 */

namespace App\Backend\Modules\Home;

use Core\BackController;
use Core\HTTPRequest;

class HomeController extends BackController {
    public function executeIndex(HTTPRequest $request) {
        $this->_page->addVar('title', 'Connexion');
    }
}
