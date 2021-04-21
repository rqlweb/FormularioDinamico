<?php


class formularioControllers {
    function showForm(){
        require_once 'views/datosFallecido.php';
    }
    
    function processForm($status,$patrimonio){
        require_once '../views/procesador.php';
        require_once '../models/fallecido.php';
        $test=new fallecido();
        $test->setEstadocivil($status);
        $resultado=$test->getEstadocivil();
        $test->setPatrimonio($patrimonio);
        $monto=$test->getPatrimonio();
        $total=$this->calcular($monto);
        $test->test($resultado,$total);
        
    }
    
    //calculo del valor
        /*
         * Entre 0 y 402.678,11 euros
           De más de 402.678,12 euros hasta 2.007.380,43 euros
           De más de 2.007.380,43 euros hasta 4.020.770,98 euros
           De más de 4.020.770,98 euros
           
         */
    function calcular($patrimonio){
        
        if($patrimonio<=402678.11) {
            return "Entre 0 y 402.678,11 euros";
        }
        if($patrimonio>402678.11 && $patrimonio<=2007380.43){
            return "De más de 402.678,12 euros hasta 2.007.380,43 euros";
        }
        if($patrimonio>2007380.43 && $patrimonio<=4020770.98){
            return "De más de 2.007.380,43 euros hasta 4.020.770,98 euros";
        }
        if($patrimonio>4020770.98){
            return "De más de 4.020.770,98 euros";
        }
        
    }
}
