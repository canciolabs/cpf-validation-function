<?php

namespace CancioLabs\Functions\Cpf;

use InvalidArgumentException;

function is_valid_cpf($cpf): bool {
    try {
        assert_cpf($cpf);
        return true;
    } catch (InvalidArgumentException $e) {
        return false;
    }
}