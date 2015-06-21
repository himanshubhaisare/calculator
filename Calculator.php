<?php
/**
 * Created by PhpStorm.
 * User: himanshubhaisare
 * Date: 6/20/15
 * Time: 4:20 PM
 */

class Calculator {

    /**
     * @param $a
     * @param $b
     * @return mixed
     */
    public function add($a, $b) {
        return $a + $b;
    }

    /**
     * @param $a
     * @param $b
     * @return mixed
     */
    public function subtract($a, $b) {
        return $a - $b;
    }

    /**
     * @param $a
     * @param $b
     * @return mixed
     */
    public function multiply($a, $b) {
        return $a * $b;
    }

    /**
     * @param $dividend
     * @param $divisor
     * @return float
     */
    public function divide($dividend, $divisor) {
        return $dividend / $divisor;
    }

    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function modulus($a, $b) {
        return $a % $b;
    }

    /**
     * @param $a
     * @param $b
     * @return mixed
     */
    public function exponentiation($a, $b) {
        return $a ** $b; // introduced in php 5.6
    }

    /**
     * Evaluate combination of binary operations
     *
     * @param array $numbers stores all the numbers in the expression in order
     * @param array $operators stores all the operators in the expression in order
     * @throws Exception
     * @return int
     */
    public function evaluate(array $numbers, array $operators) {
        if(empty($numbers) || empty($operators)) {
            throw new Exception("Cannot calculate");
        }

        $numberCount = count($numbers);
        // start with 0
        $result = 0;
        // add this zero to the first number in numbers array
        array_push($operators, '+');

        for($i = 0; $i < $numberCount; $i++) {
            $operator = array_pop($operators);
            $operation = $this->getOperation($operator);
            $result = $this->$operation($numbers[$i], $result);
        }

        return $result;
    }

    /**
     * Read operator and return respective operation method
     *
     * @param $operator
     * @return string
     * @throws Exception
     */
    public function getOperation($operator) {
        switch($operator) {
            case '+' :
                $operation = 'add';
                break;
            case '-' :
                $operation = 'subtract';
                break;
            case '*' :
                $operation = 'multiply';
                break;
            case '/' :
                $operation = 'divide';
                break;
            case '%' :
                $operation = 'modulus';
                break;
            case '^' :
                $operation = 'exponentiation';
                break;
            default :
                throw new Exception("Calculator does not support this operator");
        }

        return $operation;
    }
}