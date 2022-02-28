<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\Calculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorText extends TestCase
{
    /**
     * @test
     */
    public function string_vacio_devuelve_0()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("");

        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function 1_devuelve_1()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1");

        $this->assertEquals("1", $result);
    }

    /**
     * @test
     */
    public function 1y2_devuelve_3()
    {
         $StringCalculator = new StringCalculator();

         $result = $StringCalculator->calcular("//,\n1,2");

         $this->assertEquals("3", $result);
    }

    /**
     * @test
     */
    public function entre_separadores_no_hay_numero_error()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1,,2");

        $this->assertEquals("Number expected but NOT found", $result);
    }

    /**
     * @test
     */
    public function ultimo_valor_es_separador_error()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1,2,");

        $this->assertEquals("Number expected but NOT found", $result);
    }


    /**
     * @test
     */
    public function separador_incorrecto_error_separador()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1|2");

        $this->assertEquals(", expected but | found at position 3", $result);
    }

    /**
     * @test
     */
    public function numero_negativo_error()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1,-6");

        $this->assertEquals("Negative not allowed : -6", $result);
    }

    /**
     * @test
     */
    public function numerosos_errores_devuelven_varias_excepciones()
    {
        $StringCalculator = new StringCalculator();

        $result = $StringCalculator->calcular("//,\n1,,2,-8");

        $this->assertEquals("Number expected but NOT found\nNegative not allowed : -8", $result);
    }
}
