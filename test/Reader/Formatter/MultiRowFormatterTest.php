<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/28/2017
 * Time: 1:49 PM
 */
use CsvKendoInterpreter\Reader\CSVReader;
use CsvKendoInterpreter\Reader\Formatter\MultiRowFormatter;


class MultiRowFormatterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var MultiRowFormatter
     */
    private $multiRowFormatter;

    /**
     * @var CSVReader
     */
    private $CSVReader;

    private $expectedReturnedArray = array (
        'YUP' => 'YUP_ID',
        'SNAP' => 'SNAP_ID'
    );

    public function setup()
    {

        $this->multiRowFormatter = new MultiRowFormatter();
        $this->CSVReader = new CSVReader($this->multiRowFormatter);

    }

    public function testInterpretEquals()
    {
        $data = $this->CSVReader->parse(__DIR__ . '/file.csv');

        $this->assertArraySubset($data, $this->expectedReturnedArray);
    }


    public function testInterpretNotEquals()
    {

    }
}


