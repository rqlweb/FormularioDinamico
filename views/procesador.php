<?php

require_once '../controllers/formularioControllers.php';

$datosFallecido=new formularioControllers();

$estadocivil=$_POST['civilstatus'];

$patrimonio=$_POST['patrimonio'];

$datosFallecido->processForm($estadocivil,$patrimonio);


