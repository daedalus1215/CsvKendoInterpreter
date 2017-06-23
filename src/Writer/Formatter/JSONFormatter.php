<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/22/2017
 * Time: 8:55 PM
 */

namespace CsvKendoInterpreter\Writer\Formatter;


class JSONFormatter implements FormatterInterface
{
    public function interpret($valueToInterpret)
    {
        if (empty($valueToInterpret)) {
            return null;
        }

        foreach ($valueToInterpret as $key => $value) {
            return $key . " : " . "'".$value."'";
        }
    }
}