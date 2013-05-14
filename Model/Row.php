<?php

namespace IMAG\CsvBundle\Model;

class Row implements \Iterator, \ArrayAccess
{
    private $fields;

    private $iteratorIndex;

    public function setFields(array $fields)
    {
        $this->fields = $fields;

        return $this;
    }

    public function addField($field)
    {
        $this->fields[] = $field;

        return $this;
    }

    public function addIndexedField($index, $field)
    {
        $this->fields[$index] = $field;

        return $this;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getField($index)
    {
        return $this->fields[$index];
    }

    /**
     * inherit
     */
    public function current()
    {
        return $this->fields[$this->iteratorIndex];
    }

    /**
     * inherit
     */
    public function key()
    {
        return $this->iteratorIndex;
    }

    /**
     * inherit
     */
    public function next()
    {
        ++$this->iteratorIndex;
    }

    /**
     * inherit
     */
    public function rewind()
    {
        $this->iteratorIndex = 0;
    }

    /**
     * inherit
     */
    public function valid()
    {
        return array_key_exists($this->iteratorIndex, $this->fields);
    }

    /**
     * inherit
     */
    public function offsetSet($offset, $value)
    {
        $this->fields[$offset] = $value;
    }

    /**
     * inherit
     */
    public function offsetGet($offset)
    {
        return $this->fields[$offset];
    }

    /**
     * inherit
     */
    public function offsetExists($offset)
    {
        return isset($this->fields[$offset]);
    }

    /**
     * inherit
     */
    public function offsetUnset($offset)
    {
        unset($this->fields[$offset]);
    }
}