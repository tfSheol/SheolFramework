<?php
/**
 * MaxLengthValidator.php made by Sheol
 * 28/04/2015 - 15:05
 */

namespace Core;

class MaxLengthValidator extends Validator {
    protected $_maxLength;

    public function __construct($errorMessage, $maxLength) {
        parent::__construct($errorMessage);
        $this->setMaxLength($maxLength);
    }

    public function isValid($value) {
        return strlen($value) <= $this->_maxLength;
    }

    public function setMaxLength($maxLength){
        $maxLength = (int) $maxLength;
        if ($maxLength > 0) {
            $this->_maxLength = $maxLength;
        } else {
            throw new \RuntimeException('The maximum length must be a number greater than 0.');
        }
    }
}
