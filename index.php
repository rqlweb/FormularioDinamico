
<?php

//require_once 'controllers/formularioControllers.php';
//
//$datosFallecido=new formularioControllers();
//
//$datosFallecido->showForm();

//Objeto Json para seccion A datos personales
//$data = json_decode(file_get_contents('php://input'), true);

require 'helpers/Helpers.php';

require_once 'views/datosFallecido.php';

//$formulario_a = '{
//    "dni":"1234567-1",
//    "fecha_fallecimiento":"17-03-2014",
//    "nombre_apellido":"Pedro Perez",
//    "estado_civil":"casado",
//    "regimen":"ganacial",
//    "domicilio":"pontevedra calle 18",
//    "negocio":"si",
//    "tipo_autonomo":"autonomo con sociedad"
//}';

//Comprobaciones para el primera seccion del formulario los parametros
$estadocivil=$_REQUEST['civilstatus'];
$patrimonio=$_REQUEST['patrimonio'];

if(!empty($estadocivil)){

   echo Helpers::Process_Form($estadocivil)."</br>";
                     
}else{
    echo 'el objeto de la seccion A esta vacio o nulo';
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
               echo Helpers::Deceased_kinship($formulario_b_dcd)."</br>";
               
               echo Helpers::Patrimonial_value($formulario_b_dcd)."</br>";
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
        "type_property":[
                {
                "type":"piso",
                "direccion":"calle cero pontevedra",
                "rfe_catastral":"1234567  AB1234A",
                "bien":"bien ganancial",
                "valor_total": 40000
                },
                {
                "type":"oficina",
                "direccion":"calle dos pontevedra",
                "rfe_catastal":"1234567  AB1234A",
                "valor_total": 300000,
                "bien":"bien privativo",
                "epigafe":"Seccion 3:022",
                "desc_epig":"Bailarines"
                }],
        "cuenta":[{
                "entidad":"Abanca",
                "iban":"1234534242424",
                "saldo":30000,
                "bien":"bien ganancial",
                "pais":"España"
                }],
        "acciones":[{
                "entidad":"Bankia",
                "num_acciones":200,
                "bien":"bien ganancial",
                "cotiza":"no",
                "importe_pat":25000,
                "audited":"si",
                "valor_neto":18000,
                "valor_nominal":20000,
                "porcentaje":"30%",
                "resultado_uno":1900,
                "resultado_dos":2000,
                "resultado_tres":4000,
                "importe_neto":10000}]
        }        
    }]';

//Comprobaciones para la segunda seccion del formulario 
if(!empty($formulario_b_and_c))
    {
    
        // DECODING OBJECTO TO PHP
        if($formulario_c_dcd = json_decode($formulario_b_and_c, true)){
            
            $property=$formulario_c_dcd[2]['step_c']['type_property'];
            
            
            if(!empty($property))
            {               
                 echo Helpers::Property($formulario_c_dcd)."</br>";
            }
            
            $bank=$formulario_c_dcd[2]['step_c']['cuenta'];
        
            if(!empty($bank))
            {
                echo Helpers::Bank_account_or_deposit($formulario_c_dcd)."</br>";
            }
            
            $actions=$formulario_c_dcd[2]['step_c']['acciones'];
            //var_dump($actions);
            if(!empty($actions))
            {
                echo Helpers::Actions_or_part($formulario_c_dcd)."</br>";
            }
         
        }else{
            echo 'el objeto de la seccion C esta vacio o nulo';
        }   
    }


//Funcion para el controlador
function Inheritance_assets($option){
    switch ($option){
        
    }
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



