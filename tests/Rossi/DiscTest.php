<?php
use Rossi\Disc;

class DiscTest extends PHPUnit_Framework_TestCase
{
    public function testSize()
    {
        $size = 5;
        $disc = new Disc($size);
        $this->assertEquals($size, $disc->size);
    }

    /*
     * @covers Rossi\Disc::__toString
     */
    public function testOutput()
    {
        $size = 5;
        $disc = new Disc($size);
        $this->expectOutputString('-----|-----');
        echo $disc;
    }
}

