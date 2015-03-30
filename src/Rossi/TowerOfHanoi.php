<?php
namespace Rossi;
class TowerOfHanoi
{
    const STACK_DELIM = ' ';
    protected $stacksNum;
    protected $discsNum;
    protected $source;
    protected $destination;
    protected $steps;
    protected $spares;
    public $stacks;

    private function cur()
    {
        return key($this->stacks);
    }

    private function end()
    {
        end($this->stacks);
        return $this->cur(); //return key of last stack
    }

    private function beginning()
    {
        reset($this->stacks);
        return $this->cur(); //return key of first stack
    }

    private function next($start)
    {
        if (isset($this->stacks[$start + 1])) {
            return $start + 1;
        } else {
            return $this->beginning();
        }
    }

    private function prev($start)
    {
        if (isset($this->stacks[$start - 1])) {
            return $start - 1;
        } else {
            return $this->end();
        }
    }

    private function getSpare($src, $dest)
    {
        for ($i = 0; $i < count($this->stacks); $i++) {
            if ($i == $src || $i == $dest) continue;
            $stack = $this->stacks[$i];
            if ($stack->isEmpty()) return $i;
            if ($this->stacks[$src]->top()->size < $stack->top()->size) {
                return $i;
            }
        }
    }

    private function move($from = NULL, $to = NULL)
    {
        //TODO replace logsave with real logging
        logsave("Moving $from -> $to\n");
        logsave("Step #: " . $this->steps . "\n");
        $this->stacks[$to]->push($this->stacks[$from]->pop());
        echo $this . "\n";
        $this->steps++;
        return $this;
    }

    //all that... just for this little magic right, here?  That's beautiful...
    private function _solve($n, $src, $aux, $dest)
    {
        if ($n == 0)
            return 0;
        $this->_solve(($n - 1), $src, $dest, $aux);
        $this->move($src, $dest);
        $this->_solve(($n - 1), $aux, $src, $dest);
        return true;
    }

    public function solve()
    {
        $this->source = $this->beginning(); //set to beginning
        $this->destination = $this->end(); //set to end

        if (!$this->stacks[$this->source]->isEmpty() && $this->stacks[$this->destination]->size() < DISC_COUNT) {
            ini_set('precision', 16);
            $start = microtime(true);
            $this->_solve(DISC_COUNT, $this->source, $this->getSpare($this->source, $this->destination), $this->destination);
            $end = microtime(true);
            echo $end - $start . " seconds";

        }
        return $this;
    }

    public function __construct($stacks, $discs)
    {
        $this->steps = 1;
        $this->discsNum = $discs;
        $this->stacksNum = $stacks;
        for ($i = 0; $i < $this->stacksNum; $i++) {
            $this->stacks[] = new Stack($this->discsNum);
        }
        $this->stacks[0]->populate();

        return $this;
    }

    public function __toString()
    {
        $temp = [];
        foreach ($this->stacks as $stack) {
            $i = 0;
            $current = explode("\n", (string)$stack);
            array_pop($current);
            foreach ($current as $line) {
                if (!array_key_exists($i, $temp)) {
                    $temp[$i] = '';
                }
                $temp[$i++] .= $line . self::STACK_DELIM;
            }
        }
        return implode("\n", $temp);
    }
}

