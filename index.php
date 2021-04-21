
<?php

//require_once 'controllers/formularioControllers.php';
//
//$datosFallecido=new formularioControllers();
//
//$datosFallecido->showForm();


// SECCION A) DATOS PERSONALES DEL FALLECIDO:
function Civil_status ( $status )
{
    //Variables globales
    $spouse_name='Nombre y Apellido del Conyuge';
    
    $spouse_date_birth='Fecha de Nacimiento';
    
    $single='Soltero';
    
    $ex_spouse_name='Nombre y Apellido del Exconyuge';
        
    switch ($status) 
    {
    case 'Casado':
        //Declaramos Variables
        $regimen = [
            'communityP' => 'Gananciales',
            'separationP' => 'Separacion de Bienes',
        ];
        $spouse_name;
        
        $spouse_date_birth;   
        
        echo "{$regimen['communityP']}.<br /> {$regimen['separationP']}.<br /> $spouse_name.<br /> $spouse_date_birth.<br />";
        break;
    
    case 'Pareja de Hecho':   
        $spouse_name;
        
        $spouse_date_birth;
        
        echo "$spouse_name.<br /> $spouse_date_birth.<br />";
        break;
    
    case 'Soltero':   
        $single;
        
        echo $single;
        break;
    
    case 'Viudo':   
        $spouse_name;
        
        echo $spouse_name;
        break;
    
    case 'Divorciado':   
        $spouse_name;
        
        echo $ex_spouse_name;
        break;
    }
}
Civil_status("Casado")."<br />";

function Have_business ( $option , $self_employed )
{   
   switch (true) 
    {
        case $option && ( $self_employed == 'Autonomo Individual' ) :
            $epigrafe = 'Epígrafe IAE'; 
            
            $desc_epigrafe = 'Descripción epígrafe';
            
            $trade_name = 'Nombre comercial';
            
            echo "$self_employed.<br /> $epigrafe.<br /> $desc_epigrafe.<br /> $trade_ame.<br />"; 
            break;
        
        case $option && ( $self_employed == 'Autonomo con Sociedad' ) :   
            $self_employed_soc = $self_employed;
            
            echo "$self_employed_soc.<br />";
            break;
        
        default :
            $option=false;
            echo 'No';
            break;
    }
}   

haveBusines(true,'Autonomo Individual');

//B) DATOS PERSONALES HEREDEROS

function Deceased_kinship ( $option )
{
    
    switch ($option)
    {
        case 'Conyuge' :   
            $spouse = 'Conyuge';
            echo $spouse;
            break;
        
        case 'Pareja de Hecho' :   
            $partner = 'Pareja de Hecho';
            echo $partner;
            break;
        
        case $option == 'Hijo' || $option == 'Hija' :   
            $children = $option;
            echo $children;
            break;
        
        case $option =='Nieto' || $option=='Nieta' :   
            $grandchild = $option;
            echo $grandchild;
            break;
        
        case $option == 'Padre' || $option == 'Madre' :   
            $parent = $option;
            echo $parent;
            break;
        
        case $option == 'Abuelo' || $option == 'Abuela' :   
            $grandparent = $option;
            echo $grandparent;
            break;
        
        case $option == 'Hermano' || $option == 'Hermana' :   
            $brotherSister = $option;
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
            $kinship = 'Especificar Parentesco';
    }
}

Deceased_kinship("");

function Patrimonial_value ( $patrimonial )
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
}

echo Patrimonial_value(34234772).".<br />";

//SECCION C) BIENES DE HERENCIA
function Property ( $option , $goods )
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
        
        case $option == 'piso' && $goods :
            $direction;
            
            $cadastral_reference;
            
            $value_entire_property = 'Valor de la totalidad del piso';
            
            if ( $goods == 'Bien Ganancial' )
            {
                    $goods_profit = 'Bien Ganancial';
            } else {
                    $goods_privative = 'Bien Privativo % de la propiedad';
            }
            
            $construction_year;
            
            $square_meter;
            
            $elevator;
            
            $num_parking_spaces;
            
            $meter_storage_room;
           
            echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $construction_year.<br /> $square_meter.<br /> $goods.<br />"
                    . "$elevator.<br /> $num_parking_spaces.<br /> $meter_storage_room.<br />";   
            
            break;
            
        case 'plaza garaje'&& $goods :
            $direction;
            
            $cadastral_reference;
            
            $value_entire_property = 'Valor de la totalidad de la plaza de garaje';
            
            if ( $goods == 'Bien Ganancial' )
            {
                    $goods_profit = 'Bien Ganancial';
            } else {
                    $goods_privative = 'Bien Privativo % de la propiedad';
            }    
            
            $construction_year;
            
            echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $goods.<br /> $construction_year.<br />";
            
            break;
            
        case 'trastero' && $goods:
            $direction;
            $cadastral_reference;
            $value_entire_property = 'Valor de la totalidad del Trastero';
            
            if ( $goods == 'Bien Ganancial' )
            {
                    $goods_profit = 'Bien Ganancial';
            } else {
                    $goods_privative = 'Bien Privativo % de la propiedad';
            }
            
            $construction_year;
            
            $square_meter;
            
            echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $goods.<br /> $construction_year.<br /> $square_meter.<br />";
            
            break;
        
        case 'oficina' && $goods :
            $direction;
            
            $cadastral_reference;
            
            $value_entire_property = 'Valor de la totalidad de la oficina';
            
            if ( $goods == 'Bien Ganancial' )
            {
                    $goods_profit = 'Bien Ganancial';
            } else {
                    $goods_privative = 'Bien Privativo % de la propiedad';
            }
            
            $construction_year;
            
            $square_meter;
            
            $elevator;
            
            $num_parking_spaces;
            
            $meter_storage_room;
            
            $store_epigraph_desc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
            
            echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $construction_year.<br /> $square_meter.<br /> $goods.<br /> "
                    . "$elevator.<br /> $num_parking_spaces.<br /> $meter_storage_room.<br /> $store_epigraph_desc.<br />";   
            
            break;
            
        case 'local comercial' && $goods :
            $direction;
            
            $cadastral_reference;
            
            $value_entire_property = 'Valor de la totalidad del local comercial';
            
            if ( $goods == 'Bien Ganancial' )
            {
                    $goods_profit = 'Bien Ganancial';
            } else {
                    $goods_privative = 'Bien Privativo % de la propiedad';
            }
            
            $construction_year;
            
            $square_meter;
            
            $num_parking_spaces;
            
            $meter_storage_room;
            
            $store_epigraph_desc = 'preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
            
            echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br />  $goods.<br /> $construction_year.<br />"
                    . "> $square_meter.<br /> $num_parking_spaces.<br /> $meter_storage_room.<br /> $store_epigraph_desc.<br />";   
            
            break;
            
        case $option == 'casa'|| $option == 'chalet' :
            $direction;
            
            $cadastral_reference;
            
            $value_entire_property = 'Valor de la totalidad del casa/chalet';
            
            if ( $goods == 'Bien Ganancial' )
            {
                    $goods_profit = 'Bien Ganancial';
            } else {
                    $goods_privative = 'Bien Privativo % de la propiedad';
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
           
            echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $construction_year.<br /> $square_meter.<br /> $goods.<br />"
                    . "$roads.<br /> $square_meter.<br /> $meter_terrain.<br /> $meter_annex.<br />";   
           
            break;
            
        case 'finca rustica' :
            $province = 'Provincia';
             
            $city_hall = 'Ayuntamiento'; 
            
            $place = 'Lugar'; 
            
            $land_name = 'nombre de la finca si la tiene es opcional'; 
            
            $cadastral_reference;
            
            $value_entire_property = 'Valor de la totalidad de la finca rustica';
              
            if ( $goods == 'Bien Ganancial' )
            {
                    $goods_profit = 'Bien Ganancial';
            } else {
                    $goods_privative = 'Bien Privativo % de la propiedad';
            }
            
            $square_meter;
            
            if ( $type_place == 'prado' || $type_place == 'huerta' || $type_place == 'viña' || $type_place == 'monte' )
            {
                $type=$type_place;
            }
            
            $store_epigraph_desc = 'preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
            
            echo "$province.<br /> $city_hall.<br /> $place.<br />$land_name.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $goods.<br />"
                    ."$type.<br /> $square_meter.<br /> $store_epigraph_desc.<br />";   
            
            break;  
            
        case $option == 'terreno Urbano' || $option == 'terreno Urbanizable' :
            $province = 'Provincia';
            
            $city_hall = 'Ayuntamiento'; 
            
            $place = 'Lugar'; 
            
            $cadastral_reference;
            
            $value_entire_property = 'Valor de la totalidad del terreno';
            
            if ( $goods == 'Bien Ganancial' )
            {
                    $goods_profit = 'Bien Ganancial';
            } else {
                    $goods_privative = 'Bien Privativo % de la propiedad';
            }
            
            $square_meter;
            
            $store_epigraph_desc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
            
            echo "$province.<br /> $city_hall.<br /> $place.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $goods.<br />"
                    ."$square_meter.<br /> $store_epigraph_desc.<br />"; 
            
            break; 
            
        case 'construccion industrial' :
            $direction; 
            
            $cadastral_reference;
            
            $value_entire_property = 'Valor de la totalidad de la nave';
            
            if ( $goods == 'Bien Ganancial' )
            {
                    $goods_profit = 'Bien Ganancial';
            } else {
                    $goods_privative = 'Bien Privativo % de la propiedad';
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
           
            echo "$direction.<br /> $cadastral_reference.<br /> $value_entire_property.<br /> $goods.<br /> $construction_year.<br /> $square_meter.<br />"
                    . "$meter_terrain.<br /> $meter_annex.<br /> $store_epigraph_desc.<br />";   
            
            break; 
            
        default :
            $option = false;
      
            echo 'no a selecionado nada';    
    }
}

 Property('piso','Bien Ganancial');

function bank_account_or_deposit ( $goods , $country )
{
    $bank_entity = 'Entidad Bancaria';
    
    $iban = 'iban';
    
    $balance_date = 'Saldo a fecha fallecimiento';
    
    if ( $goods == 'Bien Ganancial' )
    {
            $goods_profit = 'Bien Ganancial';
    } else {
            $goods_privative = 'Bien Privativo % de la propiedad';
    }
    
    $country = 'pais a los efectos de que si son c/c o imposiciones en la zona sepa se declaran en el apartado C y si son de fuera se declaran en el G'; 
    
    echo "$bank_entity.<br /> $iban.<br /> $balance_date.<br /> $goods.<br /> $country.<br />";
}

bankAccountOrDeposit(true, 'francia');

function Actions_or_part ( $quotation , $goods )
{
    $entity = 'entidad';
    
    $num_actions = 'numero de acciones';
    
    if ( $goods == 'Bien Ganancial' )
    {
            $goods_profit = 'Bien Ganancial';
    }else{
            $goods_privative = 'Bien Privativo % de la propiedad';
    }
    //Cotizan en bolsa    
    switch (true){
        //valor total de cotizacion
        case $quotation :
                $price_quotation = 'valor total de cotizacion al momento de fallecer';
        //Si el balance aprobado fué auditado    
        case $quotation == false :
            if ( $audited_balance ) 
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
            }   
    }
    
    echo "$entity.<br /> $num_actions.<br /> $quotation.<br /> $goods.<br />";
}

Actions_or_part(true,'Bien Ganancial');

function Bonds_or_obligations ( $goods , $bondsTrade )
{
    $entity = 'entidad';
    
    $num_values = 'numero de valores totales';
    
    if ( $goods == 'Bien Ganancial' )
    {
            $goods_profit = 'Bien Ganancial';
    } else {
            $goods_privative = 'Bien Privativo % de la propiedad';
    }
    $value_all_bonds = 'Valor de la totalidad de los bonos a fecha fallecimiento';
    
    if ( $bondsTrade ) 
    {
           $bondsTrade = 'Si'; 
    } else {
           $bondsTrade = 'No';
    }
}

function Inversion_funds ( $goods ) 
{
    $entity = 'entidad';
    
    $value_all_funds = 'Valor total del fondo de inversión a fecha fallecimiento';
    
    if ( $goods == 'Bien Ganancial' )
    {
            $goods_profit='Bien Ganancial';
    } else {
            $goods_privative='Bien Privativo % de la propiedad';
    }
}

function Vehicles ( $goods )
{
    $brands = 'marca';
    
    $model = 'modelo';
    
    $date_registration = 'Fecha de la primera matriculación';
    
    $license_plate = 'matricula';
    
    $frame_number = 'Número de bastidor';
    
    if ( $goods == 'Bien Ganancial' )
    {
            $goods_profit = 'Bien Ganancial';
    } else {
            $goods_privative = 'Bien Privativo % de la propiedad';
    } 
    
    $value_vehicle = 'Valor de la totalidad del vehículo'; 
    
    $store_epigraph_desc = 'preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
    
    echo "$brands.<br /> $model.<br /> $date_registration.<br /> $license_plate.<br /> $frame_number.<br /> $goods.<br /> $value_vehicle.<br />"
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



