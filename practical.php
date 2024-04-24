<?php

function minDeletionsChar($str) {
    $num = strlen($str); // count
    $dp = array_fill(0, $num, array_fill(0, $num, 0));
    for ($gap = 1; $gap < $num; $gap++) {
        for ($l = 0, $h = $gap; $h < $num; $l++, $h++) {
            
            if ($str[$l] == $str[$h]) {
                $dp[$l][$h] = $dp[$l + 1][$h - 1];
            } else {
                $dp[$l][$h] = 1 + min($dp[$l + 1][$h], $dp[$l][$h - 1]);
            }
        }
    }

    return $dp[0][$num - 1];
}

// Test
$input1 = "ACBCDBAA";
$input2 = "racecar";

echo "<b>Input: </b>". $input1."<br/>";
echo "<b>Output: </b>" . minDeletionsChar($input1) . "<br/>";
echo "<hr/>";
echo "<b>Input:</b>". $input2."<br/>";
echo "<b>Output: </b>" . minDeletionsChar($input2) . "<br/>";