<?php

namespace MattSparks\BLNS\Tests;

use MattSparks\BLNS\BLNS;
use PHPUnit\Framework\TestCase;

class BlnsTest extends TestCase
{
    protected static $blns;

    public static function setUpBeforeClass(): void
    {
        self::$blns = new BLNS;
    }

    public function test_that_lists_are_converted_to_array()
    {
        $this->assertIsArray(self::$blns->getList());
        $this->assertIsArray(self::$blns->getBase64List());
    }

    public function test_that_lists_arent_empty()
    {
        $this->assertNotEmpty(self::$blns->getList());
        $this->assertNotEmpty(self::$blns->getBase64List());
    }
}
