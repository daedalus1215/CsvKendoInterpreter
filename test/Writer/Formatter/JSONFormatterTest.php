<?php
use CsvKendoInterpreter\Writer\Formatter\JSONFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/22/2017
 * Time: 9:31 PM
 */
class JSONFormatterTest extends TestCase
{
    /**
     * @var JSONFormatter
     */
    private $jsonFormatter;

    public function setup()
    {
        $this->jsonFormatter = new JSONFormatter();
    }



    public function testInterpretEquals()
    {
        $array = ["CM_DEMOGRAPHIC" => 1000];
        $returnedArray = $this->jsonFormatter->interpret($array);
        $this->assertEquals("CM_DEMOGRAPHIC : '1000'", $returnedArray);
    }

    public function testInterpretNull()
    {
        $returnedArray = $this->jsonFormatter->interpret(null);
        $this->assertNull($returnedArray);
    }

}