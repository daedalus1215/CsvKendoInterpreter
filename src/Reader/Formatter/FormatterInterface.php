<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/22/2017
 * Time: 9:42 PM
 */

namespace CsvKendoInterpreter\Reader\Formatter;


interface FormatterInterface
{
    public function interpret($data);
}