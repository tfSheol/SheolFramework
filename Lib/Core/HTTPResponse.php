<?php
/**
 * HTTPResponse.php made by Sheol
 * 28/04/2015 - 12:12
 */

namespace Core;

class HTTPResponse {
    protected $page;
    protected $app;

    public function __construct(Application $app) {
        $this->app = $app;
    }

    public function addHeader($header) {
        header($header);
    }

    public function redirect($location) {
        header('Location: '.$location);
        exit;
    }

    public function redirect404() {
        $this->page = new Page($this->app);
        $this->page->setContentFile(__DIR__.'/../../Errors/404.html');
        $this->addHeader('HTTP/1.0 404 Not Found');
        $this->send();
    }

    public function send() {
        exit($this->page->getGeneratedPage());
    }

    public function setPage(Page $page) {
        $this->page = $page;
    }

    public function setCookie($name, $value = '', $expire = 0, $path = null,
                              $domain = null, $secure = false, $httpOnly = true) {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }
}
