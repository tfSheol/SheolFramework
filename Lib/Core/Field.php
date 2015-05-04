<?php
/**
 * Field.php made by Sheol
 * 28/04/2015 - 14:58
 */

namespace Core;

abstract class Field {
    use Hydrator;

    protected $_errorMessage;
    protected $_label;
    protected $_name;
    protected $_validators = array();
    protected $_value;
    protected $_length;

    public function __construct(array $options = array()) {
        if (!empty($options)) {
            $this->hydrate($options);
        }
    }

    abstract public function buildWidget();

    public function isValid() {
        foreach ($this->_validators as $validator) {
            if (!$validator->isValid($this->_value)) {
                $this->_errorMessage = $validator->errorMessage();
                return false;
            }
        }
        return true;
    }

    public function getLabel() {
        return $this->_label;
    }

    public function getLength() {
        return $this->_length;
    }

    public function getName() {
        return $this->_name;
    }

    public function getValidators() {
        return $this->_validators;
    }

    public function getValue() {
        return $this->_value;
    }

    public function setLabel($label) {
        if (is_string($label)) {
            $this->_label = $label;
        }
    }

    public function setLength($length) {
        $length = (int) $length;
        if ($length > 0) {
            $this->_length = $length;
        }
    }

    public function setName($name) {
        if (is_string($name)) {
            $this->_name = $name;
        }
    }

    public function setValidators(array $validators) {
        foreach ($validators as $validator) {
            if ($validator instanceof Validator && !in_array($validator, $this->_validators)) {
                $this->_validators[] = $validator;
            }
        }
    }

    public function setValue($value) {
        if (is_string($value)) {
            $this->_value = $value;
        }
    }
}
