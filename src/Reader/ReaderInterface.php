<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/28/2017
 * Time: 2:43 PM
 */
namespace CsvKendoInterpreter\Reader;


/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/21/2017
 * Time: 9:09 PM
 */
interface ReaderInterface
{
    /**
     * @param string $csvFile : "theFile.csv"
     */
    public function parse($csvFile);
}