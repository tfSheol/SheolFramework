<?php
/**
 * HTTPRequest.php made by Sheol
 * 28/04/2015 - 11:49
 */

namespace Core;

class HTTPRequest {
    public function cookieData($key) {
        if (isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
        return null;
    }

    public function cookieExists($key) {
        return isset($_COOKIE[$key]);
    }

    public function getData($key) {
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }
        return null;
    }

    public function getExists($key) {
        return isset($_GET[$key]);
    }

    public function postData($key) {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
        return null;
    }

    public function postExists($key) {
        return isset($_POST[$key]);
    }

    public function envData($key) {
        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }
        return null;
    }

    public function envExists($key) {
        return isset($_ENV[$key]);
    }

    public function serverData($key) {
        if (isset($_SERVER[$key])) {
            return $_SERVER[$key];
        }
        return null;
    }

    public function serverExists($key) {
        return isset($_SERVER[$key]);
    }

    public function filesData($key) {
        if (isset($_FILES[$key])) {
            return $_FILES[$key];
        }
        return null;
    }

    public function filesExists($key) {
        return isset($_FILES[$key]);
    }

    public function requestData($key) {
        if (isset($_REQUEST)) {
            return $_REQUEST[$key];
        }
        return null;
    }

    public function requestExists($key) {
        return isset($_REQUEST[$key]);
    }

    public function sessionData($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }

    public function sessionExists($key) {
        return isset($_SESSION[$key]);
    }

    public function method() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function requestURI() {
        return $_SERVER['REQUEST_URI'];
    }

    public function queryString() {
        if (isset($_SERVER["QUERY_STRING"])) {
            return $_SERVER["QUERY_STRING"];
        }
        return null;
    }
}
