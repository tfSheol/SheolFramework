<?php
/**
 * StringField.php made by Sheol
 * 28/04/2015 - 15:00
 */

namespace Core;

class StringField extends Field {
    protected $_maxLength;

    public function buildWidget() {
        $widget = '';
        if (!empty($this->errorMessage)) {
            $widget .= $this->errorMessage.'<br />';
        }
        $widget .= '<label>'.$this->label.'</label><input type="text" name="'.$this->name.'"';
        if (!empty($this->value)) {
            $widget .= ' value="'.htmlspecialchars($this->value).'"';
        }
        if (!empty($this->maxLength)){
            $widget .= ' maxlength="'.$this->maxLength.'"';
        }
        return $widget .= ' />';
    }

    public function setMaxLength($maxLength)
    {
        $maxLength = (int) $maxLength;
        if ($maxLength > 0) {
            $this->maxLength = $maxLength;
        } else {
            throw new \RuntimeException('The maximum length must be a number greater than 0.');
        }
    }
}
