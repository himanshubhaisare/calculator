<?php
/**
 * Created by PhpStorm.
 * User: himanshubhaisare
 * Date: 6/20/15
 * Time: 4:29 PM
 *
 * This script performs calculations using the calculator object
 */

require_once 'Calculator.php';

$calculator = new Calculator();

// Simple Addition;
$addition = $calculator->add(6, 5);
echo "\nAddition of 6 and 5 = $addition"; // prints 11

// Simple Subtraction
$subtraction = $calculator->subtract(6, 5);
echo "\nSubtraction of 6 and 5 = $subtraction"; // prints 1

// Simple multiplication
$multiplication = $calculator->multiply(6, 5);
echo "\nMultiplication of 6 and 5 = $multiplication"; // prints 30

// Simple division
$division = $calculator->divide(10, 2);
echo "\nDivision of 10 by 2 = $division"; //prints 5

// Simple Modulo operation
$modulus = $calculator->modulus(6, 5);
echo "\nModulus of 6 by 5 = $modulus"; //prints 1

// Simple exponentiation
$exponentiation = $calculator->exponentiation(10, 2);
echo "\nExponentiation of 10 by 2 = $exponentiation"; //prints 100

// combination of binary operation 1 + 1 - 4 * 4
$result = $calculator->evaluate("1+1-4*4");
echo "\n 1 + 1 - 4 * 4 = $result\n";