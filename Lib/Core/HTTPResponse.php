<?php
/**
 * HTTPResponse.php made by Sheol
 * 28/04/2015 - 12:12
 */

namespace Core;

class HTTPResponse {
    protected $_page;
    protected $_app;

    public function __construct(Application $app) {
        $this->_app = $app;
    }

    public function addHeader($header) {
        header($header);
    }

    public function redirect($location) {
        header('Location: '.$location);
        exit;
    }

    public function redirect404() {
        $this->_page = new Page($this->_app);
        $this->_page->setContentFile(__DIR__.'/../../Errors/404.php');
        $this->addHeader('HTTP/1.0 404 Not Found');
        $this->send();
    }

    public function send() {
        exit($this->_page->getGeneratedPage());
    }

    public function setPage(Page $page) {
        $this->_page = $page;
    }

    public function setCookie($name, $value = '', $expire = 0, $path = null,
                              $domain = null, $secure = false, $httpOnly = true) {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }
}
