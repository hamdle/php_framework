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
        $output = file_get_contents($this->envPath);

        $fileContent = explode(PHP_EOL, $output);
        // Remove empty string lines
        $fileContent = array_filter($fileContent);

        foreach ($fileContent as $line) {
            $keyVal = explode('=', $line);
            $_ENV[$keyVal[0]] = $keyVal[1];
        }
    }
}
