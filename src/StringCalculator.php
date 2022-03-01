<?php

namespace OscarJordanGil\StringCalculator;

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
            $posicionerror = 2;
            $total = 0.0;
            $separador = "\n";
            $separadasPorBarraN = explode($separador,$number);
            $separadasPorSeparador = [];
            $separadasTotal = [];
            $numerosNegativos = [];
            $arrayErrores = [];
            $errores = "";

            if($number[strlen($number)-1] == $separador){
                array_push($arrayErrores,'Number expected but NOT found');
                $number[strlen($number)-1] ='z';
            }

            $separador = substr($separadasPorBarraN[0],2);

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

            foreach ($separadasTotal as $elem){
                $numeroAComprobarSiNegativo = (double)$elem;
                if($numeroAComprobarSiNegativo<0){
                    array_push($numerosNegativos,$numeroAComprobarSiNegativo);
                }
                else{
                    $total += $numeroAComprobarSiNegativo;
                }

            }
            if (empty($arrayErrores) and empty($numerosNegativos)){
                return (String)$total;
            } else{
                if(!empty($numerosNegativos)) {
                    $devolverNumerosNegativos = "Negative not allowed : ";
                    $devolverNumerosNegativos = $devolverNumerosNegativos.$numerosNegativos[0];
                    for($i=1;$i<count($numerosNegativos);$i++){
                        $devolverNumerosNegativos =  $devolverNumerosNegativos . ", " . $numerosNegativos[$i];
                    }
                    $errores = $devolverNumerosNegativos;
                    if(!empty($arrayErrores)){
                        $errores = $errores . "\n";
                        if (count($arrayErrores) == 1) {
                            $errores = $errores . $arrayErrores[0];
                        }
                        else {
                            foreach ($arrayErrores as $elem) {
                                $errores = $errores . "\n" . $elem;
                            }
                        }
                    }
                } else {
                    $errores = $arrayErrores[0];
                    for($i=1;$i<count($arrayErrores);$i++){
                        $errores =  $errores . "\n" . $arrayErrores[$i];
                    }
                }
                return $errores;
            }
        }
    }
}