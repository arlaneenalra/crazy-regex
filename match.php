#!/usr/bin/env php
<?php

foreach (glob('cases/*') as $case) {
    $in = file_get_contents($case . '/in');
    $out = file_get_contents($case . '/out');

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

