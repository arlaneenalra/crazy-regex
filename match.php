#!/usr/bin/env php
<?php

$cases = array(
    'case1',
    'case2',
    'case3',
    'case4',
    'case5',
    'case6',
    'case7',
    'case8',
    'case9',
    'case10',
    'case11',
    'case12',
    'case13',
    'case14',
    'case15',
);

foreach ($cases as $case) {
    $in = file_get_contents('cases/' . $case . '.in');
    $out = file_get_contents('cases/' . $case . '.out');

    $test_out = mangle($in);

    echo "Handling with $case";
    if ($out != $test_out) {
        echo "\n";
        echo "Input:\n \"$in\"\n\n";
        echo "Actual output:\n \"$test_out\"\n\n";
        echo "Expected output:\n \"$out\"\n\n";
    } else {
        echo "...OK\n";
    }
}


function mangle($in) {
    
    $pattern ='/^(.*?\S)\s*(<[^>]*|\s\w+|)$/s'; 
    return preg_replace($pattern, "$1", $in);

}

