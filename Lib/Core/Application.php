<?php
/**
 * Application.php made by Sheol
 * 28/04/2015 - 12:31
 */

namespace Core;

abstract class Application {
    protected $_httpRequest;
    protected $_httpResponse;
    protected $_user;
    protected $_config;
    protected $_name;
    protected $_lang;

    public function __construct() {
        $this->_httpRequest = new HTTPRequest($this);
        $this->_httpResponse = new HTTPResponse($this);
        $this->_user = new User($this);
        $this->_config = new Config($this);
        $this->_lang = new Lang($this);
        $this->_name = '';
    }

    public function getController() {
        $router = new Router;
        $xml = new \DOMDocument;
        $xml->load(__DIR__.'/../../App/'.$this->_name.'/Config/routes.xml');
        $routes = $xml->getElementsByTagName('route');
        $matchedRoute = null;
        foreach ($routes as $route) {
            $vars = array();
            if ($route->hasAttribute('vars')) {
                $vars = explode(',', $route->getAttribute('vars'));
            }
            $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
        }
        try {
            $matchedRoute = $router->getRoute($this->_httpRequest->requestURI());
        } catch (\RuntimeException $e) {
            if ($e->getCode() == Router::NO_ROUTE) {
                $this->_httpResponse->redirect404();
            }
        }
        $_GET = array_merge($_GET, $matchedRoute->getVars());
        $controllerClass = 'App\\'.$this->_name.'\\Modules\\'.$matchedRoute->getModule().'\\'.$matchedRoute->getModule().'Controller';
        return new $controllerClass($this, $matchedRoute->getModule(), $matchedRoute->getAction());
    }

    abstract public function run();

    public function getHttpRequest() {
        return $this->_httpRequest;
    }

    public function getHttpResponse() {
        return $this->_httpResponse;
    }

    public function getName() {
        return $this->_name;
    }

    public function getUser() {
        return $this->_user;
    }

    public function getConfig() {
        return $this->_config;
    }

    public function getLang() {
        return $this->_lang;
    }
}
