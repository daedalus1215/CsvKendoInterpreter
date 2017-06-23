<?php
namespace CsvKendoInterpreter\Reader;
use CsvKendoInterpreter\Reader\Formatter\FormatterInterface;

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
     * @var FormatterInterface
     */
    private $readerFormatter;

    /**
     * CSVReader constructor.
     * @param FormatterInterface $readerFormatter
     */
    public function __construct(FormatterInterface $readerFormatter)
    {
        $this->readerFormatter = $readerFormatter;
    }

    /**
     * @param string $csvFile: "theFile.csv"
     */
    public function parse($csvFile)
    {
        try {
            if (($handle = fopen($csvFile, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, null, ",")) !== FALSE) {
                    $this->properties = $this->readerFormatter->interpret($data);
                }
                fclose($handle);
            }
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("Did not insert a file. " . $e->getMessage());
        }


        return $this->properties;
    }
}