<?php
/**
 * Validator.php made by Sheol
 * 28/04/2015 - 15:04
 */

namespace Core;

abstract class Validator {
    protected $_errorMessage;

    public function __construct($errorMessage) {
        $this->setErrorMessage($errorMessage);
    }

    abstract public function isValid($value);

    public function setErrorMessage($errorMessage) {
        if (is_string($errorMessage)) {
            $this->_errorMessage = $errorMessage;
        }
    }

    public function errorMessage() {
        return $this->_errorMessage;
    }
}
