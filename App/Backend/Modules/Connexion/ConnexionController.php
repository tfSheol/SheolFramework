<?php
/**
 * ConnexionController.php made by Sheol
 * 05/05/2015 - 10:22
 */

namespace App\Backend\Modules\Connexion;

use Core\BackController;
use Core\HTTPRequest;

class ConnexionController extends BackController {
    public function executeIndex(HTTPRequest $request) {
        $this->_page->addVar('title', 'Connexion');
        if ($request->postExists('login')) {
            $login = $request->postData('login');
            $password = $request->postData('password');
            if ($login == $this->_app->getConfig()->get('login') && $password == $this->_app->getConfig()->get('pass')) {
                $this->_app->getUser()->setAuthenticated(true);
                $this->_app->getHttpResponse()->redirect('.');
            } else {
                $this->_app->getUser()->setFlash('Le pseudo ou le mot de passe est incorrect.');
            }
        }
    }

    public function executeLogout(HTTPRequest $request) {
        $this->_app->getUser()->setAuthenticated(false);
        $this->_app->getHttpResponse()->redirect('/');
    }
}
