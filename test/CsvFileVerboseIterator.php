<?php
namespace Wamania\Snowball\Tests;

class CsvFileVerboseIterator extends CsvFileIterator
{
    public function rewind(): void
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
            $this->key = (int) $value[0];
        } elseif (sizeof($this->current)) {
            $this->key = (int) $this->current[0];
        }
    }
}
