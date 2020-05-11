<?php

namespace MattSparks\BLNS;

use ReflectionClass;
use Composer\Autoload\ClassLoader;

class BLNS
{
    /**
     * BLNS Directory Path
     * @var const
     */
    private $blns_dir = '';

    /**
     * BLNS List
     * @var array
     */
    private $list = [];

    /**
     * BLNS Base 64 List
     * @var array
     */
    private $list64 = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setBlnsPath();
        $this->list = $this->parseList('blns.json');
        $this->list64 = $this->parseList('blns.base64.json');
    }

    /**
     * Set BLNS Path
     * 
     * Hat tip to: https://stackoverflow.com/a/45364136
     * 
     * @return void
     */
    private function setBlnsPath() : void 
    {
        $reflection = new ReflectionClass(ClassLoader::class);
        $path = dirname(dirname($reflection->getFileName()));

        $this->blns_dir = $path . '/blns/blns/';
    }

    /**
     * Fetch List
     * 
     * Returns the contents of BLNS lists.
     * 
     * @param string $list
     * @return string
     */
    private function fetchList(string $list): string
    {
        return file_get_contents($this->blns_dir . $list);
    }

    /**
     * Get Base 64 List
     * 
     * @return array
     */
    public function getBase64List(): array
    {
        return $this->list64;
    }

    /**
     * Get List 
     * 
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * List to Array 
     * 
     * Converts the JSON list to an array.
     * 
     * @param string $list
     * @return array
     */
    private function listToArray(string $list): array
    {
        return json_decode($list, true);
    }

    /**
     * Parse List
     * 
     * Grabs the list & converts to an array.
     * 
     * @param string $list
     * @return array
     */
    private function parseList(string $list): array
    {
        return $this->listToArray($this->fetchList($list));
    }
}
