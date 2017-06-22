<?php
use CsvKendoInterpreter\Reader\CSVReader;

use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/21/2017
 * Time: 9:14 PM
 */
class CSVReaderTest extends TestCase
{
    /**
     * @var CSVReader
     */
    private $CSVReader;

    public function setup()
    {
        $this->CSVReader = new CSVReader();
    }

    public function testParseEquals()
    {
        $arrayOfColumns = $this->CSVReader->parse(__DIR__."\\file.csv");
        $this->assertEquals("HCSGCaseNumber", $arrayOfColumns[0]);
    }

    public function testParseException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Did not insert a file. fopen(file.csv): failed to open stream: No such file or directory");
        $this->CSVReader->parse("file.csv");
    }


    public function testParseNull()
    {
        $arrayOfColumns = $this->CSVReader->parse(__DIR__."\\emptyFile.csv");
        $this->assertNull($arrayOfColumns);
    }
}