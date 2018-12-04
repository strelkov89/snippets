<?php

/**
 * Common Sorting Algorithms
 */ 

/**
 * Bubble Sort
 */
$arr = [1, 6, 7, 8, 3, 2, 9, 12, 54, 78, 34, 23, 0, 7, 8, 5, 4, 1, 0, 64, 70, 0, 1];

for ($i = 0; $i < count($arr); $i++) {
	for ($j = $i + 1; $j < count($arr); $j++) {
		if ($arr[$i] > $arr[$j]) {			
			$tmp_var = $arr[$j];
			$arr[$j] = $arr[$i];
			$arr[$i] = $tmp_var;			
 		}
	}
}