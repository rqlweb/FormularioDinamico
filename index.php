
<?php

//require_once 'controllers/formularioControllers.php';
//
//$datosFallecido=new formularioControllers();
//
//$datosFallecido->showForm();


// SECCION A) DATOS PERSONALES DEL FALLECIDO:
function civilStatus($status)
{
    //Variables globales
    $spouseName='Nombre y Apellido del Conyuge';
    $spouseDateBirth='Fecha de Nacimiento';
    $single='Soltero';
    $exSpouseName='Nombre y Apellido del Exconyuge';
        
    switch ($status) 
    {
    case 'Casado':
        //Declaramos Variables
        $regimen = [
            'communityP' => 'Gananciales',
            'separationP' => 'Separacion de Bienes',
        ];
        $spouseName;
        $spouseDateBirth;   
        echo "{$regimen['communityP']}.<br /> {$regimen['separationP']}.<br /> $spouseName.<br /> $spouseDateBirth.<br />";
        break;
    case 'Pareja de Hecho':   
        $spouseName;
        $spouseDateBirth;
        echo "$spouseName.<br /> $spouseDateBirth.<br />";
        break;
    
    case 'Soltero':   
        $single;
        echo $single;
        break;
    
    case 'Viudo':   
        $spouseName;
        echo $spouseName;
        break;
    
    case 'Divorciado':   
        $spouseName;
        echo $exSpouseName;
        break;
    }
}
civilStatus("Casado")."<br />";

function haveBusines($option,$selfEmployed)
{       
//    $selfEmployedInd='Autonomo Individual';
//    $selfEmployedSoc='Autonomo con Sociedad';
    
   switch (true) 
    {
        case $option && ($selfEmployed=='Autonomo Individual'):
            $epigrafe='Epígrafe IAE'; 
            $descEpigrafe='Descripción epígrafe';
            $tradeName='Nombre comercial';
            echo "$selfEmployed.<br /> $epigrafe.<br /> $descEpigrafe.<br /> $tradeName.<br />";
            break;
        case $option && ($selfEmployed=='Autonomo con Sociedad'):   
            $selfEmployedSoc;
            echo "$selfEmployed.<br />";
            break;
        default:
            $option=false;
            echo 'No';
            break;
    }
}   

haveBusines(true,'Autonomo Individual');

//B) DATOS PERSONALES HEREDEROS

function deceasedKinship($option){
    
    switch ($option){
        
        case 'Conyuge':   
            $spouse='Conyuge';
            echo $spouse;
            break;
        
        case 'Pareja de Hecho':   
            $partner='Pareja de Hecho';
            echo $partner;
            break;
        
        case $option=='Hijo' || $option=='Hija':   
            $children=$option;
            echo $children;
            break;
        
        case $option=='Nieto' || $option=='Nieta':   
            $grandchild=$option;
            echo $grandchild;
            break;
        
        case $option=='Padre' || $option=='Madre':   
            $parent=$option;
            echo $parent;
            break;
        
        case $option=='Abuelo' || $option=='Abuela':   
            $grandparent=$option;
            echo $grandparent;
            break;
        
        case $option=='Hermano' || $option=='Hermana':   
            $brotherSister=$option;
            echo $brotherSister;
            break;
        
        case 'Sobrino por Consanguinidad':   
            $nephewConsang='Sobrino por Consanguinidad';
            echo $nephewConsang;
            break;
        
        case 'Tio por Consanguinidad':   
            $uncleConsang='Tio por Consanguinidad';
            echo $uncleConsang;
            break;
        
        case 'Primo por Consanguinidad':   
            $cousinConsang='Primo por Consanguinidad';
            echo $cousinConsang;
            break;
        
        case 'Sin Parentesco':   
            $nokinship='Sin Parentesco';
            echo $cousinConsang;
            break;
        
        default :
            $kinship='Especificar Parentesco';
    }
}

deceasedKinship("");

function patrimonialValue($patrimonial){
        
    if($patrimonial<=402678.11) {
        return "Entre 0 y 402.678,11 euros";
    }
    if($patrimonial>402678.11 && $patrimonial<=2007380.43){
        return "De más de 402.678,12 euros hasta 2.007.380,43 euros";
    }
    if($patrimonial>2007380.43 && $patrimonial<=4020770.98){
        return "De más de 2.007.380,43 euros hasta 4.020.770,98 euros";
    }
    if($patrimonial>4020770.98){
        return "De más de 4.020.770,98 euros";
    }
}

echo patrimonialValue(34234772).".<br />";

//SECCION C) BIENES DE HERENCIA
function property($option, $goods){
    //variables globales 
    $direction='indicar direccion';
    $cadastralReference='Referencia catastral';
    $valueEntireProperty;
    $constructionYear='Año de construccion';
    $squareMeter='indicar los metros cuadrados';
    $goods;
    $elevator="Elevador";
    $numParkingSpaces='indicar numero de plazas';
    $meterStorageRoom='metros del trastero';
    $accessRoad='via de acceso';
    $typePlace='tipo de lugar';
    
    switch ($option){
        
        case $option=='piso' && $goods:
            $direction;
            $cadastralReference;
            $valueEntireProperty='Valor de la totalidad del piso';
                if($goods=='Bien Ganancial'){
                    $goodsProfit='Bien Ganancial';
                }else{
                    $goodsPrivative='Bien Privativo % de la propiedad';
                }
            $constructionYear;
            $squareMeter;
            $elevator;
            $numParkingSpaces;
            $meterStorageRoom;
            echo "$direction.<br /> $cadastralReference.<br /> $valueEntireProperty.<br /> $constructionYear.<br /> $squareMeter.<br /> $goods.<br />"
                    . "$constructionYear.<br /> $squareMeter.<br /> $elevator.<br /> $numParkingSpaces.<br /> $meterStorageRoom.<br />";   
            break;
            
        case 'plaza garaje'&& $goods:
            $direction;
            $cadastralReference;
            $valueEntireProperty='Valor de la totalidad de la plaza de garaje';
            $goods;
                if($goods=='Bien Ganancial'){
                    $goodsProfit='Bien Ganancial';
                }else{
                    $goodsPrivative='Bien Privativo % de la propiedad';
                }
            $constructionYear;
            echo "$direction.<br /> $cadastralReference.<br /> $valueEntireProperty.<br /> $goods.<br /> $constructionYear.<br />";
            break;
            
        case 'trastero' && $goods:
            $direction;
            $cadastralReference;
            $valueEntireProperty='Valor de la totalidad del Trastero';
            $goods;
                if($goods=='Bien Ganancial'){
                    $goodsProfit='Bien Ganancial';
                }else{
                    $goodsPrivative='Bien Privativo % de la propiedad';
                }
            $constructionYear;
            $squareMeter;
            echo "$direction.<br /> $cadastralReference.<br /> $valueEntireProperty.<br /> $goods.<br /> $constructionYear.<br /> $squareMeter.<br />";
            break;
        
        case 'oficina' && $goods:
            $direction;
            $cadastralReference;
            $valueEntireProperty='Valor de la totalidad de la oficina';
            $goods;
                if($goods=='Bien Ganancial'){
                     $goodsProfit='Bien Ganancial';
                }else{
                    $goodsPrivative='Bien Privativo % de la propiedad';
                }
            $constructionYear;
            $squareMeter;
            $elevator;
            $numParkingSpaces;
            $meterStorageRoom;
            $storeEpigraphDesc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
            echo "$direction.<br /> $cadastralReference.<br /> $valueEntireProperty.<br /> $constructionYear.<br /> $squareMeter.<br /> $goods.<br /> "
                    . "$constructionYear.<br /> $squareMeter.<br /> $elevator.<br /> $numParkingSpaces.<br /> $meterStorageRoom.<br /> $storeEpigraphDesc.<br />";   
            break;
            
            case 'local comercial && $goods':
            $direction;
            $cadastralReference;
            $valueEntireProperty='Valor de la totalidad del local comercial';
            $goods;
                if($goods=='Bien Ganancial'){
                    $goodsProfit='Bien Ganancial';
                }else{
                    $goodsPrivative='Bien Privativo % de la propiedad';
                }
            $constructionYear;
            $squareMeter;
            $numParkingSpaces;
            $meterStorageRoom;
            $storeEpigraphDesc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
            echo "$direction.<br /> $cadastralReference.<br /> $valueEntireProperty.<br /> $constructionYear.<br /> $squareMeter.<br /> $goods.<br />"
                    . "$constructionYear.<br /> $squareMeter.<br /> $numParkingSpaces.<br /> $meterStorageRoom.<br /> $storeEpigraphDesc.<br />";   
            break;
            
        case $option=='casa'|| $option =='chalet':
            $direction;
            $cadastralReference;
            $valueEntireProperty='Valor de la totalidad del casa/chalet';
            $goods;
                if($goods=='Bien Ganancial'){
                    $goodsProfit='Bien Ganancial';
                }else{
                    $goodsPrivative='Bien Privativo % de la propiedad';
                }
            $constructionYear;
                if($accessRoad=='Carretera Princical' || $accessRoad=='Via Afaltada' || $accessRoad=='Camino sin Afaltar'){
                    $roads=$accessRoad;
                }
            else $roads='sin indicar';
            $squareMeter='colocar tabla o desplegable para metros por plantas';
            $meterTerrain='metros de finca/terreno';
            $meterAnnex='metros de anexos tambien indicar los metros de uso por tabla o preguntas';
            echo "$direction.<br /> $cadastralReference.<br /> $valueEntireProperty.<br /> $constructionYear.<br /> $squareMeter.<br /> $goods.<br />"
                    . "$constructionYear$accessRoad.<br /> $accessRoad.<br /> $squareMeter.<br /> $meterTerrain.<br /> $meterAnnex.<br />";   
            break;
            
         case 'finca rustica':
            $province='Provincia';
            $cityHall='Ayuntamiento'; 
            $place='Lugar'; 
            $landName='nombre de la finca si la tiene es opcional'; 
            $cadastralReference;
            $valueEntireProperty='Valor de la totalidad de la finca rustica';
                $goods;
                if($goods=='Bien Ganancial'){
                     $goodsProfit='Bien Ganancial';
                }else{
                    $goodsPrivative='Bien Privativo % de la propiedad';
                }
            $squareMeter;
                if($typePlace=='prado' || $typePlace=='huerta' || $typePlace=='viña' || $typePlace=='monte'){
                    $typePlace=$type;
                }
            $storeEpigraphDesc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
            echo "$province.<br /> $cityHall.<br /> $place.<br />$landName.<br /> $cadastralReference.<br /> $valueEntireProperty.<br /> $goods.<br />"
                    ."$squareMeter.<br /> $storeEpigraphDesc.<br />";   
            break;  
            
        case $option=='terreno Urbano' || $option=='terreno Urbanizable':
            $province='Provincia';
            $cityHall='Ayuntamiento'; 
            $place='Lugar'; 
            $cadastralReference;
            $valueEntireProperty='Valor de la totalidad del terreno';
            $goods;
                if($goods=='Bien Ganancial'){
                     $goodsProfit='Bien Ganancial';
                }else{
                    $goodsPrivative='Bien Privativo % de la propiedad';
                }
            $squareMeter;
            $storeEpigraphDesc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
            echo "$province.<br /> $cityHall.<br /> $place.<br /> $cadastralReference.<br /> $valueEntireProperty.<br /> $goods.<br />"
                    ."$squareMeter.<br /> $storeEpigraphDesc.<br />"; 
            break; 
            
        case 'construccion industrial':
            $direction; 
            $cadastralReference;
            $valueEntireProperty='Valor de la totalidad de la nave';
            $goods;
                if($goods=='Bien Ganancial'){
                     $goodsProfit='Bien Ganancial';
                }else{
                    $goodsPrivative='Bien Privativo % de la propiedad';
                }
            $constructionYear;
                if($accessRoad=='Carretera Princical' || $accessRoad=='Via Afaltada' || $accessRoad=='Camino sin Afaltar'){
                    $accessRoad==$roads;
                }
            $squareMeter;
            $meterTerrain='metros de finca/terreno';
            $meterAnnex='metros de anexos tambien indicar los metros de uso por tabla o preguntas';
            $storeEpigraphDesc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
            echo "$direction.<br /> $cadastralReference.<br /> $valueEntireProperty.<br /> $goods.<br /> $constructionYear.<br /> $squareMeter.<br />"
                    . "$meterTerrain.<br /> $meterAnnex.<br /> $storeEpigraphDesc.<br />";   
            break;  
        default :
            $option=false;
            echo 'no a selecionado nada';    
    }
}

 property('piso','Bien Ganancial');

function bankAccountOrDeposit($goods,$country){
    
    $bankEntity='Entidad Bancaria';
    $Iban='iban';
    $balanceDate='Saldo a fecha fallecimiento';
        if($goods=='Bien Ganancial'){
             $goodsProfit='Bien Ganancial';
        }else{
            $goodsPrivative='Bien Privativo % de la propiedad';
        }
    $country='pais a los efectos de que si son c/c o imposiciones en la zona sepa se declaran en el apartado C y si son de fuera se declaran en el G'; 
    echo "$bankEntity.<br /> $Iban.<br /> $balanceDate.<br /> $goods.<br /> $country.<br />";
}

bankAccountOrDeposit(true, 'francia');

function actions0rPart($quotation,$goods){
    $entity='entidad';
    $numActions='numero de acciones';
        if($goods=='Bien Ganancial'){
             $goodsProfit='Bien Ganancial';
        }else{
            $goodsPrivative='Bien Privativo % de la propiedad';
        }
    //Cotizan en bolsa    
    switch (true){
        //valor total de cotizacion
        case $quotation:
            $priceQuotation='valor total de cotizacion al momento de fallecer';
        //Si el balance aprobado fué auditado    
        case $quotation==false:
            if($auditedBalance){
                $equityAmount='Importe del patrimonio neto de la sociedad';
            }else{
                $nominalValue='Valor nominal de las acciones del fallecido';
                $percPartCapital='porcentaje de participación en el capital social';
                $resultProfitLoss = [
                    'approvedExOne' => 0,
                    'approvedExTwo' => 0,
                    'approvedExThree' => 0
                ];
                $equityAmount='Importe del patrimonio neto de la sociedad';
            }   
    }
    
    echo "$entity.<br /> $numActions.<br /> $goods.<br />";
}

actions0rPart(true,'Bien Ganancial');

function bondsOrObligations($goods,$bondsTrade){
    $entity='entidad';
    $numValues='numero de valores totales';
    $goods;
        if($goods=='Bien Ganancial'){
             $goodsProfit='Bien Ganancial';
        }else{
            $goodsPrivative='Bien Privativo % de la propiedad';
        }
    $valueAllBonds='Valor de la totalidad de los bonos a fecha fallecimiento';
    if($bondsTrade){
       $bondsTrade='Si'; 
    }else{
       $bondsTrade='No';
    }
}

function inversionFunds($goods){
    $entity='entidad';
    $valueAllFunds='Valor total del fondo de inversión a fecha fallecimiento';
        if($goods=='Bien Ganancial'){
             $goodsProfit='Bien Ganancial';
        }else{
            $goodsPrivative='Bien Privativo % de la propiedad';
        }
}

function vehicles($goods){
    $brands='marca';
    $model='modelo';
    $dateRegistration='Fecha de la primera matriculación';
    $licensePlate='matricula';
    $frameNumber='Número de bastidor';
        if($goods=='Bien Ganancial'){
             $goodsProfit='Bien Ganancial';
        }else{
            $goodsPrivative='Bien Privativo % de la propiedad';
        }  
    $valueVehicle='Valor de la totalidad del vehículo';   
    $$storeEpigraphDesc='preguntar sólo si en A/ escogió la opción de "autónomo empresario individual';
    echo "$brands.<br /> $model.<br /> $dateRegistration.<br /> $licensePlate.<br /> $frameNumber.<br /> $goods.<br /> $valueVehicle.<br />"
            . "$storeEpigraphDesc.<br />";
}

function boats($goods){
    $brands='marca';
    $model='modelo';
    $constructionYear='Año construcción';
    $licensePlate='matricula';
    $valueBoats='Valor de la totalidad de la embarcación'; 
        if($goods=='Bien Ganancial'){
             $goodsProfit='Bien Ganancial';
        }else{
            $goodsPrivative='Bien Privativo % de la propiedad';
        }  
    echo "$brands.<br /> $model.<br /> $constructionYear.<br /> $licensePlate.<br /> $valueBoats.<br /> $goods.<br /> ";  
}

function business(){
    $epigraph='Epígrafe';
    $descriptionEpig='Descripción del epígrafe';
    $commercialName='Nombre comercial';
    $propertyValue='';
    $merchandiseValue='Valor inmovilizados materiales';
    $assetsValue=[
        'assets' => 0,
    ];
    $valueLastDeclared='Valor del beneficio del último ejercicio declarado';
    echo"$epigraph.<br /> $descriptionEpig.<br /> $commercialName.<br /> $propertyValue.<br /> $merchandiseValue.<br /> $assetsValue.<br />";
}

function others($goods){
    $descrAssets='Descripción del bien';
    $valueAssetx='Valor de la totalidad del bien';
    if($goods=='Bien Ganancial'){
             $goodsProfit='Bien Ganancial';
        }else{
            $goodsPrivative='Bien Privativo % de la propiedad';
        } 
    echo "$descrAssets.<br /> $valueAssetx.<br /> $goods.<br />";     
}

function  lifeInsurance($beneficiary){
    $insuranceEntity='Entidad aseguradora';
    $policyNumber='Número de póliza';
    $policyDate='Fecha de la póliza';
    $indemAmount='Importe indemnización';
    switch ($beneficiary){
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

function mortgages($debts){
    $bankEntity='entidad Bancaria';
    $amount='Importe(capital pendiente a fecha de fallecimiento)';
        if($debts=='Deuda Ganancial'){
             $debtsProfit='Deuda Ganancial';
        }else{
            $debtsPrivative='Deuda Privativo % de la propiedad';
        }
    
}

function personaLoans($debts){
    $bankEntity='entidad Bancaria';
    $amount='Importe(capital pendiente a fecha de fallecimiento)';
        if($debts=='Deuda Ganancial'){
             $debtsProfit='Deuda Ganancial';
        }else{
            $debtsPrivative='Deuda Privativo % de la propiedad';
        }
}

function debtsAdministration($debts){
    $agency='Organismo';
    $amount='Importe total (deuda pendiente a fecha de fallecimiento)';
        if($debts=='Deuda Ganancial'){
             $debtsProfit='Deuda Ganancial';
        }else{
            $debtsPrivative='Deuda Privativo % de la propiedad';
        }
}

function businessDebts($debts){
    $creditorName='Nombre/Razón social proveedor/acreedor';
    $amount='Importe total';
    if($debts=='Deuda Ganancial'){
             $debtsProfit='Deuda Ganancial';
       }else{
            $debtsPrivative='Deuda Privativo % de la propiedad';
       }
}

function otherDebts($debts){
    $descrDebt='Descripción de la deuda';
     $amount='Importe total';
     if($debts=='Deuda Ganancial'){
             $debtsProfit='Deuda Ganancial';
       }else{
            $debtsPrivative='Deuda Privativo % de la propiedad';
       }
}

//SECCION G) GASTOS DEDUCIBLES

function deductibleExpen($option){
    
    switch ($option){
        
        case 'Gastos de entierro y funeral':
            $amountFuneral='importe del funeral';
            break;    
        
        case 'Gastos de última enfermedad':
            $amountSickness='importe de enfermedad';
            break; 
        
        case 'Gastos por juicio o arbitraje por conflicto con la herencia':
            $amountLegal='importes legales';
            break; 
    }
    
}

?>



