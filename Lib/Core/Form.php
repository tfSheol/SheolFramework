<?php
/**
 * Form.php made by Sheol
 * 28/04/2015 - 14:55
 */

namespace Core;

class Form {
    protected $_entity;
    protected $_fields = array();

    public function __construct(Entity $entity) {
        $this->setEntity($entity);
    }

    public function add(Field $field) {
        $attr = $field->getName();
        $field->setValue($this->_entity->$attr());
        $this->_fields[] = $field;
        return $this;
    }

    public function createView(){
        $view = '';
        foreach ($this->_fields as $field) {
            $view .= $field->buildWidget().'<br />';
        }
        return $view;
    }

    public function isValid() {
        $valid = true;
        foreach ($this->_fields as $field) {
            if (!$field->isValid()) {
                $valid = false;
            }
        }
        return $valid;
    }

    public function getEntity() {
        return $this->_entity;
    }

    public function setEntity(Entity $entity) {
        $this->_entity = $entity;
    }
}
