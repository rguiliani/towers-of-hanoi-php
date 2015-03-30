<?php
namespace Rossi;
class Disc {
    const DELIMITER = '|';
    public $size;

    public function __construct($size = 0) {
        if ($size <= 0) throw new \Exception('Invalid Disc Size');
        $this->size = $size;
        return $this;
    }

    public function __toString() {
        $base = str_repeat('-',$this->size);
        return $base.'|'.$base;
    }
}
