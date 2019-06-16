<?php
namespace Foobar;
class Foo {
    static public function test($param) {
        print "Hello world! \$param \n";
    }
}
 
 
$param = 'param';
call_user_func(__NAMESPACE__ .'\Foo::test',$param);
call_user_func(array(__NAMESPACE__ .'\Foo', 'test'), $param);
