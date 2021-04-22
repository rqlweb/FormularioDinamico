<?php

class Helpers {
    
    
    static function get(){
        return '</br> hola ';
    }
    
    static function Civil_status ( $objet ){
        
        $contador_error=0;
        
        if(!empty($objet)){
            // DECODING OBJECTO TO PHP
            $formulario_a_dcd = json_decode($objet, true);
            //VISUALIZANDO EL JSON
            //var_dump($formulario_a_dcd);
            $status=$formulario_a_dcd["estado_civil"];
            $regimen=$formulario_a_dcd["regimen"];
           
            if(!empty($status)){
                
                switch ($status) 
                {
                    case 'casado':
                        if ( !empty ( $regimen ) )
                        {
                            
                            $spouse_name = 'Nombre y Apellido del Conyuge';

                            $spouse_date_birth ='Fecha de Nacimiento';
                            
                            echo "$regimen.<br /> $spouse_name.<br /> $spouse_date_birth.<br />";
                        }
                        else
                        {
                            $contador_error++;
                            if ( $contador_error > 0 ) 
                            {
                                echo "debe estar elegido el regimen $contador_error"; 
                            }
                        }
                    break; 

                    case 'pareja de hecho':   
                        
                        $spouse_name = 'Nombre y Apellido del Conyuge';

                        $spouse_date_birth ='Fecha de Nacimiento';
                        
                        echo "$spouse_name.<br /> $spouse_date_birth.<br />";
                        break;

                    case 'soltero':   
                        
                        $single = 'soltero';
                        
                        echo $single;
                        break;

                    case 'viudo':  
                        
                        $spouse_name = 'Nombre y Apellido del Conyuge';

                        echo $spouse_name;
                        break;

                    case 'divorciado':   
                        $ex_spouse_name = 'Nombre y Apellido del Ex-Conyuge';

                        echo $ex_spouse_name;
                        break;
                    
                     default :
                        $contador_error++;
                        echo'no coincide con ninguna opcion'."</br>".$contador_error;
                        break;
                }
            }else
            {
                $contador_error++;
                echo 'estatus vacio </br>'.$contador_error;
            }
            
        }else
            echo 'objeto esta vacio';
    }
}
