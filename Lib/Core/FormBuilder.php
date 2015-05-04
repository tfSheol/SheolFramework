<?php
/**
 * FormBuilder.php made by Sheol
 * 28/04/2015 - 15:10
 */

namespace Core;

abstract class FormBuilder {
    protected $_form;

    public function __construct(Entity $entity) {
        $this->setForm(new Form($entity));
    }

    abstract public function build();

    public function setForm(Form $form) {
        $this->_form = $form;
    }

    public function getForm() {
        return $this->_form;
    }
}
