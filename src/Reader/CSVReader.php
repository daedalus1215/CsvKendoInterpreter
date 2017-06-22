<?php
namespace CsvKendoInterpreter\Reader;

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
        try {
            if (($handle = fopen($csvFile, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    foreach ($data as $columnName) {
                        $this->properties[] = $columnName;
                    }
                }
                fclose($handle);
            }
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("Did not insert a file. " . $e->getMessage());
        }


        return $this->properties;
    }
}