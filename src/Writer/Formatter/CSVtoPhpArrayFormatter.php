<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/28/2017
 * Time: 1:27 PM
 */

namespace CsvKendoInterpreter\Writer\Formatter;

//@todo: taken from CSVtoGridColumnFormatter.php - will refactor when we are there.
class CSVtoPhpArrayFormatter implements FormatterInterface
{
    public function interpret($columnName)
    {
        return
            "
{
    field: \"$columnName\",
    title: \"$columnName\",
    width: 150
},";
    }
}