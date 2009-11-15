<?php
require_once 'Lisphp/Parser.php';
require_once 'Lisphp/Scope.php';

final class Lisphp_Program implements IteratorAggregate, ArrayAccess,
                                      Countable {
    public $forms;

    function __construct($program) {
        $this->forms = Lisphp_Parser::parse($program, true);
    }

    function evaluate(Lisphp_Scope $scope) {

    }

    function offsetGet($offset) {
        return $this->forms[$offset];
    }

    function offsetExists($offset) {
        return isset($this->forms[$offset]);
    }

    function offsetSet($_, $__) {
        throw new BadMethodCallException('Lisphp_Program object is immutable');
    }

    function offsetUnset($offset) {
        throw new BadMethodCallException('Lisphp_Program object is immutable');
    }

    function getIterator() {
        return new ArrayIterator($this->forms);
    }

    function count() {
        return count($this->forms);
    }
}

