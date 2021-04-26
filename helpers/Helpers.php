<?php

class Helpers {
    
    //comprobacion ternaria con doble condicion
    //(!empty($type) ? $type :($type='autonomo individual' ? $type : false )
    
    // SECCION A) DATOS PERSONALES DEL FALLECIDO:
    static function Civil_status ( $object ){
        
       $contador_error=0;
        //revisar el envio de un objeto que fue convertido de JSON
       //$form = json_decode($objet,true);
       var_dump($object);
       $status=$object["estado_civil"];
       var_dump($status);
       $regimen=$object["regimen"];

            if( (!empty($status)) ? $status : false)
            {
                switch ($status) 
                {
                    case 'casado':
                        if ( !empty( $regimen) ? $regimen : false )
                        {                           
                            $spouse_name = 'Nombre y Apellido del Conyuge';
                            $spouse_date_birth ='Fecha de Nacimiento';                            
                            echo "$regimen.<br /> $spouse_name.<br /> $spouse_date_birth.<br />";
                        }
                        else
                        {
                            $contador_error++;
                            echo "debe estar elegido el regimen $contador_error";
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
    }
    
    static function Have_business ( $object )
    {   
        //Para registrar los errores en la comprobacion
        $contador_error=0;
        
        //Campos a comprobar 
        $business=$object["negocio"];
        $type=$object["tipo_autonomo"];
        
        if((!empty($business)) ? $business : false)
        {
            switch ($business) 
            {
                case $business && ((!empty($type)) ? $type == 'autonomo individual' : false ) :                  
                    $self_employed_ind =$type;
                    $epigrafe = 'Epígrafe IAE'; 
                    $desc_epigrafe = 'Descripción epígrafe';
                    $trade_name = 'Nombre comercial';
                    echo "$self_employed_ind.<br /> $epigrafe.<br /> $desc_epigrafe.<br /> $trade_name.<br />"; 
                    break;

                case $business && ((!empty($type)) ? $type == 'autonomo con sociedad' : false ) :   
                    $self_employed_soc = $type;
                    echo "$self_employed_soc.<br />";
                    break;

                default :
                    $business='NO';
                    echo "$business.<br />";
                    break;
            }
        }else{
            $contador_error++;
            echo'no se selecciono ninguna opcion'."</br>".$contador_error;          
        }
    }  
    
    
    //B) DATOS PERSONALES HEREDEROS
    
    //Funcion para el parentesco con el fallecido
    static function Deceased_kinship ( $object )
    {
        //Para registrar los errores en la comprobacion
        $contador_error=0;
        
        //var_dump($form);
        $parentesco= $object[1]["step_b"]["parentesco_fallecido"]; 
        
        if( (!empty($parentesco)) ? $parentesco : false)
        {
            switch ($parentesco)
            {
                case 'Conyuge' :   
                    $spouse = 'Conyuge';
                    echo $spouse;
                    break;

                case 'Pareja de Hecho' :   
                    $partner = 'Pareja de Hecho';
                    echo $partner;
                    break;

                case $parentesco == 'Hijo' || $parentesco == 'Hija' :   
                    $children = $parentesco;
                    echo $children;
                    break;

                case $parentesco == 'Nieto' || $parentesco =='Nieta' :   
                    $grandchild = $parentesco;
                    echo $grandchild;
                    break;

                case $parentesco == 'Padre' || $parentesco == 'Madre' :   
                    $parent = $parentesco;
                    echo $parent;
                    break;

                case $parentesco == 'Abuelo' || $parentesco == 'Abuela' :   
                    $grandparent = $parentesco;
                    echo $grandparent;
                    break;

                case $parentesco == 'Hermano' || $parentesco == 'Hermana' :   
                    $brotherSister = $parentesco;
                    echo $brotherSister;
                    break;

                case 'Sobrino por Consanguinidad':   
                    $nephewConsang = 'Sobrino por Consanguinidad';
                    echo $nephewConsang;
                    break;

                case 'Tio por Consanguinidad':   
                    $uncleConsang = 'Tio por Consanguinidad';
                    echo $uncleConsang;
                    break;

                case 'Primo por Consanguinidad':   
                    $cousinConsang = 'Primo por Consanguinidad';
                    echo $cousinConsang;
                    break;

                case 'Sin Parentesco':   
                    $nokinship = 'Sin Parentesco';
                    echo $cousinConsang;
                    break;

                default :
                    echo $kinship = 'Especificar Parentesco';
                    break;
            }
        }else{
            $contador_error++;
            echo'no se selecciono ninguna opcion'."</br>".$contador_error;           
        }    
    }
    
    static function Patrimonial_value ( $object )
    {   
        //Para registrar los errores en la comprobacion
        $contador_error=0;
        
        //var_dump($form);
        $patrimonial= $object[1]["step_b"]["patrimonio"];
        
        if((!empty($patrimonial)) ? $patrimonial : false)
        {
            if ( $patrimonial <= 402678.11 )
            {
                return "Entre 0 y 402.678,11 euros";
            }

            if ( $patrimonial > 402678.11 && $patrimonial <= 2007380.43 )
            {
                return "De más de 402.678,12 euros hasta 2.007.380,43 euros";
            }

            if ( $patrimonial > 2007380.43 && $patrimonial <= 4020770.98 )
            {
                return "De más de 2.007.380,43 euros hasta 4.020.770,98 euros";
            }

            if ( $patrimonial > 4020770.98 )
            {
                return "De más de 4.020.770,98 euros";
            }
        } else {
          $contador_error++;
          echo'no coincide con ningun monto'."</br>".$contador_error; 
        }
            
    }
    
     //C) BIENES DE HERENCIA 
    
    static function Property ( $object )
    {
        $contador_error=0;
        
        var_dump($object);
        
        array_walk_recursive($option, function( $item,$key){
            
            echo "clave: $key y item: $item</br>";
        });
        
            //variables globales 
            $direction = 'indicar direccion';
            $cadastral_reference = 'Referencia catastral';
            $value_entire_property;
            $construction_year = 'Año de construccion';
            $square_meter = 'indicar los metros cuadrados';
            $elevator = "Elevador";
            $num_parking_spaces = 'indicar numero de plazas';
            $meter_storage_room = 'metros del trastero';
            $access_road = 'via de acceso';
            $type_place = 'tipo de lugar';

            switch ( $item )
            {

                case 'piso' :
                    $direction;

                    $cadastral_reference;

                    $value_entire_property = 'Valor de la totalidad del piso';

                    if ( $item == 'bien ganancial' )
                    {
                            $assets_profit = 'bien ganancial';
                    } else {
                            $assets_privative = 'bien privativo % de la propiedad';
                    }

                    $construction_year;

                    $square_meter;

                    $elevator;

                    $num_parking_spaces;

                    $meter_storage_room;

                    echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $construction_year.<br /> $square_meter.<br /> $assets.<br />"
                            . "$elevator.<br /> $num_parking_spaces.<br /> $meter_storage_room.<br />";   

                    break;

                case 'plaza garaje' :
                    $direction;

                    $cadastral_reference;

                    $value_entire_property = 'Valor de la totalidad de la plaza de garaje';

                    if ( $assets == 'bien ganancial' )
                    {
                            $assets_profit = 'bien Ganancial';
                    } else {
                            $assets_privative = 'bien privativo % de la propiedad';
                    }    

                    $construction_year;

                    echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $assets.<br /> $construction_year.<br />";

                    break;

                case 'trastero':
                    $direction;
                    $cadastral_reference;
                    $value_entire_property = 'Valor de la totalidad del Trastero';

                    if ( $assets == 'bien ganancial' )
                    {
                            $assets_profit = 'bien ganancial';
                    } else {
                            $assets_privative = 'Bien Privativo % de la propiedad';
                    }

                    $construction_year;

                    $square_meter;

                    echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $assets.<br /> $construction_year.<br /> $square_meter.<br />";

                    break;

                case 'oficina' :
                    $direction;

                    $cadastral_reference;

                    $value_entire_property = 'Valor de la totalidad de la oficina';

                    if ( $assets == 'bien ganancial' )
                    {
                            $assets_profit = 'gien ganancial';
                    } else {
                            $assets_privative = 'bien privativo % de la propiedad';
                    }

                    $construction_year;

                    $square_meter;

                    $elevator;

                    $num_parking_spaces;

                    $meter_storage_room;

                    $store_epigraph_desc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';

                    echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $construction_year.<br /> $square_meter.<br /> $assets.<br /> "
                            . "$elevator.<br /> $num_parking_spaces.<br /> $meter_storage_room.<br /> $store_epigraph_desc.<br />";   

                    break;

                case 'local comercial' :
                    $direction;

                    $cadastral_reference;

                    $value_entire_property = 'Valor de la totalidad del local comercial';

                    if ( $assets == 'Bien Ganancial' )
                    {
                            $assets_profit = 'bien ganancial';
                    } else {
                            $assets_privative = 'bien privativo % de la propiedad';
                    }

                    $construction_year;

                    $square_meter;

                    $num_parking_spaces;

                    $meter_storage_room;

                    $store_epigraph_desc = 'preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';

                    echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br />  $assets.<br /> $construction_year.<br />"
                            . "> $square_meter.<br /> $num_parking_spaces.<br /> $meter_storage_room.<br /> $store_epigraph_desc.<br />";   

                    break;

                case $item == 'casa'|| $item == 'chalet' :
                    $direction;

                    $cadastral_reference;

                    $value_entire_property = 'Valor de la totalidad del casa/chalet';

                    if ( $assets == 'Bien Ganancial' )
                    {
                            $assets_profit = 'bien ganancial';
                    } else {
                            $assets_privative = 'bien privativo % de la propiedad';
                    }

                    $construction_year;

                    if($access_road == 'Carretera Princical' || $access_road == 'Via Afaltada' || $access_road == 'Camino sin Afaltar')
                    {
                            $roads = $access_road;
                    } else { 
                            $roads = 'sin indicar';
                    }

                    $square_meter = 'colocar tabla o desplegable para metros por plantas';

                    $meter_terrain = 'metros de finca/terreno';

                    $meter_annex = 'metros de anexos tambien indicar los metros de uso por tabla o preguntas';

                    echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $construction_year.<br /> $square_meter.<br /> $assets.<br />"
                            . "$roads.<br /> $square_meter.<br /> $meter_terrain.<br /> $meter_annex.<br />";   

                    break;

                case 'finca rustica' :
                    $province = 'Provincia';

                    $city_hall = 'Ayuntamiento'; 

                    $place = 'Lugar'; 

                    $land_name = 'nombre de la finca si la tiene es opcional'; 

                    $cadastral_reference;

                    $value_entire_property = 'Valor de la totalidad de la finca rustica';

                    if ( $assets == 'Bien Ganancial' )
                    {
                            $assets_profit = 'bien ganancial';
                    } else {
                            $assets_privative = 'Bien Privativo % de la propiedad';
                    }

                    $square_meter;

                    if ( $type_place == 'prado' || $type_place == 'huerta' || $type_place == 'viña' || $type_place == 'monte' )
                    {
                        $type=$type_place;
                    }

                    $store_epigraph_desc = 'preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';

                    echo "$province.<br /> $city_hall.<br /> $place.<br />$land_name.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $assets.<br />"
                            ."$type.<br /> $square_meter.<br /> $store_epigraph_desc.<br />";   

                    break;  

                case $item == 'terreno Urbano' || $item == 'terreno Urbanizable' :
                    $province = 'Provincia';

                    $city_hall = 'Ayuntamiento'; 

                    $place = 'Lugar'; 

                    $cadastral_reference;

                    $value_entire_property = 'Valor de la totalidad del terreno';

                    if ( $assets == 'bien ganancial' )
                    {
                            $assets_profit = 'bien ganancial';
                    } else {
                            $assets_privative = 'bien privativo % de la propiedad';
                    }

                    $square_meter;

                    $store_epigraph_desc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';

                    echo "$province.<br /> $city_hall.<br /> $place.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $assets.<br />"
                            ."$square_meter.<br /> $store_epigraph_desc.<br />"; 

                    break; 

                case 'construccion industrial' :
                    $direction; 

                    $cadastral_reference;

                    $value_entire_property = 'Valor de la totalidad de la nave';

                    if ( $assets == 'Bien Ganancial' )
                    {
                            $assets_profit = 'Bien Ganancial';
                    } else {
                            $assets_privative = 'Bien Privativo % de la propiedad';
                    }

                    $construction_year;

                    if ( $access_road == 'Carretera Princical' || $access_road == 'Via Afaltada' || $access_road == 'Camino sin Afaltar' )
                    {
                            $roads = $access_road;
                    }

                    $square_meter;

                    $meter_terrain = 'metros de finca/terreno';

                    $meter_annex = 'metros de anexos tambien indicar los metros de uso por tabla o preguntas';

                    $store_epigraph_desc = 'preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';

                    echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $assets.<br /> $construction_year.<br /> $square_meter.<br />"
                            . "$meter_terrain.<br /> $meter_annex.<br /> $store_epigraph_desc.<br />";   

                    break; 

                default :
                    $item = false;

                    echo 'no a selecionado nada';    
            }
        
        
    }
    
    static function Bank_account_or_deposit ( $object )
    {
        var_dump($object);
        
        $bank_entity = 'Entidad Bancaria';

        $iban = 'iban';

        $balance_date = 'Saldo a fecha fallecimiento';

        if ( $assets == 'bien ganancial' )
        {
                $assets_profit = 'bien ganancial';
                echo "$assets_profit.<br />";
        } else {
                $assets_privative = 'bien privativo % de la propiedad';
                echo "$assets_privative.<br />";
        }

        $country = 'pais a los efectos de que si son c/c o imposiciones en la zona sepa se declaran en el apartado C y si son de fuera se declaran en el G'; 

        echo "$bank_entity.<br /> $iban.<br /> $balance_date.<br /> $country.<br />";
    }

}
