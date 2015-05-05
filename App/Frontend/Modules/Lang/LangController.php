<?php
/**
 * LangController.php made by Sheol
 * 05/05/2015 - 14:30
 */

namespace App\Frontend\Modules\Lang;

use Core\BackController;
use Core\HTTPRequest;

class LangController extends BackController {
    public function executeChange(HTTPRequest $request) {
        $_SESSION['local'] = $request->getData('local');
        $this->_app->getHttpResponse()->redirect('/');
    }
}
