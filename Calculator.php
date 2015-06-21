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
     * @param $expression
     * @return mixed
     * @throws Exception
     */
    public function evaluate($expression) {
        $postfix = $this->convertInfixToPostfix($expression);
        $result = $this->evaluatePostfix($postfix);

        return $result;
    }

    /**
     * Convert an infix expression to postfix
     *
     * @param $infix
     * @return array
     */
    public function convertInfixToPostfix($infix) {
        $length = strlen($infix);
        $postfix = array();
        $stack = array();

        for ($i = 0; $i < $length; $i++) {
            if (($infix[$i] >= '0') && ($infix[$i] <= '9')) {
                $postfix[] = $infix[$i];
            }
            else if (($infix[$i] == '*') || ($infix[$i] == '+') || ($infix[$i] == '-') || ($infix[$i] == '/') || ($infix[$i] == '%') || ($infix[$i] == '^')) {
                while(count($stack) > 0) {
                    if ($this->comparePrecedence($stack[0], $infix[$i])) {
                        $postfix[] = array_pop($stack);
                    } else {
                        break;
                    }
                }
                array_push($stack, $infix[$i]);
            }
        }

        while (count($stack) > 0) {
            $postfix[] = array_pop($stack);
        }

        return $postfix;
    }

    /**
     * Evaluate the postfix expression
     *
     * @param $postfix
     * @return mixed
     * @throws Exception
     */
    public function evaluatePostfix($postfix) {
        if(empty($postfix)) {
            throw new Exception("cannot calculate");
        }

        $stack = array();
        $chars = str_split($postfix);
        foreach($chars as $char) {
            // If the token is a value
            if(is_numeric($char)) {
                // Push it onto the stack
                $stack[] = $char;
            } else { // ok this is an operator
                // all operations are binary, so check if stack has at least 2 numbers
                if(count($stack) > 1) {
                    $operator = $char;
                    $operation = $this->getOperation($operator);
                    // pop top 2 numbers from the stack
                    $a = array_pop($stack);
                    $b = array_pop($stack);
                    // perform operation
                    $result = $this->$operation($a, $b);
                    // push the result on the stack
                    $stack[] = $result;
                }
            }
        }

        if(count($stack) > 1) {
            echo "\nsomething is wrong ";
            print_r($stack);
            echo "\n";
        }
        else {
            return $stack[0];
        }
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

    /**
     * @param $top
     * @param $char
     * @return bool
     */
    private function comparePrecedence($top, $char) {
        if ($top == '+' && $char == '*') { // + has lower precedence than *
            return false;
        }
        if ($top == '*' && $char == '-') { // * has higher precedence over -
            return true;
        }
        if ($top == '+' && $char == '-') { // + has same precedence over +
            return true;
        }

        return true;
    }
}