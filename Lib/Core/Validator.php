<?php
/**
 * Validator.php made by Sheol
 * 28/04/2015 - 15:04
 */

namespace Core;

abstract class Validator {
    protected $errorMessage;

    public function __construct($errorMessage) {
        $this->setErrorMessage($errorMessage);
    }

    abstract public function isValid($value);

    public function setErrorMessage($errorMessage) {
        if (is_string($errorMessage)) {
            $this->errorMessage = $errorMessage;
        }
    }

    public function errorMessage() {
        return $this->errorMessage;
    }
}
