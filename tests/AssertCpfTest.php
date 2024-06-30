<?php

namespace CancioLabs\Functions\Cpf\Tests;

use function CancioLabs\Functions\Cpf\assert_cpf;
use InvalidArgumentException;

class AssertCpfTest extends CpfTestCase
{

    /**
     * @dataProvider invalidCpfDataProvider
     */
    public function testConstructorWhenCpfIsInvalid(string $invalidCPF): void
    {
        $this->expectException(InvalidArgumentException::class);

        assert_cpf($invalidCPF);
    }

    /**
     * @dataProvider validCpfDataProvider
     */
    public function testConstructorAndGetters(string $raw, string $formatted): void
    {
        $this->expectNotToPerformAssertions();

        assert_cpf($raw);
        assert_cpf($formatted);
    }

}