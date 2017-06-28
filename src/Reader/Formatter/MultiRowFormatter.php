<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/28/2017
 * Time: 1:30 PM
 */

namespace CsvKendoInterpreter\Reader\Formatter;


class MultiRowFormatter implements FormatterInterface
{
    private $entries = [];

    public function interpret($data)
    {
        if ($data === null) {
            return null;
        }

        $this->entries[$data[0]] = $data[1];

        return  $this->entries;
    }
}