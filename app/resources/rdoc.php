<?php


include "../models/ReferredDoctors.php";
$refferedDoctor = new ReferredDoctors();
$refferedDoctor->openConnection();
if(isset($_GET['sample'])){
    $refferedDoctor->GET_SAMPLE(15);
}elseif(isset($_GET['wildcard'])){
    $refferedDoctor->doWildcard($refferedDoctor->getWildCardArray(), $_GET['wildcard']);
}
$refferedDoctor->closeConnection();
