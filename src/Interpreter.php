<?php
namespace CsvKendoInterpreter;


use CsvKendoInterpreter\Reader\CSVReader;
use CsvKendoInterpreter\Writer\KendoWriter;

class Interpreter
{
    /**
     * @var CSVReader
     */
    private $reader;
    /**
     * @var KendoWriter
     */
    private $writer;
    /**
     * @var string
     */
    private $location;

    /**
     * Interpreter constructor.
     * @param CSVReader $reader
     * @param KendoWriter $writer
     * @param string $location
     */
    public function __construct(CSVReader $reader, KendoWriter $writer, $location)
    {
        $this->reader = $reader;
        $this->writer = $writer;
        $this->location = $location;
    }


    public function createKendoCompliantArray()
    {
        $array = $this->reader->parse($this->location);
        $this->writer->write($array, $this->location);
    }
}