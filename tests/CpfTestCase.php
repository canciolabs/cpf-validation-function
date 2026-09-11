<?php

declare(strict_types=1);

namespace CancioLabs\Functions\Cpf\Tests;

use PHPUnit\Framework\TestCase;

abstract class CpfTestCase extends TestCase
{

    public static function invalidCpfDataProvider(): array
    {
        $testCases = [];

        // notEmpty
        $testCases[] = [null];
        $testCases[] = [''];

        // regex
        $testCases[] = [' '];
        $testCases[] = ['abcdefghijk'];
        $testCases[] = ['182.488.530.04'];
        $testCases[] = ["182.488.530-04\n"];
        $testCases[] = ['182-488-530-04'];
        $testCases[] = ['182 488 530 04'];
        $testCases[] = ['foo17031733090'];
        $testCases[] = ['170.317.330-90foo'];

        // 000.000.000-00, 111.111.111-11, ..., 999.999.999-99 are invalids
        for ($i = 0; $i <= 9; $i++) {
            $testCases[] = [str_repeat((string) $i, 11)];
            $testCases[] = [str_repeat((string) $i, 3) . '.' . str_repeat((string) $i, 3) . '.' . str_repeat((string) $i, 3) . '-' . str_repeat((string) $i, 2)];
        }

        // invalid digits
        // "000.269.140-00" is a valid.
        for ($i = 1; $i <= 99; $i++) {
            $iAsStr = (string) $i;
            $testCases[] = ['000.269.140-' . substr('00' . $iAsStr, -2)];
            $testCases[] = ['000269140' . substr('00' . $iAsStr, -2)];
        }

        return $testCases;
    }

    public static function validCpfDataProvider(): array
    {
        $testCases = [];

        $testCases[] = [
            'raw' => '00026914000',
            'formatted' => '000.269.140-00',
        ];

        $testCases[] = [
            'raw' => '94537020059',
            'formatted' => '945.370.200-59',
        ];

        $testCases[] = [
            'raw' => '03303929050',
            'formatted' => '033.039.290-50',
        ];

        $testCases[] = [
            'raw' => '54745097077',
            'formatted' => '547.450.970-77',
        ];

        $testCases[] = [
            'raw' => '22657234011',
            'formatted' => '226.572.340-11',
        ];

        $testCases[] = [
            'raw' => '89423044000',
            'formatted' => '894.230.440-00',
        ];

        return $testCases;
    }

}