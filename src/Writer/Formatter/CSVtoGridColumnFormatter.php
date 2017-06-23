<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/22/2017
 * Time: 8:58 PM
 */

namespace CsvKendoInterpreter\Writer\Formatter;


class CSVtoGridColumnFormatter
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