<?php

/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/22/2017
 * Time: 8:51 PM
 */
class CSVtoJSONFormatterTest extends \PHPUnit\Framework\TestCase
{
    private $interpreterFormatter;

    public function setup()
    {
        $this->interpreterFormatter = new InterpreterFormatter();
    }
}