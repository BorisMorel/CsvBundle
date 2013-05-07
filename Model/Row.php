<?php

namespace IMAG\CsvBundle\Model;

class Row
{
    private $row;

    public function setFields(array $fields)
    {
        $this->row = $fields;

        return $this;
    }

    public function addField($field)
    {
        $this->row[] = $field

        return $this;
    }

    public function addIndexedField($index, $field)
    {
        $this->row[$index] = $field;

        return $this;
    }

    public function getFields()
    {
        return $this->row;
    }

    public function getField($index)
    {
        return $this->row[$index];
    }
}