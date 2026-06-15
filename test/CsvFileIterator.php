<?php
namespace Wamania\Snowball\Tests;

class CsvFileIterator implements \Iterator
{
    protected $file;
    protected $key = 0;
    protected $current;

    public function __construct($file)
    {
        if (! ($this->file = fopen($file, 'r'))) {
            die('Can\'t open file '.$this->file);
        }
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    #[\ReturnTypeWillChange]
    public function rewind(): void
    {
        rewind($this->file);
        //$this->current = fgetcsv($this->file, null, "\t");
        $line = fgets($this->file);
        $current = explode(' ', $line);
        $current = array_filter($current);
        $current = array_values($current);
        $current = array_map('trim', $current);
        $this->current = $current;
        $this->key = 0;
    }

    #[\ReturnTypeWillChange]
    public function valid()
    {
        return !feof($this->file);
    }

    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->key;
    }

    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->current;
    }

    #[\ReturnTypeWillChange]
    public function next(): void
    {
        $line = fgets($this->file);
        $current = explode(' ', $line);
        $current = array_filter($current);
        $current = array_values($current);
        $current = array_map('trim', $current);
        $this->current = $current;
        $this->key++;
    }
}
