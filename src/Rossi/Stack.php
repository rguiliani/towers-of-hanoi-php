<?php
namespace Rossi;
    class Stack {
        const DELIMITER = '|';
        const SPACE = ' ';
        protected $stack;
        public $limit;

        public function push(Disc $disc) {
            array_unshift($this->stack, $disc);
            return $this;
        }

        public function pop() {
            return array_shift($this->stack);
        }

        public function isEmpty() {
            if ($this->size() == 0) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }

        public function __construct($limit = NULL) {
            $this->stack = [];
            if ($limit !== NULL) {
                $this->limit = $limit;
            }
            return $this;
        }

        public function top() {
            if (isset($this->stack[0])) {
                return $this->stack[0];
            }
            else {
                return NULL;
            }
        }

        public function size() {
            return count($this->stack);
        }

        public function populate($size) {
            for ($i=$size;$i>0;$i--) {
                $this->push(new Disc($i));
            }
            return $this;
        }

        public function scale($size) {
            if ($size > $this->size()) {

            }
        }

        public function __toString() {
            $stack = '';
            if ($this->limit > $this->size()) {
                $emptyRow = str_repeat(self::SPACE,DISC_COUNT);
                $emptyRow = $emptyRow.self::DELIMITER.$emptyRow."\n";
                $stack .= str_repeat($emptyRow,$this->limit - $this->size());
            }
            for ($i=0;$i<$this->size();$i++) {
                $spaces = str_repeat(
                    self::SPACE, //WHAT
                    (DISC_COUNT - $this->stack[$i]->size));  //TIMES
                $stack .= $spaces.$this->stack[$i].$spaces."\n";
            }
            return $stack;

        }
    }
