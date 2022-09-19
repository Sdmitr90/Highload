<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class QuickSort implements QuickSortInterface
{
    public function sort(array $inputArray): array
    {
        $count = count($inputArray);

        // TODO: Implement sort() method;
        if ($count <= 1) {
            return $inputArray;
        }

        $base = $inputArray[0];
        $left = [];
        $right = [];

        for ($i = 1; $i < $count; $i++) {

            if ($base >= $inputArray[$i]) {
                $left[] = $inputArray[$i];
            } else {
                $right[] = $inputArray[$i];
            }
        }

        $left = $this->sort($left);
        $right = $this->sort($right);

        return array_merge($left, [$base], $right);
    }
}
