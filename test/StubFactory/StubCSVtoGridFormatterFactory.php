<?php
namespace test\StubFactory;
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/22/2017
 * Time: 9:05 PM
 */
class StubCSVtoGridFormatterFactory extends \PHPUnit\Framework\TestCase
{
    public function createStub()
    {
        $stubCSVtoGridFormatter = $this->getMockBuilder(\CsvKendoInterpreter\Writer\Formatter\FormatterInterface::class)
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();


        $stubCSVtoGridFormatter->method('interpret')
            ->will($this->returnCallback([$this, 'stubInterpret']));

        return $stubCSVtoGridFormatter;
    }

    public function stubInterpret()
    {
        $value = func_get_args()[0];

        if ($value == null) {
            return null;
        }

        return
"
{
    field: \"$value\",
    title: \"$value\",
    width: 150
},";
    }

}