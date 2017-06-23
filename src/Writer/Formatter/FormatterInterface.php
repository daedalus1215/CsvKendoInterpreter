<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/22/2017
 * Time: 8:57 PM
 */

namespace CsvKendoInterpreter\Writer\Formatter;


interface FormatterInterface
{
    public function interpret($valueToInterpret);
}