<?php

declare(strict_types=1);

namespace CancioLabs\Functions\Cpf;

use InvalidArgumentException;

if (!function_exists(__NAMESPACE__ . '\\is_valid_cpf')) {
    function is_valid_cpf(?string $cpf): bool {
        try {
            assert_cpf($cpf);
            return true;
        } catch (InvalidArgumentException) {
            return false;
        }
    }
}