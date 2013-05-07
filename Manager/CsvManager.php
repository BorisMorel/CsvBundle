<?php

namespace IMAG\CsvBundle\Manager;

use IMAG\CsvBundle\Model\RowsCollection,
    IMAG\CsvBundle\Model\Row
    ;

class CsvManager
{
    private $rowsCollection;

    public function __construct()
    {
        $this->rowsCollection = new RowsCollection();
    }

    public function createRow()
    {
        return new Row();
    }

    public function addRow(Row $row)
    {
        $this->rowCollection->addRow($row);

        return $this;
    }

    public function addIndexedRow($index, Row $row)
    {
        $this->rowCollection->addIndexedRow($index, $row);

        return $this;
    }
}