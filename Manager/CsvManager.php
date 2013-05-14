<?php

namespace IMAG\CsvBundle\Manager;

use IMAG\CsvBundle\Model\RowsCollection,
    IMAG\CsvBundle\Model\Row
    ;

class CsvManager
{
    private $rowsCollection;

    public function __construct(\IMAG\CsvBundle\Provider\CsvProvider $provider)
    {
        $this->rowsCollection = new RowsCollection();
        $this->provider = $provider;
    }

    public function createRow()
    {
        return new Row();
    }

    public function addRow(Row $row)
    {
        $this->rowsCollection->addRow($row);

        return $this;
    }

    public function addIndexedRow($index, Row $row)
    {
        $this->rowsCollection->addIndexedRow($index, $row);

        return $this;
    }

    public function setDelimiter($delimiter)
    {
        $this->provider->setDelimiter($delimiter);

        return $this;
    }

    public function setEnclosure($enclosure)
    {
        $this->provider->setEnclosure($enclosure);

        return $this;
    }

    public function setFilename($filename)
    {
        $this->provider->setFilename($filename);

        return $this;
    }

    public function getDelimiter()
    {
        return $this->provider->getDelimiter();
    }

    public function getEnclosure()
    {
        return $this->provider->getEnclosure();
    }

    public function getFilename()
    {
        return $this->provider->getFilename();
    }

    public function write()
    {
        $this->provider
            ->setData($this->rowsCollection)
            ->compile();
    }
}