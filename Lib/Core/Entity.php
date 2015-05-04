<?php
/**
 * Entity.php made by Sheol
 * 28/04/2015 - 13:07
 */

namespace Core;

abstract class Entity implements \ArrayAccess {
    use Hydrator;

    protected $_errors = array();
    protected $_id;

    public function __construct(array $data = []) {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    public function isNew() {
        return empty($this->_id);
    }

    public function getErrors() {
        return $this->_errors;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = (int) $id;
    }

    public function offsetGet($var) {
        if (isset($this->$var) && is_callable([$this, $var])) {
            return $this->$var();
        }
    }

    public function offsetSet($var, $value) {
        $method = 'set'.ucfirst($var);
        if (isset($this->$var) && is_callable([$this, $method])) {
            $this->$method($value);
        }
    }

    public function offsetExists($var) {
        return isset($this->$var) && is_callable([$this, $var]);
    }

    public function offsetUnset($var) {
        throw new \Exception('Can not remove any value.');
    }
}
