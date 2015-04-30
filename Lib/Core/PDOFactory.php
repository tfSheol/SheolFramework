<?php
/**
 * PDOFactory.php made by Sheol
 * 28/04/2015 - 13:05
 */

namespace Core;

class PDOFactory extends Config {
    private $_nameApp;

    public function __construct($name) {
        $this->_nameApp = $name;
    }

    public function getMysqlConnexion() {
        try {
            $db = new \PDO('mysql:host='.$this->get("host", $this->_nameApp).
                            ';dbname='.$this->get("db_name", $this->_nameApp),
                            $this->get("username", $this->_nameApp),
                            $this->get("password", $this->_nameApp));
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (\PDOException $e) {
            if ($this->get("debug", $this->_nameApp) == "true") {
                echo "<pre>PDOFactory : ".$e."</pre>";
            }
            return null;
        }
    }
}
