<?php

namespace CancioLabs\Functions\Cpf;

use InvalidArgumentException;

function assert_cpf(string $cpf): void {
    if (empty($cpf)) {
        throw new InvalidArgumentException('The CPF must not be an empty string.');
    }

    if (!preg_match('/^(\d{3}\.\d{3}\.\d{3}\-\d{2})|(\d{11})$/', $cpf)) {
        throw new InvalidArgumentException('The CPF must match either "999.999.999-99" or "99999999999" pattern.');
    }

    // Remove non-numeric chars
    $cpf = (string) preg_replace("/\D/", "", $cpf);

    // 000.000.000-00, 111.111.111-11, ..., 999.999.999-99 are invalids
    for ($i = 0; $i <= 9; $i++) {
        if ($cpf === str_repeat($i, 11)) {
            throw new InvalidArgumentException('The CPF is invalid.');
        }
    }

    // Calculate digits
    $d1 = $d2 = 0;
    for ($i = 0, $j = 11; $i <= 8; $i++, $j--) {
        $d1 += $cpf[$i] * ($j - 1);
        $d2 += $cpf[$i] * $j;
    }
    $d2 += $cpf[$i] * $j;

    $c1 = ($d1 % 11 < 2) ? 0 : 11 - ($d1 % 11);
    $c2 = ($d2 % 11 < 2) ? 0 : 11 - ($d2 % 11);

    // check if the last two digits are equal to c1 and c2
    if ($c1 !== (int) $cpf[9] || $c2 !== (int) $cpf[10]) {
        throw new InvalidArgumentException('The CPF is invalid.');
    }
}