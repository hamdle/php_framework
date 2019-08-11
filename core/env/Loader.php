<?php
/**
 * Load .env file into $_ENV
 */

class Loader
{
    protected $envPath;

    public function __construct()
    {
        $this->envPath = $_SERVER["DOCUMENT_ROOT"] . '/.env';
    }

    public function load()
    {
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

        foreach ($fileContent as $line) {
            $keyVal = explode('=', $line);
            if (isset($keyVal[1])) {
                $_ENV[$keyVal[0]] = $keyVal[1];
            }
        }
    }
}
