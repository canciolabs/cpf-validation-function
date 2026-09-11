<?php

declare(strict_types=1);

namespace CancioLabs\Functions\Cpf\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use function CancioLabs\Functions\Cpf\assert_cpf;
use InvalidArgumentException;

class AssertCpfTest extends CpfTestCase
{

    #[DataProvider('invalidCpfDataProvider')]
    public function testConstructorWhenCpfIsInvalid(?string $invalidCPF): void
    {
        $this->expectException(InvalidArgumentException::class);

        assert_cpf($invalidCPF);
    }

    #[DataProvider('validCpfDataProvider')]
    public function testConstructorAndGetters(string $raw, string $formatted): void
    {
        $this->expectNotToPerformAssertions();

        assert_cpf($raw);
        assert_cpf($formatted);
    }

}