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
        $this->page->addVar("hello", "Hello World");
        $this->page->addVar("title", "Hello World page");
    }

    public function executeHello(HTTPRequest $request) {
        $this->page->addVar("title", "Get test page");
        $this->page->addVar("id", $request->getData('id'));
        $this->page->addVar("config", $this->app->config()->get("title_bis"));
        $this->page->addVar("test", $this->app->config()->get("host"));
    }
}
