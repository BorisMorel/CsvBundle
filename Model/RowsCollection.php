<?php

namespace IMAG\CsvBundle\Model;

class RowsCollection extends \Iterator
{
    private $rows;

    private $iteratorIndex;

    public function __construct(array $array=array())
    {
        foreach ($array as $key => $item) {
            $this->addIndexexRow[$key, $item];
        }
    }

    public function addRow(Row $row)
    {
        $this->rows[] = $row;

        return $this;
    }

    public function addIndexexRow($index, $row)
    {
        $this->rows[$index] = $row;

        return $this;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function getRow($index)
    {
        return $this->rows[$index];
    }
    
    /**
     * inherit
     */
    public function current()
    {
        return $this->rows[$this->iteratorIndex];
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
        return isset($this->current());
    }
}