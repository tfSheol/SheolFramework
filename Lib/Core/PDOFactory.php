<?php
/**
 * PDOFactory.php made by Sheol
 * 28/04/2015 - 13:05
 */

namespace Core;

/**
 * TODO
 * *.ini for mysql connect data !
 */

class PDOFactory {
    public static function getMysqlConnexion() {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=news', 'root', '');
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (\PDOException $e) {
            return null;
        }
    }
}
