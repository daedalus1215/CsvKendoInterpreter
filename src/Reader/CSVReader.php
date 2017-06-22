<?php
namespace CsvKendoInterpreter;

/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/21/2017
 * Time: 9:09 PM
 */
class CSVReader
{
    /**
     * @var array $properties
     */
    private $properties;

    /**
     * @param string $csvFile: "theFile.csv"
     */
    public function parse($csvFile)
    {
        $row = 1;
        if (($handle = fopen($csvFile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                echo "<p> $num fields in line $row: <br /></p>\n";
                $row++;
                for ($c=0; $c < $num; $c++) {
                    $this->properties[] = $data[$c];
                }
            }
            fclose($handle);
        }
    }
}