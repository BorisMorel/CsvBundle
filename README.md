# CsvBundle

Manage your csv with this bundle.

## Install

1. Download CsvBundle
2. Enable the bundle

### How get the bundle

### Composer
Modify your composer.json on your project root

``` json
// {root}/composer.json

{
    [...],
    "require": {
        [...],
        "imag/csv-bundle": "dev-master"
    }
}
```

### Enable the Bundle

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
    // ...
    new IMAG\CsvBundle\IMAGCsvBundle(),
    );
}
```
## Usage

### Create a Csv

``` php
<?php

// Init the manager
$manager = $this->get('imag_csv.manager.csv');
$manager
    ->setFilename('/tmp/test.csv')
    ->setDelimiter(',')
    ->setEnclosure('"')
    ;

// Create a row on Csv
$row = $manager->createRow();
$row->addField('1')
$row->addField('2');
$manager->addRow($row);

// Write Csv
$manager->write();

```
