<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    function calcular(String $number): String
    {
        if (empty($number))
        {
            return "0";
        }
        else
        {
            $posicionerror = 1;
            $total = 0.0;
            $separador = "\n";
            $separadasPorBarraN = explode($separador,$number);
            $separadasPorSeparador = [];
            $separadasTotal = [];
            $numerosNegativos = [];
            $arrayErrores = [];


            $separador = substr($separadasPorBarraN[0],2);

            if($number[strlen($number)-1] == $separador){
                array_push($arrayErrores,'Number expected but NOT found ');

            }
            //print($separadasPorBarraN[1]);
            $separadasPorSeparador = explode($separador,$separadasPorBarraN[1]);
            foreach($separadasPorSeparador as $elem){
                for($i=0;$i<strlen($elem);$i++){
                    if(is_numeric($elem[$i]) or $elem[$i] == '-' or $elem[$i] == '.')
                    {}else{
                        $a = $separador." expected but ". $elem[$i] . " found at position " . $posicionerror;
                        array_push($arrayErrores,$a);
                        $elem[$i] = 'z';
                    }
                    $posicionerror++;
                }
                if (empty($elem)){
                    array_push($arrayErrores,"Number expected but NOT found");
                }
                $sep = explode('z',$elem);
                foreach($sep as $elem2){
                    array_push($separadasTotal,$elem2);
                }
            }



            //print($separador);


            foreach ($separadasTotal as $elem){
                $numeroAComprobarSiNegativo = (double)$elem;
                if($numeroAComprobarSiNegativo<0){
                    array_push($numerosNegativos,$numeroAComprobarSiNegativo);
                }
                else{
                    $total += $numeroAComprobarSiNegativo;
                }

            }
            if (empty($errores) and empty($numerosNegativos)){
                return (String)$total;
            }
            else{
                if(!empty($numerosNegativos))
                {
                    $devolverNumerosNegativos = "Negative not allowed : ";
                    foreach($numerosNegativos as $elem){
                        $devolverNumerosNegativos = $devolverNumerosNegativos .$elem .", ";
                    }
                    $errores = $devolverNumerosNegativos;
                }
                if(!empty($arrayErrores)) {
                    foreach ($arrayErrores as $elem) {
                        $errores = $errores . "\n" . $elem;
                    }
                }
                return $errores;
            }
        }
    }
}