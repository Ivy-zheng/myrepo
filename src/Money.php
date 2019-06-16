<?php
/**
 * Created by PhpStorm.
 * User: ivy
 * Date: 2019/6/16
 * Time: 15:42
 */
class Money
{
    private $amount;
    public function __construct($amount)
    {
        $this->amount = $amount;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    public function negate()
    {
        return new Money(-1*$this->amount);
    }
}