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
}