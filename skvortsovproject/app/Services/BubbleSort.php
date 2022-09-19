<?php

namespace App\Services;

class BubbleSort implements BubbleSortInterface
{
    public function sort(array $inputArray): array
    {
        // TODO: Implement sort() method;

        for ($i = 0; $i < count($inputArray); $i++) {
            $count = count($inputArray);
            for ($j = $i + 1; $j < $count; $j++) {
                if ($inputArray[$i] > $inputArray[$j]) {
                    $temp = $inputArray[$j];
                    $inputArray[$j] = $inputArray[$i];
                    $inputArray[$i] = $temp;
                }
            }
        }
        return $inputArray;
    }
}
