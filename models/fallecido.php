<?php

class fallecido {
    public $estadocivil;
    public $patrimonio;
    
    function getEstadocivil() {
        return $this->estadocivil;
    }
    
    function setEstadocivil($estadocivil): void {
        $this->estadocivil = $estadocivil;
    }
    
     function getPatrimonio() {
        return $this->patrimonio;
    }

    function setPatrimonio($patrimonio): void {
        $this->patrimonio = $patrimonio;
    }
    
    function test($estado,$pato){
        echo "desde el modelo $estado"."</br>"."el patrimonio es $pato";
    }

}

