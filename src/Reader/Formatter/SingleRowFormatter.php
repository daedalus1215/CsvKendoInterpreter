<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/22/2017
 * Time: 9:44 PM
 */

namespace CsvKendoInterpreter\Reader\Formatter;


class SingleRowFormatter implements FormatterInterface
{
    public function interpret($data)
    {
        return $data;
    }
}