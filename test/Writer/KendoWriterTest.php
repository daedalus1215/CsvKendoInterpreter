<?php

use CsvKendoInterpreter\Writer\KendoWriter;
use PHPUnit\Framework\TestCase;
use test\StubFactory\StubCSVtoGridFormatterFactory;

class KendoWriterTest extends TestCase
{
    /**
     * @var KendoWriter
     */
    private $kendoWriter;


    public function setup()
    {
        $stubWriterFormatter = (new StubCSVtoGridFormatterFactory())->createStub();
        $this->kendoWriter = new KendoWriter($stubWriterFormatter);
    }

    public function testWrite()
    {
        $array = [
            "HCSGNumber",
            "PatientFirstName",
            "PatientLastName"
        ];

        $kendoGridCompliantProperties = $this->kendoWriter->write($array, __DIR__. "\\we.txt");


        $expectedHCSGNumberFormat = "
{
    field: \"HCSGNumber\",
    title: \"HCSGNumber\",
    width: 150
},";
        $expectedPatientFirstNameFormat = "
{
    field: \"PatientFirstName\",
    title: \"PatientFirstName\",
    width: 150
},";
        $expectedPatientLastNameFormat = "
{
    field: \"PatientLastName\",
    title: \"PatientLastName\",
    width: 150
},";

        $this->assertEquals($expectedHCSGNumberFormat, $kendoGridCompliantProperties[0]);
        $this->assertEquals($expectedPatientFirstNameFormat, $kendoGridCompliantProperties[1]);
        $this->assertEquals($expectedPatientLastNameFormat, $kendoGridCompliantProperties[2]);
    }


    public function testWriteNoFileException()
    {
        $array = [
            "HCSGNumber",
            "PatientFirstName",
            "PatientLastName"
        ];

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Did not insert a file. fopen(): Filename cannot be empty");
        $this->kendoWriter->write($array, null);
    }

    public function testWriteNoArrayNull()
    {

        $n = $this->kendoWriter->write([], __DIR__. "\\we.txt");
        $this->assertNull($n);
    }
}