
<?php

//require_once 'controllers/formularioControllers.php';
//
//$datosFallecido=new formularioControllers();
//
//$datosFallecido->showForm();

//Objeto Json para seccion A datos personales

require 'helpers/Helpers.php';

$formulario_a = '{
    "dni":"1234567-1",
    "fecha_fallecimiento":"17-03-2014",
    "nombre_apellido":"Pedro Perez",
    "estado_civil":"casado",
    "regimen":"ganacial",
    "domicilio":"pontevedra calle 18",
    "negocio":"si",
    "tipo_autonomo":"autonomo con sociedad"
}';

//Comprobaciones para el primera seccion del formulario 
if(!empty($formulario_a)){
    
        // DECODING OBJECTO TO PHP
        if($formulario_a_dcd = json_decode($formulario_a,true)){
               //var_dump($formulario_a_dcd);    
               echo Helpers::Civil_status($formulario_a_dcd);
               
               echo Helpers::Have_business($formulario_a_dcd);
        }
        else{
            echo 'el objeto de la seccion A esta vacio o nulo';
        }   
}

$formulario_a_and_b = '[
    {
      "step_a":{
        "dni":"1234567-1",
        "fecha_fallecimiento":"17-03-2014",
        "nombre_apellido":"Pedro Perez",
        "estado_civil":"pareja de hecho",
        "domicilio":"pontevedra calle 18",
        "negocio":"si",
        "tipo_autonomo":"autonomo individual"
       }
    },
    {
      "step_b":{
       "dni":"1234567-1",
       "nombre_heredero":"Elonk Musk",
       "parentesco_fallecido":"Hijo",
       "patrimonio":400000
       }
    }]';

//Comprobaciones para la segunda seccion del formulario 
if(!empty($formulario_a_and_b)){
    
        // DECODING OBJECTO TO PHP
        if($formulario_b_dcd = json_decode($formulario_a_and_b, true)){
               //var_dump($formulario_a_dcd);    
               echo Helpers::Deceased_kinship($formulario_b_dcd);
               
               echo Helpers::Patrimonial_value($formulario_b_dcd);
        }
        else{
            echo 'el objeto de la seccion B esta vacio o nulo';
        }   
}

$formulario_b_and_c = '[
    {
      "step_a":{
        "dni":"1234567-1",
        "fecha_fallecimiento":"17-03-2014",
        "nombre_apellido":"Pedro Perez",
        "estado_civil":"pareja de hecho",
        "domicilio":"pontevedra calle 18",
        "negocio":"si",
        "tipo_autonomo":"autonomo individual"
       }
    },
    {
      "step_b":{
        "dni":"1234567-1",
        "nombre_heredero":"Elonk Musk",
        "parentesco_fallecido":"Hijo",
        "patrimonio":400000
       }
    },
    {
      "step_c":{
        "inmueble":[
        {"name":"piso","bien":"bien ganancial"},
        {"name":"casa","bien":"bien privativo"}
        ],
        "cuenta":[{name:"cuenta bancaria","bien":"bien ganancial", "pais":"España"}]
       }
    }]';

//Comprobaciones para la segunda seccion del formulario 
if(!empty($formulario_b_and_c))
    {
    
        // DECODING OBJECTO TO PHP
        if($formulario_c_dcd = json_decode($formulario_b_and_c, true)){
            
         echo Helpers::Property($formulario_c_dcd[2]["step_c"]["inmueble"]);
         
         echo Helpers::Bank_account_or_deposit($formulario_c_dcd[2]["step_c"]["cuenta"]);
         
         //            array_walk_recursive($option, function( $item,$key){
//      
//            echo "clave: $key y item: $item</br>";
//            
//                if($item=="inmueble")
//                {
//                    echo Helpers::Property($item);
//                }
////                else if($item=="cuenta bancaria"){
////                    echo Helpers::Bank_account_or_deposit($formulario_c_dcd[2]["step_c"]["tipo"]);
////              }
//                    
//             }); 
              
        }else{
            echo 'el objeto de la seccion B esta vacio o nulo';
        }   
    }


//Funcion para el controlador
function Inheritance_assets($option){
    switch ($option){
        
    }
}


function Property ( $option , $assets )
{
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
    
    switch ( $option )
    {
        
        case $option == 'piso' && $assets :
            $direction;
            
            $cadastral_reference;
            
            $value_entire_property = 'Valor de la totalidad del piso';
            
            if ( $assets == 'bien ganancial' )
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
            
        case 'plaza garaje'&& $assets :
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
            
        case 'trastero' && $assets:
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
        
        case 'oficina' && $assets :
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
            
        case 'local comercial' && $assets :
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
            
        case $option == 'casa'|| $option == 'chalet' :
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
            
        case $option == 'terreno Urbano' || $option == 'terreno Urbanizable' :
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
            $option = false;
      
            echo 'no a selecionado nada';    
    }
}



function bank_account_or_deposit ( $assets , $country )
{
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


function Actions_or_part ( $quotation , $assets )
{
    $entity = 'entidad';
    
    $num_actions = 'numero de acciones';
    
    if ( $assets == 'Bien Ganancial' )
    {
            $assets_profit = 'Bien Ganancial';
    }else{
            $assets_privative = 'Bien Privativo % de la propiedad';
    }
    //Cotizan en bolsa    
    switch (true){
        //valor total de cotizacion
        case $quotation :
                $price_quotation = 'valor total de cotizacion al momento de fallecer';
                break;
        //Si el balance aprobado fué auditado    
        case $quotation == false :
            if ( $audited_balance == 'si' ) 
            {
                    $equity_amount = 'Importe del patrimonio neto de la sociedad';
            } else { 
                    $nominal_value = 'Valor nominal de las acciones del fallecido';

                    $perc_part_capital = 'porcentaje de participación en el capital social';

                    $result_profit_loss = [
                        'approvedExOne' => 0,
                        'approvedExTwo' => 0,
                        'approvedExThree' => 0];

                    $equity_amount = 'Importe del patrimonio neto de la sociedad';
                    break;
            }   
    }
    
    echo "$entity.<br /> $num_actions.<br /> $quotation.<br /> $assets.<br />";
}


function Bonds_or_obligations ( $assets , $bondsTrade )
{
    $entity = 'entidad';
    
    $num_values = 'numero de valores totales';
    
    if ( $assets == 'Bien Ganancial' )
    {
            $assets_profit = 'Bien Ganancial';
    } else {
            $assets_privative = 'Bien Privativo % de la propiedad';
    }
    $value_all_bonds = 'Valor de la totalidad de los bonos a fecha fallecimiento';
    
    if ( $bondsTrade ) 
    {
           $bondsTrade = 'Si'; 
    } else {
           $bondsTrade = 'No';
    }
}

function Inversion_funds ( $assets ) 
{
    $entity = 'entidad';
    
    $value_all_funds = 'Valor total del fondo de inversión a fecha fallecimiento';
    
    if ( $assets == 'Bien Ganancial' )
    {
            $assets_profit='Bien Ganancial';
    } else {
            $assets_privative='Bien Privativo % de la propiedad';
    }
}

function Vehicles ( $assets )
{
    $brands = 'marca';
    
    $model = 'modelo';
    
    $date_registration = 'Fecha de la primera matriculación';
    
    $license_plate = 'matricula';
    
    $frame_number = 'Número de bastidor';
    
    if ( $assets == 'Bien Ganancial' )
    {
            $goods_profit = 'Bien Ganancial';
    } else {
            $goods_privative = 'Bien Privativo % de la propiedad';
    } 
    
    $value_vehicle = 'Valor de la totalidad del vehículo'; 
    
    $store_epigraph_desc = 'preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
    
    echo "$brands.<br /> $model.<br /> $date_registration.<br /> $license_plate.<br /> $frame_number.<br /> $assets.<br /> $value_vehicle.<br />"
            . "$store_epigraph_desc.<br />";
}

function Boats ( $goods )
{
    $brands = 'marca';
    
    $model = 'modelo';
    
    $construction_year = 'Año construcción';
    
    $license_plate = 'matricula';
    
    $value_boats = 'Valor de la totalidad de la embarcación'; 
    
    if ( $goods == 'Bien Ganancial' )
    {
            $goods_profit = 'Bien Ganancial';
    } else {
            $goods_privative = 'Bien Privativo % de la propiedad';
    }  
    echo "$brands.<br /> $model.<br /> $construction_year.<br /> $license_plate.<br /> $value_boats.<br /> $goods.<br /> ";  
}

function Business ()
{
    $epigraph = 'Epígrafe';
    
    $description_epig = 'Descripción del epígrafe';
    
    $commercial_name = 'Nombre comercial';
    
    $property_value = 'valor inmovilizados materiales ';
    
    $merchandise_value = 'Valor mercancías';
    
    $assets_value = ['assets' => 0];
    
    $value_last_declared = 'Valor del beneficio del último ejercicio declarado';
    
    echo"$epigraph.<br /> $description_epig.<br /> $commercial_name.<br /> $property_value.<br /> $merchandise_value.<br /> $assets_value.<br />";
}

function Others ( $goods ) 
{
    $descr_assets = 'Descripción del bien';
    
    $value_asset = 'Valor de la totalidad del bien';
    
    if ( $goods == 'Bien Ganancial' )
    {
             $goods_profit = 'Bien Ganancial';
    }else{
            $goods_privative = 'Bien Privativo % de la propiedad';
    } 
    echo "$descr_assets.<br /> $value_asset.<br /> $goods.<br />";     
}

function  Life_insurance ( $beneficiary )
{
    $insurance_entity = 'Entidad aseguradora';
    
    $policy_number = 'Número de póliza';
    
    $policy_date = 'Fecha de la póliza';
    
    $indem_amount = 'Importe indemnización';
    
    switch ( $beneficiary ) 
    {
        case 'Herederos legales':
                $legalHeirs=[];
                break;
        
        case 'Persona concreta':
                $concrPerson=[];
                break;  
            
        case 'Entidad bancaria':
                $bankEntity;
                break;    
    }
}

//SECCION D) DEUDAS 

function Mortgages ( $debts )
{
    $bank_entity = 'entidad Bancaria';
    
    $amount = 'Importe(capital pendiente a fecha de fallecimiento)';
    
        if ( $debts == 'Deuda Ganancial' )
        {
                $debtsProfit='Deuda Ganancial';
        } else {  
                $debtsPrivative='Deuda Privativo % de la propiedad';
        }
    
}

function Persona_loans ( $debts ) 
{
    $bankEntity = 'entidad Bancaria';
    
    $amount = 'Importe(capital pendiente a fecha de fallecimiento)';
    
        if ( $debts == 'Deuda Ganancial' ) 
        {
                $debts_profit = 'Deuda Ganancial';
        } else {
                $debts_privative = 'Deuda Privativo % de la propiedad';
        }
}

function Debts_administration ( $debts )
{
    $agency = 'Organismo';
    
    $amount = 'Importe total (deuda pendiente a fecha de fallecimiento)';
    
        if ( $debts == 'Deuda Ganancial' )
        {
                $debts_profit = 'Deuda Ganancial';     
        } else {
                $debts_privative = 'Deuda Privativo % de la propiedad';
        }
}

function Business_debts ( $debts )
{
    $creditor_name = 'Nombre/Razón social proveedor/acreedor';
    
    $amount = 'Importe total';
    
    if ( $debts == 'Deuda Ganancial' )
    {
            $debts_profit = 'Deuda Ganancial'; 
    } else { 
            $debts_privative = 'Deuda Privativo % de la propiedad';
    }
}

function Other_debts ( $debts )
{
    $descr_debt = 'Descripción de la deuda';
    
    $amount = 'Importe total';
    
     if ( $debts == 'Deuda Ganancial' )
     {
            $debts_profit = 'Deuda Ganancial';
     } else {
            $debts_privative = 'Deuda Privativo % de la propiedad';
     }
}

//SECCION G) GASTOS DEDUCIBLES

function Deductible_expenses ( $option )
{
    switch ( $option )
    {
        case 'Gastos de entierro y funeral' :
                $amount_funeral ='importe del funeral';
                break;    
        
        case 'Gastos de última enfermedad' :
                $amount_sickness = 'importe de enfermedad';
                break; 
        
        case 'Gastos por juicio o arbitraje por conflicto con la herencia' :
                $amount_legal = 'importes legales';
                break; 
    }
}

?>



