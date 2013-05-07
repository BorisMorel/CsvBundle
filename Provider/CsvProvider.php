<?php

namespace IMAG\CsvBundle\Provider;

use IMAG\CsvBundle\Model\RowsCollection;

use IMAG\CsvBundle\Errors\FileError;

class CsvProvider
{
    private
        $handle,
        $rowsCollection,
        $filename,
        $delimiter,
        $enclosure
        ;

    public function __construct()
    {
        $this->delimiter = ',';
        $this->enclosure = '"';
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    public function setEnclosure($enclosure)
    {
        $this->enclosure = $enclosure;

        return $this;
    }

    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;

        return $this;
    }

    public function setData(RowsCollection $rowsCollection)
    {
        $this->rowsCollection = $rowsCollection;
        
        return $this;
    }
    
    public function getFilename()
    {
        return $this->filename;
    }

    public function getEnclosure()
    {
        return $this->enclosure;
    }

    public function getDelimiter()
    {
        return $this->delimiter;
    }

    public function getData()
    {
        return $this->rowsCollection;
    }

    public function compile()
    {
        if (null === $this->filename) {
            throw new \InvalidArgumentException(FileError::NOT_PROVIDED);
        }

        $handle = @fopen($this->filename, 'x');

        if (false === $handle) {
            throw new \InvalidArgumentException(FileError::EXISTS_OR_NOT_READABLE);
        }

        $int = fputcsv($handle, $this->rowsCollection, $this->delimiter, $this->enclosure);

        if (false === $int) {
            throw new \RuntimeException("Csv can't be created");
        }

        return true;
    }
}