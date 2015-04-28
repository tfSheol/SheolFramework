<?php
/**
 * NotNullValidator.php made by Sheol
 * 28/04/2015 - 15:05
 */

namespace Core;

class NotNullValidator extends Validator {
    public function isValid($value) {
        return $value != '';
    }
}
