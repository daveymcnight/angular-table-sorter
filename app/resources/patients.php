<?php

include "../models/Patients.php";
$patients = new Patients();
$patients->openConnection();
if(isset($_GET['sample'])){
    $patients->GET_SAMPLE(15);
}elseif(isset($_GET['wildcard'])){
    $patients->doWildcard($patients->getWildCardArray(), $_GET['wildcard']);
}
$patients->closeConnection();