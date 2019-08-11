<?php
/**
 * Load .env file into $_ENV
 *
 * The .env should be located in the root of the project
 */

class Loader
{
    protected $envPath;

    public function __construct()
    {
        // Get the project root path
        $this->envPath = $_SERVER["DOCUMENT_ROOT"] . '/.env';
    }

    public function load()
    {
        // Read .env file and check for errors
        try {
            $output = file_get_contents($this->envPath);

            if ($output === false || $output == '') {
                throw new Exception();
            }
        } catch (Exception $e) {
            echo "There is an issue with the .env file";
            die();
        }

        $fileContent = explode(PHP_EOL, $output);
        // Remove empty string lines
        $fileContent = array_filter($fileContent);

        // Save the line number to help debug the warning message
        $lineNumber = 0;
        // Map key => value's to $_ENV
        foreach ($fileContent as $line) {
            $lineNumber++;

            $keyVal = explode('=', $line);
            
            if (isset($keyVal[0]) && isset($keyVal[1])) {
                $_ENV[$keyVal[0]] = $keyVal[1];
            } else {
                trigger_error('There was an issue reading the .env file around line ' . $lineNumber, E_USER_WARNING);
            }
        }
    }
}
