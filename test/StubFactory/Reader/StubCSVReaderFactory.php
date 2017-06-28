<?php
namespace test\StubFactory\Reader;


use CsvKendoInterpreter\Reader\ReaderInterface;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/28/2017
 * Time: 2:40 PM
 */
class StubCSVReaderFactory extends TestCase
{
    private $formatterInterfaceSetup;

    public function createStub($formatterInterface)
    {

        $this->formatterInterfaceSetup = $formatterInterface;

        $stubCSVReader = $this->getMockBuilder(ReaderInterface::class)
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();


        $stubCSVReader->method('parse')
            ->will($this->returnCallback([$this, 'stubParse']));

        return $stubCSVReader;
    }
}