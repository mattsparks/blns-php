<?php

namespace MattSparks\BLNS;

class BLNS
{
    /**
     * BLNS Directory Path
     * @var const
     */
    const BLNS_DIR = __DIR__ . '/../vendor/blns/';

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
        $this->list = $this->parseList('blns.json');
        $this->list64 = $this->parseList('blns.base64.json');
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
        return file_get_contents(self::BLNS_DIR . $list);
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
