<?php
/**
 * Created by PhpStorm.
 * User: ivy
 * Date: 2019/6/16
 * Time: 15:44
 */
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testCanBeNegated()
    {
        $a = new Money(1);
        $b = $a->negate();
        $this->assertEquals(-1, $b->getAmount());
    }
}