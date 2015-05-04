<?php
/**
 * TextField.php made by Sheol
 * 28/04/2015 - 15:01
 */

namespace Core;

class TexField extends Field {
    protected $_cols;
    protected $_rows;

    public function buildWidget() {
        $widget = '';
        if (!empty($this->_errorMessage)) {
            $widget .= $this->_errorMessage.'<br />';
        }
        $widget .= '<label>'.$this->_label.'</label><textarea name="'.$this->_name.'"';
        if (!empty($this->_cols)) {
            $widget .= ' cols="'.$this->_cols.'"';
        }
        if (!empty($this->_rows)) {
            $widget .= ' rows="'.$this->_rows.'"';
        }
        $widget .= '>';
        if (!empty($this->_value)) {
            $widget .= htmlspecialchars($this->_value);
        }
        return $widget.'</textarea>';
    }

    public function setCols($cols) {
        $cols = (int) $cols;
        if ($cols > 0) {
            $this->_cols = $cols;
        }
    }

    public function setRows($rows) {
        $rows = (int) $rows;
        if ($rows > 0) {
            $this->_rows = $rows;
        }
    }
}
