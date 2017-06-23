<?php
namespace test\StubFactory\Reader\Formatter;


use CsvKendoInterpreter\Reader\Formatter\FormatterInterface;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/22/2017
 * Time: 9:50 PM
 */
class StubSingleRowFormatterFactory extends TestCase
{
    public function createStub()
    {
        $stubSingleRowFormatter = $this->getMockBuilder(FormatterInterface::class)
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();


        $stubSingleRowFormatter->method('interpret')
        ->will($this->returnCallback([$this, 'stubInterpret']));

        return $stubSingleRowFormatter;
    }

    public function stubInterpret()
    {
        $array = func_get_args()[0];

        return $array;
    }
}