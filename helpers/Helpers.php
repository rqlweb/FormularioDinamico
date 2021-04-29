<?php

class Helpers {
    
    const CASADO= array('regimen','spouse_name','spouse_date_birth');
    
    const PISO=0;
    const PLAZA_GARAJE=3;
    const TRASTERO=2;
    const OFICINA=1;
    const LOCAL_COMERCIAL=4;
    const CASA=5;
    const CHALET=6;
    const FINCA_RUSTICA=7;
    const TERRENO_URBANO=8;
    const TERRENO_URBANIZABLE=9;
    const CONSTRUCIONES_INDUSTRIALES=10;

    //comprobacion ternaria con doble condicion
    //(!empty($type) ? $type :($type='autonomo individual' ? $type : false )
    //funcion para el enrutador 
    static function Process_Form($status){
        $casado=$this->Civil_status($status);
        var_dump($casado);  
    }
    // SECCION A) DATOS PERSONALES DEL FALLECIDO:
    static function Civil_status ( $object ){
        
       $contador_error=0;
        //revisar el envio de un objeto que fue convertido de JSON
       //$form = json_decode($objet,true);
       //var_dump($object);
       //$status=$object["estado_civil"];
       //var_dump($status);
       //$regimen=$object["regimen"];

            if( !empty($object))
            {
                switch ($object) 
                {
                    case 'casado':
                        //if ( !empty( $regimen) ? $regimen : false )
                        //{  
//                            $regimen;
//                            $spouse_name= 'Nombre y Apellido del Conyuge';  
//                            $spouse_date_birth ='Fecha de Nacimiento';    
                            
                            return self::CASADO;
                        //}
                        //else
                        //{
                            //$contador_error++;
                            // echo "debe estar elegido el regimen $contador_error";
                        //}
                        break; 

                    case 'pareja de hecho':                           
                        $spouse_name = 'Nombre y Apellido del Conyuge';
                        $spouse_date_birth ='Fecha de Nacimiento';                        
                        echo "$spouse_name.</br> $spouse_date_birth.</br>";
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
                    echo "$self_employed_ind.</br> $epigrafe.</br> $desc_epigrafe.</br> $trade_name.</br>"; 
                    break;

                case $business && ((!empty($type)) ? $type == 'autonomo con sociedad' : false ) :   
                    $self_employed_soc = $type;
                    echo "$self_employed_soc.</br>";
                    break;

                default :
                    $business='NO';
                    echo "$business.</br>";
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
        
        if( !empty($parentesco))
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
        
        if(!empty($patrimonial))
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
        
        //var_dump($object);
        //variable segun el indice del objeto de arrays
        $type_property= $object[2]['step_c']['type_property'];
        $assets=$type_property[0]['bien'];
        $store_epigraph=$object[0]['step_a']["tipo_autonomo"];
        //var_dump($store_epigraph);
      
//          //variables globales 
            $cadastral_reference = 'Referencia catastral';
            $value_entire_property;
            $construction_year = 'Año de construccion';
            $square_meter = 'indicar los metros cuadrados';
            $elevator = "Elevador";
            $num_parking_spaces = 'indicar numero de plazas';
            $meter_storage_room = 'metros del trastero';
            $access_road = 'via de acceso';
            $type_place = 'tipo de lugar';
          
            if(array_search('piso', array_column($type_property, 'type')) == self::PISO)
            {

                if (!empty($assets))
                {     
                    if($assets == 'bien privativo' || $assets == 'bien ganancial')
                    {
                     
                        $type=$type_property[0]['type'];

                        $direction = $type_property[0]['direccion'];

                        $cadastral_reference = $type_property[0]['rfe_catastral'];

                        $$assets = $type_property[0]['bien'];

                        $value_entire_property = $type_property[0]['valor_total'];   

                        $construction_year;

                        $square_meter;

                        $elevator;

                        $num_parking_spaces;

                        $meter_storage_room;

                        echo "$type.</br> $direction.</br> $cadastral_reference.</br> $value_entire_property.</br> $construction_year.</br> $square_meter.</br> $assets.</br>"
                                . "$elevator.</br> $num_parking_spaces.</br> $meter_storage_room.</br>";  

                    }else{
                        $contador_error++;
                        echo "no coincide con las opciones $contador_error";
                    }
                }else
                    {
                        $contador_error++;
                        echo "debe estar elegido el tipo de Bien $contador_error";
                    }
            }
            
            if( array_search('plaza garaje', array_column($type_property, 'type')) == self::PLAZA_GARAJE)
            {
                if (!empty($assets))
                {
                    if($assets == 'bien privativo' || $assets == 'bien ganancial')
                    {
                        $direction;

                        $cadastral_reference;

                        $value_entire_property = 'Valor de la totalidad de la plaza de garaje';

                        $assets;

                        $construction_year;

                        echo "$direction.</br> $cadastral_reference.</br> $value_entire_property.</br> $assets.</br> $construction_year.</br>";
                        
                     }else{
                        $contador_error++;
                        echo "no coincide con las opciones $contador_error";
                    }  
                }
                else{
                    $contador_error++;
                    echo "debe estar elegido el tipo de Bien $contador_error";         
                }    
      
            }

            if( array_search('trastero', array_column($type_property, 'type'))== self::TRASTERO )
            {
                if (!empty($assets))
                {
                    if($assets == 'bien privativo' || $assets == 'bien ganancial')
                    {
                        
                        $direction;

                        $cadastral_reference;

                        $value_entire_property = 'Valor de la totalidad del Trastero';

                        $assets;

                        $construction_year;

                        $square_meter;

                        echo "$tyoe.</br> $direction.</br> $cadastral_reference.</br> $value_entire_property.</br> $assets.</br> $construction_year.</br> $square_meter.</br>";
      
                     }else{
                        $contador_error++;
                        echo "no coincide con las opciones $contador_error";
                    }  
                }
                else{
                    $contador_error++;
                    echo "debe estar elegido el tipo de Bien $contador_error";         
                }                     
            }        

            if( array_search('oficina', array_column($type_property, 'type')) == self::OFICINA )
            {
                if (!empty($assets))
                {
                    if($assets == 'bien privativo' || $assets == 'bien ganancial')
                    {
                        $type=$type_property[1]['type'];
                        
                        $direction=$type_property[1]['direccion'];

                        $cadastral_reference;

                        $value_entire_property = 'Valor de la totalidad de la oficina';

                        $assets;

                        $construction_year;

                        $square_meter;

                        $elevator;

                        $num_parking_spaces;

                        $meter_storage_room;
                        
                        if(!empty($store_epigraph)&& $store_epigraph =='autonomo individual'){
                          $store_epigraph_desc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
                          echo $store_epigraph_desc."</br>";
                        }
                        
                        echo "$direction.</br> $cadastral_reference.</br> $value_entire_property.</br> $construction_year.</br> $square_meter.</br> $assets.</br> "
                                . "$elevator.</br> $num_parking_spaces.</br> $meter_storage_room.</br>";   
                     }else{
                        $contador_error++;
                        echo "no coincide con las opciones $contador_error";
                    }  
                }
                else{
                    $contador_error++;
                    echo "debe estar elegido el tipo de Bien $contador_error";         
                }     
            }        

            if( array_search('local comercial', array_column($type_property, 'type')) == self::LOCAL_COMERCIAL)
            {
                if (!empty($assets))
                {
                    if($assets == 'bien privativo' || $assets == 'bien ganancial')
                    {
                        $direction;

                        $cadastral_reference;

                        $value_entire_property = 'Valor de la totalidad del local comercial';

                        $assets;

                        $construction_year;

                        $square_meter;

                        $num_parking_spaces;

                        $meter_storage_room;

                        if(!empty($store_epigraph)&& $store_epigraph =='autonomo individual'){
                          $store_epigraph_desc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
                          echo $store_epigraph_desc."</br>";
                        }
                        echo "$direction.</br> $cadastral_reference.</br> $value_entire_property.</br>  $assets.</br> $construction_year.</br>"
                            . "> $square_meter.</br> $num_parking_spaces.</br> $meter_storage_room.</br>";   
                    }else{
                        $contador_error++;
                        echo "no coincide con las opciones $contador_error";
                    }  
                }
                else{
                    $contador_error++;
                    echo "debe estar elegido el tipo de Bien $contador_error";         
                }  
            }  
            
            if( array_search('casa', array_column($type_property, 'type')) == self::CASA )
            {
                if (!empty($assets))
                {
                    if($assets == 'bien privativo' || $assets == 'bien ganancial')
                    {
                        $direction;

                        $cadastral_reference;

                        $value_entire_property = 'Valor de la totalidad de la casa';

                        $assets;

                        $construction_year;
                        
                        if($access_road == 'Carretera Princical' || $access_road == 'Via Afaltada' || $access_road == 'Camino sin Afaltar')
                        {
                                $roads = $access_road;
                        }else { 
                                $contador_error++;
                                $roads = 'sin indicar';
                        }

                        $square_meter;

                        $meter_terrain = 'metros de finca/terreno';

                        $meter_annex = 'metros de anexos tambien indicar los metros de uso por tabla o preguntas';

                        echo "$direction.</br> $cadastral_reference.</br> $value_entire_property.</br> $construction_year.</br> $square_meter.</br> $assets.</br>"
                                . "$roads.</br> $square_meter.</br> $meter_terrain.</br> $meter_annex.</br>";   
                    }else{
                        $contador_error++;
                        echo "no coincide con las opciones $contador_error";
                    }  
                }
                else{
                    $contador_error++;
                    echo "debe estar elegido el tipo de Bien $contador_error";         
                }
            }    
  
            if( array_search('chalet', array_column($type_property, 'type')) == self::CHALET)
            {
                if (!empty($assets))
                {
                    if($assets == 'bien privativo' || $assets == 'bien ganancial')
                    {
                        $direction;

                        $cadastral_reference;

                        $value_entire_property = 'Valor de la totalidad del chalet';

                        $assets;

                        $construction_year;
                        
                        if($access_road == 'Carretera Princical' || $access_road == 'Via Afaltada' || $access_road == 'Camino sin Afaltar')
                        {
                                $roads = $access_road;
                        }else { 
                                $contador_error++;
                                $roads = 'sin indicar';
                        }

                        $square_meter;

                        $meter_terrain = 'metros de finca/terreno';

                        $meter_annex = 'metros de anexos tambien indicar los metros de uso por tabla o preguntas';

                        echo "$direction.</br> $cadastral_reference.</br> $value_entire_property.</br> $construction_year.</br> $square_meter.</br> $assets.</br>"
                                . "$roads.</br> $square_meter.</br> $meter_terrain.<br /> $meter_annex.</br>";   
                    }else{
                        $contador_error++;
                        echo "no coincide con las opciones $contador_error";
                    }  
                }
                else{
                    $contador_error++;
                    echo "debe estar elegido el tipo de Bien $contador_error";         
                }
            } 

            if( array_search('finca rustica', array_column($type_property, 'type')) == self::FINCA_RUSTICA)
            {       
                if (!empty($assets))
                {
                    if($assets == 'bien privativo' || $assets == 'bien ganancial')
                    {
                        $province = 'Provincia';

                        $city_hall = 'Ayuntamiento'; 

                        $place = 'Lugar'; 

                        $land_name = 'nombre de la finca si la tiene es opcional'; 

                        $cadastral_reference;

                        $value_entire_property = 'Valor de la totalidad de la finca rustica';

                        $assets;
                        
                        $square_meter;
                        
                        if ( $type_place == 'prado' || $type_place == 'huerta' || $type_place == 'viña' || $type_place == 'monte' )
                        {
                               $type_place;
                        }else { 
                                $contador_error++;
                                $type_place='sin indicar';
                        }

                        if(!empty($store_epigraph)&& $store_epigraph =='autonomo individual'){
                          $store_epigraph_desc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
                          echo $store_epigraph_desc."</br>";
                        }
                        echo "$province.</br> $city_hall.</br> $place.<br />$land_name.</br> $cadastral_reference.</br> $value_entire_property.</br> $assets.</br>"
                            ."$type_place.</br> $square_meter.</br>";   
                    }else{
                        $contador_error++;
                        echo "no coincide con las opciones $contador_error";
                    }  
                }
                else{
                    $contador_error++;
                    echo "debe estar elegido el tipo de Bien $contador_error";         
                }
   
            }           

            if( array_search('terreno urbano', array_column($type_property, 'type')) == self::TERRENO_URBANO  || array_search('terreno urbanizable', array_column($type_property, 'type')) == self::TERRENO_URBANIZABLE )
            {
                if (!empty($assets))
                {
                    if($assets == 'bien privativo' || $assets == 'bien ganancial')
                    {
                        $province = 'Provincia';

                        $city_hall = 'Ayuntamiento'; 

                        $place = 'Lugar'; 

                        $cadastral_reference;

                        $value_entire_property = 'Valor de la totalidad del terreno';

                        $assets;
                        
                        $square_meter;
                        
                        if(!empty($store_epigraph)&& $store_epigraph =='autonomo individual'){
                          $store_epigraph_desc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
                          echo $store_epigraph_desc."</br>";
                        }

                        echo "$province.</br> $city_hall.</br> $place.</br> $cadastral_reference.</br> $value_entire_property.</br> $assets.</br>"
                            ."$square_meter.</br>"; 
                    }else{
                        $contador_error++;
                        echo "no coincide con las opciones $contador_error";
                    }  
                }
                else{
                    $contador_error++;
                    echo "debe estar elegido el tipo de Bien $contador_error";         
                }
   
            }

            if( array_search('construciones industriales', array_column($type_property, 'type'))== self::CONSTRUCIONES_INDUSTRIALES )
            {
                 if (!empty($assets))
                {
                    if($assets == 'bien privativo' || $assets == 'bien ganancial')
                    {
                        $direction;

                        $cadastral_reference;

                        $value_entire_property = 'Valor de la totalidad de la nave';

                        $assets;

                        $construction_year;
                        
                        if ( $access_road == 'Carretera Princical' || $access_road == 'Via Afaltada' || $access_road == 'Camino sin Afaltar' )
                        {
                               $$access_road;
                        }else { 
                                $contador_error++;
                                $access_road='sin indicar';
                        }

                        $square_meter;

                        $meter_terrain = 'metros de finca/terreno';

                        $meter_annex = 'metros de anexos tambien indicar los metros de uso por tabla o preguntas';

                        if(!empty($store_epigraph)&& $store_epigraph =='autonomo individual'){
                          $store_epigraph_desc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
                          echo $store_epigraph_desc."</br>";
                        }

                        echo "$direction.</br> $cadastral_reference.</br> $value_entire_property.</br> $assets.</br> $construction_year.</br> $square_meter.</br>"
                            . "$meter_terrain.</br> $meter_annex.</br>";   
                    }else{
                        $contador_error++;
                        echo "no coincide con las opciones $contador_error";
                    }  
                }
                else{
                    $contador_error++;
                    echo "debe estar elegido el tipo de Bien $contador_error";         
                }
            }        
    }
    
    static function Bank_account_or_deposit ( $object )
    {
        //var_dump($object);
        $contador_error=0;    
        $account=$object[2]['step_c']['cuenta'];
        $assets=$account[0]['bien'];
        //var_dump($account);
 
        if (!empty($assets))
        {
            if($assets == 'bien privativo' || $assets == 'bien ganancial')
            {
                $bank_entity = $account[0]['entidad'];

                $iban = $account[0]['iban'];

                $balance_date = $account[0]['saldo']; 
                
                $assets;
                
                $country = $account[0]['pais'];
                
                echo "$bank_entity.</br> $iban.</br> $balance_date.</br> $assets.</br> $country.</br>";
            }else{
                $contador_error++;
                echo "no coincide con las opciones $contador_error";
            }  
        }
        else{
            $contador_error++;
            echo "debe estar elegido el tipo de Bien $contador_error";         
        }      
    }
    
    static function Actions_or_part ( $object )
    {
        //var_dump($object);
        $contador_error=0;    
        $account=$object[2]['step_c']['acciones'];
        $assets=$account[0]['bien'];
        $quotation=$account[0]['cotiza'];
        $audited_balance=$account[0]['audited'];
        //var_dump($audited_balance);
        if ( !empty($assets) && !empty($quotation) )    
        {
            if($assets == 'bien privativo' || $assets == 'bien ganancial')
            {
                $entity = 'entidad';

                $num_actions = 'numero de acciones';

                $assets;

                if ($quotation == 'si')
                {
                    $price_quotation = 'valor total de cotizacion al momento de fallecer '.$account[0]['importe_pat'];
                    echo "$entity.</br> $num_actions.</br> $assets.</br> $price_quotation.<br />";   
                }else if($quotation == 'no')
                {
                        if( !empty($audited_balance))
                        {
                            if ( $audited_balance == 'si' ) 
                            {
                                    $equity_amount = 'Importe del patrimonio neto de la sociedad '.$account[0]['valor_neto'];
                                    echo "$entity.</br> $num_actions.</br> $assets.</br> $equity_amount.</br>";  
                            }else { 
                                    $nominal_value = 'Valor nominal de las acciones del fallecido '.$account[0]['valor_nominal'];

                                    $perc_part_capital = 'porcentaje de participación en el capital social '.$account[0]['porcentaje'];

                                    $result_profit_loss = [
                                        'approvedExOne' => $account[0]['resultado_uno'],
                                        'approvedExTwo' => $account[0]['resultado_dos'],
                                        'approvedExThree' => $account[0]['resultado_tres']];

                                    $equity_amount = 'Importe del patrimonio neto de la sociedad '.$account[0]['importe_neto'];
                                    echo "$entity.</br> $num_actions.</br> $assets.</br> $nominal_value.</br> $perc_part_capital.</br> $equity_amount</br>";
                                    print_r($result_profit_loss);
                            }
                        }else{
                            $contador_error++;
                            echo "debe estar elegido $contador_error";
                        }
                }else{
                  echo 'no se indica si cotiza o no';  
                }            
                        
            }else{
                    $contador_error++;
                    echo "no coincide con las opciones $contador_error";
                }  
            }
        else{
            $contador_error++;
            echo "debe estar elegido el tipo de Bien y si cotiza $contador_error";         
        } 
    }

}
