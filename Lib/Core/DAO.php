<?php
/**
 * DAO.php made by Sheol
 * 04/05/2015 - 14:19
 */

namespace Core;

class DAO {
    public function prepare($string = null) {
        return new DAOPrepare();
    }
}
