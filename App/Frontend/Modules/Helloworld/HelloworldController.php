<?php
/**
 * HelloworldController.php made by Sheol
 * 29/04/2015 - 10:08
 */

namespace App\Frontend\Modules\Helloworld;

use Core\BackController;
use Core\HTTPRequest;

class HelloworldController extends BackController {
    public function executeIndex(HTTPRequest $request) {
        $this->_page->addVar("hello", "Hello World");
        $this->_page->addVar("title", "Hello World page");
    }

    public function executeHello(HTTPRequest $request) {
        $this->_page->addVar("title", "Get test page");
        $this->_page->addVar("id", $request->getData('id'));
        $this->_page->addVar("test2", $request->getData('test2'));
        $this->_page->addVar("config", $this->_app->getConfig()->get("title_bis"));
        $this->_page->addVar("test", $this->_app->getConfig()->get("host"));
    }
}
