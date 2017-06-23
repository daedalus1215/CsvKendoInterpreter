<?php
namespace CsvKendoInterpreter\Writer;


use CsvKendoInterpreter\Writer\Formatter\FormatterInterface;


class KendoWriter
{
    private $properties;

    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * KendoWriter constructor.
     * @param FormatterInterface $formatter
     */
    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @param array $properties: the array of properties we are writing to a file
     * @param string $location: the location the new file will be created/written to.
     */
    public function write(array $properties, $location)
    {
        try {
            if (($myfile  = fopen($location, "w")) !== FALSE) {
                foreach ($properties as $columnName) {
                    $newPropertyStanza = $this->formatter->interpret($columnName);

                    $this->properties[] = $newPropertyStanza;

                    fwrite($myfile, $newPropertyStanza);
                }

                fclose($myfile);
            }
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("Did not insert a file. " . $e->getMessage());
        }

        return $this->properties;
    }
}