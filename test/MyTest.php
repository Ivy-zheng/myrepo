<?php
/**
 * Created by PhpStorm.
 * User: ivy
 * Date: 2019/6/16
 * Time: 16:16
 */
use PHPUnit\Framework\TestCase;
class MyTest extends TestCase
{
    public function test()
    {
        echo "hello word";
        $stack = [];
        $this->assertEquals(0, count($stack));

    }
}