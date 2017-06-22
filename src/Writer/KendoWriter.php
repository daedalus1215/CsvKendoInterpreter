<?php
namespace CsvKendoInterpreter\Writer;


class KendoWriter
{
    private $properties;

    /**
     * @param array $properties: the array of properties we are writing to a file
     * @param string $location: the location the new file will be created/written to.
     */
    public function write(array $properties, $location)
    {
        try {
            if (($myfile  = fopen($location, "w")) !== FALSE) {
                foreach ($properties as $columnName) {
                    $newPropertyStanza =
"
{
    field: \"$columnName\",
    title: \"$columnName\",
    width: 150
},";
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