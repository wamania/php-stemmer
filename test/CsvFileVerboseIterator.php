<?php
namespace Wamania\Snowball\Tests;

class CsvFileVerboseIterator extends CsvFileIterator
{
    public function rewind()
    {
        parent::rewind();
        $this->_updateKey($this->current());
    }

    public function next()
    {
        parent::next();
        if ($this->valid()) {
            $this->_updateKey($this->current());
        }
    }

    protected function _updateKey($value)
    {
        if ($value && sizeof($value)) {
            $this->key = $value[0];
        } elseif (sizeof($this->current)) {
            $this->key = $this->current[0];
        }
    }
}
