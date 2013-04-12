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
);

foreach ($cases as $case) {
    $in = file_get_contents('cases/' . $case . '.in');
    $out = file_get_contents('cases/' . $case . '.out');

    $test_out = mangle($in);

    echo "Handling with $case";
    if ($out != $test_out) {
        echo "\n";
        echo "Actual output:\n \"$test_out\"\n\n";
        echo "Expected output:\n \"$out\"\n\n";
    } else {
        echo "...OK\n";
    }
}


function mangle($in) {

    //$matches = array();
    //preg_match('/^(.*)(<\/?.+>)$/s', $html, $matches);
    //var_dump($matches);

    // last unclosed tag
    //$html = preg_replace('/^(.*)<[^>]*$/s', "$1", $html);


    return preg_replace('/^(.*\S)\s*(<[^>]*|\s\w+)$/s', "$1", $in);

}

