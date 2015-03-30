<?php
use Rossi\TowerOfHanoi;

class TowerOfHanoiTest extends PHPUnit_Framework_TestCase
{
    /*
     * @covers Rossi\TowerOfHanoi::solve
     */
    public function testSolve()
    {
        $game = new TowerOfHanoi(3, 8);  //stacks=3, discs=8
        $game->solve();
    }
}

