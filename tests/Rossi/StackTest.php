<?php
use Rossi\Stack;
use Rossi\Disc;

class StackTest extends PHPUnit_Framework_TestCase
{
    /*
     * @covers Rossi\Stack::size
     */
    public function testSize()
    {
        $stack = new Stack(8);
        $stack->push(new \Rossi\Disc(5));
        $this->assertEquals(1, $stack->size());
    }

    /*
     * @covers Rossi\Stack::push
     */
    public function testPush()
    {
        $stackLimit = 8;
        $stack = new Stack($stackLimit);
        $startSize = $stack->size();
        $stack->push(new Disc(5));
        $endSize = $stack->size();
        $this->assertEquals(1, $endSize - $startSize);
    }

    /*
     * @covers Rossi\Stack::pop
     */
    public function testPop()
    {
        $stackLimit = 8;
        $discSize = 5;
        $stack = new Stack($stackLimit);
        $stack->push(new Disc($discSize));
        $startSize = $stack->size();
        $popped = $stack->pop();
        $endSize = $stack->size();
        $this->assertInstanceOf('Rossi\Disc', $popped);
        $this->assertEquals($discSize, $popped->size);
        $this->assertEquals(1, $startSize - $endSize);
    }

    /*
     * @covers Rossi\Stack::isEmpty
     */
    public function testIsEmpty()
    {
        $stack = new Stack(8);
        $this->assertEquals(TRUE, $stack->isEmpty());
        $stack->push(new Disc(5));
        $this->assertEquals(FALSE, $stack->isEmpty());
    }

    /*
     * @covers Rossi\Stack::top
     */
    public function testTop()
    {
        $stack = new Stack(8);
        $disc = new Disc(5);
        $stack->push($disc);
        $this->assertEquals($disc, $stack->top());
    }

    public function testPopulate() {
        $stackSize = 8;
        $stack = new Stack($stackSize);
        $stack->populate();
        $this->assertEquals(8,$stack->size());
    }
}

