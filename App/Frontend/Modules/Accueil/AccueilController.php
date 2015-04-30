<?php
/**
 * AccueilController.php made by Sheol
 * 28/04/2015 - 17:08
 */

namespace App\Frontend\Modules\Accueil;

use Core\BackController;
use Core\HTTPRequest;

class AccueilController extends BackController {
    public function executeIndex(HTTPRequest $request) {
        $this->page->addVar('test', "test de data");
        $this->page->addVar('manager', $this->managers->getManagerOf('Accueil')->test());
    }
}
