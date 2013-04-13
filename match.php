#!/usr/bin/env php
<?php

function mangle($in) {
    $pattern ='/^\s*(.*?\S)\s*(<[^>]*|\s\w+|)$/sD'; 
    return preg_replace($pattern, "$1", $in);
}

class MatchTest extends PHPUnit_Framework_TestCase {
    public function provider() {
        foreach (glob('cases/*') as $case) {
            $actual = mangle(file_get_contents($case . '/in'));
            $data[] = array($actual, file_get_contents($case . '/out'));
        }
        return $data;
    }

    /**
     * @dataProvider provider
     */
    public function testPushAndPop($actual, $expected) {
        $this->assertEquals($actual, $expected);
    }
}

