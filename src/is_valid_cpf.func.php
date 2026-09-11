<?php

declare(strict_types=1);

namespace CancioLabs\Functions\Cpf;

use InvalidArgumentException;

function is_valid_cpf(?string $cpf): bool {
    try {
        assert_cpf($cpf);
        return true;
    } catch (InvalidArgumentException) {
        return false;
    }
}