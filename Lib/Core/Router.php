<?php
/**
 * Router.php made by Sheol
 * 28/04/2015 - 12:44
 */

namespace Core;

class Router {
    protected $_routes = array();
    const NO_ROUTE = 1;

    public function addRoute(Route $route) {
        if (!in_array($route, $this->_routes)) {
            $this->_routes[] = $route;
        }
    }

    public function getRoute($url) {
        foreach ($this->_routes as $route) {
            if (($varsValues = $route->match($url)) !== false) {
                if ($route->hasVars()) {
                    $varsNames = $route->getVarsNames();
                    $listVars = array();
                    foreach ($varsValues as $key => $match) {
                        if ($key !== 0) {
                            $listVars[$varsNames[$key - 1]] = $match;
                        }
                    }
                    $route->setVars($listVars);
                }
                return $route;
            }
        }
        throw new \RuntimeException('Route not found!', self::NO_ROUTE);
    }
}
