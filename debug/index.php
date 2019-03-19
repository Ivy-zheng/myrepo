<?php 

function one($str1, $str2)
{
	echo '11';
    two("Glenn", "Quagmire");
}

function two($str1, $str2)
{
	echo '22';
    three("Cleveland", "Brown");
}

function three($str1, $str2)
{
	echo '33';
    echo '<pre>';
    debug_print_backtrace();
    echo '44';
}
echo one('a','b');


// class a{ 
// function say($msg) { 
// echo "msg:".$msg; 
// echo "<pre>";debug_print_backtrace(); 
// } 
// } 

// class b { 
// function say($msg) { 
// $a = new a(); 
// $a->say($msg); 
// } 
// } 

// class c { 
// function __construct($msg) { 
// $b = new b(); 
// $b->say($msg); 
// } 
// } 

// $c = new c("test");